<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $categories = Category::when($search, function ($query, $search) {
            $query->where('category_name', 'like', "%{$search}%");
        })
        ->where('status',0)
        ->paginate(10);

    return view('admin.category', compact('categories'));
}

    public function store(Request $request)
    {
        try {

    $request->validate([
        'category_name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);

    $categoryimage = null;

    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $categoryimage = time() . '_' . $image->getClientOriginalName();

        $image->move(public_path('uploads/banners'), $categoryimage);
    }

    Category::create([
        'category_name' => $request->category_name,
        'image' => $categoryimage
    ]);

    return redirect()
        ->back()
        ->with('success', 'Category added successfully.');

} catch (\Exception $e) {

    return redirect()
        ->back()
        ->withInput()
        ->with('error', $e->getMessage());
}
    }

    public function update(Request $request, $id)
    {
        try {

    $category = Category::findOrFail($id);

    $request->validate([
        'category_name' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp'
    ]);

    $data = [
        'category_name' => $request->category_name
    ];

    if ($request->hasFile('image')) {

        if (
            $category->image &&
            File::exists(public_path('uploads/banners/' . $category->image))
        ) {
            File::delete(public_path('uploads/banners/' . $category->image));
        }

        $categoryimage = Str::uuid() . '.' . $request->image->extension();

        $request->image->move(
            public_path('uploads/banners'),
            $categoryimage
        );

        $data['image'] = $categoryimage;
    }

    $category->update($data);

    return redirect()
        ->back()
        ->with('success', 'Category updated successfully.');

} catch (\Exception $e) {

    // Log::error('Category Update Error: ' . $e->getMessage());

    return redirect()
        ->back()
        ->withInput()
        ->with('error', $e->getMessage());
}
    }
    public function destroy($id){
           try {

        $category = Category::findOrFail($id);
        $category->status = 1;
        $category->save();

        return redirect()->back()
            ->with('success', 'Category Deleted successfully.');

    } catch (\Exception $e) {

        return redirect()->back()
            ->with('error', 'Failed to update category. ' . $e->getMessage());

    }
    }
    
}