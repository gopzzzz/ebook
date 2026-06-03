<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Item;
use App\Models\Author;
use App\Models\Hsn_codes;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;
use Log;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $items = Item::with(['author', 'publisher', 'category'])
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        $authors = Author::all();
        $hsncode = Hsn_codes::all();
        $categories = Category::all();

        return view('admin.item', compact(
            'items',
            'authors',
            'hsncode',
            'categories',
            'search'
        ));
    }

    public function store(Request $request)
    {  
        
    try {

        $request->validate([
            'item_type'    => 'nullable|in:1,2',
            'name'         => 'required|string|max:255',
            'author_id'    => 'required|exists:authors,id',
            'hsnid'        => 'required',
            'publisher_id' => 'nullable|exists:publishers,id',
            'cat_id'       => 'required|exists:categories,id',
            'mrp'          => 'required|numeric',
            'sr'           => 'required|numeric',
            'image'        => 'required|image|mimes:png,jpg,jpeg',
            'description'  => 'nullable|string',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('assets/img/items'),
            $imageName
        );

        Item::create([
            'item_type'    => 1,
            'name'         => $request->name,
            'slug'         => Str::slug($request->name),
            'author_id'    => $request->author_id,
            'publisher_id' => 0,
            'hsnid'        =>$request->hsnid,
            'cat_id'       => $request->cat_id,
            'mrp'          => $request->mrp,
            'sr'           => $request->sr,
            'description'  => $request->description,
            'image'        => $imageName,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Item added successfully.');

    } catch (\Exception $e) {

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Something went wrong: ' . $e->getMessage());
    }
    }

    public function update(Request $request, $id)
    {
        try {

        $item = Item::findOrFail($id);

        $request->validate([
            'item_type'    => 'nullable|in:1,2',
            'name'         => 'required|string|max:255',
            'author_id'    => 'required|exists:authors,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            'hsnid'       => 'required',
            'cat_id'       => 'required|exists:categories,id',
            'mrp'          => 'required|numeric',
            'sr'           => 'required|numeric',
            'image'        => 'nullable|image|mimes:png,jpg,jpeg',
            'description'  => 'nullable|string',
        ]);

        $data = $request->only([
            'item_type',
            'name',
            'author_id',
            'publisher_id',
            'hsnid',
            'cat_id',
            'mrp',
            'sr',
            'description'
        ]);

        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {

            if (
                $item->image &&
                file_exists(public_path('assets/img/items/' . $item->image))
            ) {
                unlink(public_path('assets/img/items/' . $item->image));
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('assets/img/items'),
                $imageName
            );

            $data['image'] = $imageName;
        }

        $item->update($data);

        return redirect()
            ->back()
            ->with('success', 'Item updated successfully.');

    } catch (\Exception $e) {

        Log::error('Item Update Error: ' . $e->getMessage());

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Failed to update item. Please try again.');
    }
    }
}