<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Varient_types;
use App\Models\Product_attributes;
use App\Models\Available_atributes;

class VarientsController extends Controller
{
      public function index(Request $request)
{
    $search = $request->search;

    $varients = Varient_types::when($search, function ($query, $search) {
            $query->where('varient_name', 'like', "%{$search}%");
        })
        ->where('status',0)
        ->paginate(10);

    return view('admin.varients', compact('varients'));
}

    public function store(Request $request)
    {
       try {

        $request->validate([
            'varient_name' => 'required'
        ]);

        Varient_types::create([
            'varient_name' => $request->varient_name
        ]);

        return redirect()
            ->back()
            ->with('success', 'Varient added successfully.');

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

        $varients = Varient_types::findOrFail($id);

        $request->validate([
            'varient_name' => 'required'
        ]);

        $varients->update([
            'varient_name' => $request->varient_name
        ]);

        return redirect()
            ->back()
            ->with('success', 'Varient updated successfully.');

    } catch (\Exception $e) {

    
        return redirect()
            ->back()
            ->withInput()
            ->with('error', $e->getMessage());
    }
    }
    public function attributes(Request $request , $id){
         $search = $request->search;

    $attributes = Product_attributes::when($search, function ($query, $search) {
            $query->where('value', 'like', "%{$search}%");
        })
        ->where('status',0)
        ->where('varient_id',$id)
        ->paginate(10);

    return view('admin.attributes', compact('attributes','id'));
    }

    public function add_attributes(Request $request){
 try {

        $request->validate([
            'attribute'   =>'required',
            'attribute_name' => 'required'
        ]);

        Product_attributes::create([
            'varient_id'     =>$request->varientid,
            'name'      =>$request->attribute,
            'value' => $request->attribute_name
        ]);

        return redirect()
            ->back()
            ->with('success', 'Product Attribute added successfully.');

    } catch (\Exception $e) {

        return redirect()
            ->back()
            ->withInput()
            ->with('error', $e->getMessage());
    }
    }
    public function edit_attributes(Request $request ,$id){
   try {

        $attributes = Product_attributes::findOrFail($id);

        $request->validate([
            'attribute_name' => 'required'
        ]);

        $attributes->update([
            'value' => $request->attribute_name,
             'name'      =>$request->attribute,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Attribute updated successfully.');

    } catch (\Exception $e) {

    
        return redirect()
            ->back()
            ->withInput()
            ->with('error', $e->getMessage());
    }
    }

    public function getAttributes($id)
{
    $attributes = Product_attributes::where('varient_id', $id)
                    ->select('id', 'value')
                    ->get();

    return response()->json($attributes);
}
public function getProductattributes($id){
 
       $productVariants = Available_atributes::where('product_id', $id)
        ->get()
        ->groupBy('variant_id')
        ->map(function ($items) {

            return $items->map(function ($item) {

                $item->attribute_ids = explode(',', $item->attribute_id);

                return $item;
            });

        });

    $variants = Varient_types::all();

    return response()->json([
        'productVariants' => $productVariants,
        'variants' => $variants
    ]);
   
}

        public function destroy($id){
           try {

        $varient = Varient_types::findOrFail($id);
        $varient->status = 1;
        $varient->save();

        return redirect()->back()
            ->with('success', 'Varient Deleted successfully.');

    } catch (\Exception $e) {

        return redirect()->back()
            ->with('error', 'Failed to update Varient. ' . $e->getMessage());

    }


    }

    public function attributedestroy($id){
           try {

        $varient = Product_attributes::findOrFail($id);
        $varient->status = 1;
        $varient->save();

        return redirect()->back()
            ->with('success', 'Attribute Deleted successfully.');

    } catch (\Exception $e) {

        return redirect()->back()
            ->with('error', 'Failed to update Attribute. ' . $e->getMessage());

    }

    }


}
