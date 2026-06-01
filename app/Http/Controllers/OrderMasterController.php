<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\OrderMaster;
use App\Models\Customer;
use DB;


class OrderMasterController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

$orders = OrderMaster::leftJoin('customers', 'order_masters.cus_id', '=', 'customers.user_id')

    ->when($search, function ($query, $search) {
        $query->where('order_masters.order_id', 'like', "%{$search}%");
    })
    ->select('order_masters.*', 'customers.name as customer_name')
   ->orderBy('id', 'desc')
    ->paginate(10);

    // echo "<pre>";print_r($orders);exit;

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

    public function updateStatus(Request $request)
    {
       
        $id=$request->id;
        $order = OrderMaster::findOrFail($id);
        $order->status = $request->order_status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully');
    }

    public function getAddrees(Request $request){
     $id=$request->id;
     $order=DB::table('order_masters')
     ->leftJoin('shipping_address', 'order_masters.address_id', '=', 'shipping_address.id')
     ->where('order_masters.id',$id)
     ->select('order_masters.id','order_masters.status','shipping_address.address','shipping_address.state','shipping_address.district','shipping_address.pincode','shipping_address.phone_number')
     ->first();

     return response()->json([
    'status' => 0,
    'orders' => $order
]);

    }
  

    
}
