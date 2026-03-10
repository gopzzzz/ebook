<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Item;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use Illuminate\Support\Str;


class ItemController extends Controller
{

public function index()
{
    $items = Item::with(['author','publisher','category'])->get();
    $authors = Author::all();
    $publishers = Publisher::all();
    $categories = Category::all();

    return view('admin.item', compact(
        'items',
        'authors',
        'publishers',
        'categories'
    ));
}

public function store(Request $request)
{
    $request->validate([
        'name'         => 'required|string|max:255',
        'author_id'       => 'required|exists:authors,id',
        'publisher_id'       => 'required|exists:publishers,id',
        'cat_id'       => 'required|exists:categories,id',
        'mrp'          => 'required|numeric',
        'sr'           => 'required|numeric',
        'image'        => 'required|image|mimes:png,jpg,jpeg|max:2048',
        'description'  => 'nullable|string',
    ]);

    // ✅ STORE IMAGE
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(
    public_path('assets/img/items'),
    $imageName
);

    // ✅ SAVE ITEM
    Item::create([
        'name'         => $request->name,
        'slug' => Str::slug($request->name),
        'author_id'       => $request->author_id,
        'publisher_id'       => $request->publisher_id,
        'cat_id'       => $request->cat_id,
        'mrp'          => $request->mrp,
        'sr'           => $request->sr,
        'description'  => $request->description,
        'image'        => $imageName, // 🔥 THIS WAS MISSING
    ]);

    return redirect()->back()->with('success', 'Item added successfully');
}

 public function update(Request $request, $id)
{
    $item = Item::findOrFail($id);

    $request->validate([
        'name'         => 'required|string|max:255',
        'author_id'       => 'required|exists:authors,id',
        'publisher_id'       => 'required|exists:publishers,id',
        'cat_id'       => 'required|exists:categories,id',
        'mrp'          => 'required|numeric',
        'sr'           => 'required|numeric',
        'image'        => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        'description'  => 'nullable|string',
    ]);

    $data = $request->only([
        'name','author_id','publisher_id','cat_id','mrp','sr','description'
    ]);

    $data['slug'] = Str::slug($request->name);

    // 🔥 IMAGE UPDATE
    if ($request->hasFile('image')) {

        // delete old image
        if ($item->image && file_exists(public_path('assets/img/items/'.$item->image))) {
            unlink(public_path('assets/img/items/'.$item->image));
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/img/items'), $imageName);
        $data['image'] = $imageName;
    }

    $item->update($data);

    return redirect()->back()->with('success', 'Item updated successfully');
}
}