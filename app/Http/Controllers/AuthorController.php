<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.Author', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required'
        ]);

        Author::create([
            'author_name' => $request->author_name
        ]);

        return redirect()->back()->with('success', 'Author added successfully');
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'author_name' => 'required'
        ]);

        $author->update([
            'author_name' => $request->author_name
        ]);

        return redirect()->back()->with('success', 'Author updated successfully');
    }
}