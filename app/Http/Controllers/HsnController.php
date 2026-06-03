<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hsn_codes;

class HsnController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $data =Hsn_codes::when($search, function ($query, $search) {
            $query->where('code', 'like', "%{$search}%");
        })
        ->paginate(10);

    return view('admin.hsncode', compact('data'));
}

    public function store(Request $request)
    {
       try {

        $request->validate([
            'hsn_code' => 'required',
            'tax' => 'required',
            'igst' => 'required',
            'cgst' => 'required',
            'sgst' => 'required'
        ]);

        Hsn_codes::create([
            'code' => $request->hsn_code,
            'tax' => $request->tax,
            'igst' => $request->igst,
            'cgst' => $request->cgst,
            'sgst' => $request->sgst
        ]);

        return redirect()
            ->back()
            ->with('success', 'HSN Code added successfully.');

    } catch (\Exception $e) {

        

        return redirect()
            ->back()
            ->withInput()
            ->with('error',$e->getMessage());
    }
    }

    public function update(Request $request, $id)
    {
          try {

        $hsn = Hsn_codes::findOrFail($id);

         $request->validate([
            'hsn_code' => 'required',
            'tax' => 'required',
            'igst' => 'required',
            'cgst' => 'required',
            'sgst' => 'required'
        ]);


        $hsn->update([
            'code' => $request->hsn_code,
            'tax' => $request->tax,
            'igst' => $request->igst,
            'cgst' => $request->cgst,
            'sgst' => $request->sgst
        ]);

        return redirect()
            ->back()
            ->with('success', 'HSN Code updated successfully.');

    } catch (\Exception $e) {

        

        return redirect()
            ->back()
            ->withInput()
            ->with('error',$e->getMessage());
    }
    }
}
