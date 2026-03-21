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
    public function index(Request $request)
{
    $search = $request->search;

    $orders = OrderMaster::when($search, function ($query, $search) {
            $query->where('order_no', 'like', "%{$search}%");
        })
        ->paginate(10);

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

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|in:0,1,2,3',
        ]);

        $order = OrderMaster::findOrFail($id);
        $order->order_status = $request->order_status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully');
    }


    
}
