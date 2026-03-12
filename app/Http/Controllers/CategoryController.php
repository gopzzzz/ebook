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
        $request->validate([
            'category_name' => 'required'
        ]);

        Category::create([
            'category_name' => $request->category_name
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required'
        ]);

        $category->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->back();
    }
    
}