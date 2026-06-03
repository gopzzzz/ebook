<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $categories = Category::when($search, function ($query, $search) {
            $query->where('category_name', 'like', "%{$search}%");
        })
        ->paginate(10);

    return view('admin.category', compact('categories'));
}

    public function store(Request $request)
    {
       try {

        $request->validate([
            'category_name' => 'required'
        ]);

        Category::create([
            'category_name' => $request->category_name
        ]);

        return redirect()
            ->back()
            ->with('success', 'Category added successfully.');

    } catch (\Exception $e) {

        Log::error('Category Create Error: ' . $e->getMessage());

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Failed to add category. Please try again.');
    }
    }

    public function update(Request $request, $id)
    {
          try {

        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required'
        ]);

        $category->update([
            'category_name' => $request->category_name
        ]);

        return redirect()
            ->back()
            ->with('success', 'Category updated successfully.');

    } catch (\Exception $e) {

        Log::error('Category Update Error: ' . $e->getMessage());

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Failed to update category. Please try again.');
    }
    }
    
}