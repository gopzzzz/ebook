<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\OrderMaster;
use App\Models\Customer;


class OrderMasterController extends Controller
{
    public function index()
{
    $orders = OrderMaster::all();
    $customers = Customer::all();

    return view('admin.orders', compact('orders','customers'));
}

 public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'cus_id' => 'required',
            'total_amount' => 'required',
            'shipping_charge' => 'required',
            'discount' => 'nullable',
            'address_id' => 'required'
        ]);

        OrderMaster::create([
            'order_id' => $request->order_id,
            'cus_id' => $request->cus_id,
            'total_amount' => $request->total_amount,
            'shipping_charge' => $request->shipping_charge,
            'discount' => $request->discount,
            'address_id' => $request->address_id
        ]);

        return redirect()->back()->with('success', 'Order created successfully');
    }


    
}
