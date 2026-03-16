<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Offer;
use App\Models\Item;

class OfferController extends Controller
{
     public function index(Request $request)
{
    $search = $request->search;

    $offers = Offer::when($search, function ($query, $search) {
            $query->where('type', 'like', "%{$search}%");
        })
        ->paginate(10);

        $items = Item::all();

        return view('admin.offer', compact('offers','items'));
    }

    public function store(Request $request)
    {
       $request->validate([
    'type' => 'required|string|max:255',
    'product_id' => 'required|string|max:20',
    'amount' => 'required|string|max:20'
]);

        Offer::create([
    'type' => $request->type,
    'product_id' => $request->product_id,
    'amount' => $request->amount
]);

        return redirect()->back()->with('success','Offer added successfully');
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);

        $request->validate([
    'type' => 'required|string|max:255',
    'product_id' => 'required|string|max:20',
    'amount' => 'required|string|max:20'
]);
        $offer->update([
            'type' => $request->type,
    'product_id' => $request->product_id,
    'amount' => $request->amount
            
        ]);

        return redirect()->back()->with('success','Offer updated successfully');
    }
}