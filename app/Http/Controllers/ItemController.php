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
use App\Models\Varient_types;
use App\Models\Product_attributes;
use App\Models\Available_atributes;
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
        $variants =Varient_types::all();
       
        $attributes = Product_attributes::all();

       
        return view('admin.item', compact(
            'items',
            'authors',
            'hsncode',
            'categories',
            'search',
            'variants',
            'attributes'
           
        ));
    }
 public function edititems($id){
    
        $items = Item::where('id',$id)
            ->first();
      $authors = Author::all();
        $hsncode = Hsn_codes::all();
        $categories = Category::all();
        $variants =Varient_types::all();
       
        $attributes = Product_attributes::all();
         $availableAttributes = Available_atributes::where('product_id',$id)->get();

return view('admin.edititems',compact('authors',
            'hsncode',
            'categories', 
            'variants',
            'attributes',
            'items',
             'availableAttributes'
        ));
 }
    public function store(Request $request)
    {  
        try {
  

    $validated = $request->validate([
        'item_type'    => 'nullable|in:1,2',
        'name'         => 'required|string|max:255',
        'author_id'    => 'required|exists:authors,id',
        'hsnid'        => 'required',
        'publisher_id' => 'nullable|exists:publishers,id',
        'cat_id'       => 'required|exists:categories,id',
        'mrp'          => 'required|numeric',
        'sr'           => 'required|numeric',
        'image'        => 'required|image|mimes:jpg,jpeg,png',
        'description'  => 'nullable|string',
    ]);

    // Upload Image
    $imageName = time() . '.' . $request->image->getClientOriginalExtension();

    $request->image->move(
        public_path('assets/img/items'),
        $imageName
    );

    // Create Product
    $item = Item::create([
        'item_type'    => 1,
        'name'         => $validated['name'],
        'slug'         => Str::slug($validated['name']),
        'author_id'    => $validated['author_id'],
        'publisher_id' => 0,
        'hsnid'        => $validated['hsnid'],
        'cat_id'       => $validated['cat_id'],
        'mrp'          => $validated['mrp'],
        'sr'           => $validated['sr'],
        'description'  => $validated['description'] ?? null,
        'image'        => $imageName,
    ]);

    // Save Variants & Attributes
    $availableAttributes = [];

    if (!empty($request->variant_id)) {

        foreach ($request->variant_id as $key => $variantId) {

           if (empty($variantId)) {
            continue;
        }

        if (empty($request->attribute_ids[$key])) {
            continue;
        }

            $attributeIds = '';

            if (!empty($request->attribute_ids[$key])) {
                $attributeIds = implode(',', $request->attribute_ids[$key]);
            }

          

            $availableAttributes[] = [
                'product_id'   => $item->id,
                'variant_id'   => $variantId,
                'attribute_id' => $attributeIds,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }

        if (count($availableAttributes) > 0) {
    DB::table('available_atributes')->insert($availableAttributes);
}

       
    }

   

    return redirect()
        ->back()
        ->with('success', 'Item added successfully.');

} catch (\Exception $e) {

    DB::rollBack();

    Log::error('Item Create Error', [
        'message' => $e->getMessage(),
        'line'    => $e->getLine(),
        'file'    => $e->getFile(),
    ]);

    return redirect()
        ->back()
        ->withInput()
        ->with('error', $e->getMessage());

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
if (!empty($request->variant_id)) {

    foreach ($request->variant_id as $key => $variantId) {

        if (empty($variantId)) {
            continue;
        }

      if (empty($request->attribute_ids[$key])) {
            continue;
        }

            $attributeIds = '';

            if (!empty($request->attribute_ids[$key])) {
                $attributeIds = implode(',', $request->attribute_ids[$key]);
            }

     //echo "<pre>";print_r($attributeIds);exit;

        $existing = DB::table('available_atributes')
            ->where('product_id', $item->id)
            ->where('variant_id', $variantId)
            ->first();

        if ($existing) {

            DB::table('available_atributes')
                ->where('id', $existing->id)
                ->update([
                    'attribute_id' => $attributeIds,
                    'updated_at'   => now()
                ]);

        } else {

            DB::table('available_atributes')
                ->insert([
                    'product_id'   => $item->id,
                    'variant_id'   => $variantId,
                    'attribute_id' => $attributeIds,
                    'created_at'   => now(),
                    'updated_at'   => now()
                ]);
        }
    }
}
        

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