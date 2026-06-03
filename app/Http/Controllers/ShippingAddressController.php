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
   public function index($id)
{
    // $search = $request->search;

    $shippingaddress = ShippingAddress::where('shipping_address.cus_id',$id)
     ->leftJoin('users', 'shipping_address.cus_id', '=', 'users.id')
      ->leftJoin('customers', 'users.id', '=', 'customers.user_id')
      ->select('shipping_address.*','customers.name')
        ->paginate(10);

    $customers = Customer::where('user_id',$id)->first();

    return view('admin.shippingaddress', compact('shippingaddress','customers'));
}
    public function store(Request $request)
    {
      try {

    $request->validate([
        'cus_id'       => 'required',
        'address'      => 'required',
        'pincode'      => 'required',
        'district'     => 'nullable',
        'state'        => 'required',
        'phone_number' => 'required',
    ]);

    ShippingAddress::create($request->all());

    return redirect()
        ->back()
        ->with('success', 'Shipping Address created successfully.');

} catch (\Exception $e) {

    Log::error('Shipping Address Create Error: ' . $e->getMessage());

    return redirect()
        ->back()
        ->withInput()
        ->with('error', 'Failed to create Shipping Address. Please try again.');
}
    }

    public function update(Request $request, $id)
{
   try {

    $request->validate([
        'cus_id'   => 'required',
        'address'  => 'required',
        'pincode'  => 'required',
        'district' => 'nullable',
        'state'    => 'required',
    ]);

    $address = ShippingAddress::findOrFail($id);

    $address->update([
        'cus_id'   => $request->cus_id,
        'address'  => $request->address,
        'pincode'  => $request->pincode,
        'district' => $request->district,
        'state'    => $request->state,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Shipping address updated successfully.');

} catch (\Exception $e) {

    Log::error('Shipping Address Update Error: ' . $e->getMessage());

    return redirect()
        ->back()
        ->withInput()
        ->with('error', 'Failed to update shipping address. Please try again.');
}
}
}