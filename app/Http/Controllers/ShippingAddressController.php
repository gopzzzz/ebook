<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\ShippingAddress;
use App\Models\Customer;


class ShippingAddressController extends Controller
{
   public function index(Request $request)
{
    $search = $request->search;

    $shippingaddress = ShippingAddress::when($search, function ($query, $search) {
            $query->where('address', 'like', "%{$search}%");
        })
        ->paginate(10);

    $customers = Customer::all();

    return view('admin.shippingaddress', compact('shippingaddress','customers'));
}
    public function store(Request $request)
    {
        $request->validate([
            'cus_id' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'district' => 'nullable',
            'state' => 'required'
        ]);

        ShippingAddress::create($request->all());

        return redirect()->back()->with('success', 'Shipping Address created successfully');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'cus_id' => 'required',
        'address' => 'required',
        'pincode' => 'required',
        'district' => 'nullable',
        'state' => 'required'
    ]);

    $address = ShippingAddress::findOrFail($id);

    $address->update([
        'cus_id' => $request->cus_id,
        'address' => $request->address,
        'pincode' => $request->pincode,
        'district' => $request->district,
        'state' => $request->state,
    ]);

    return redirect()->back()->with('success', 'Shipping address updated successfully');
}
}