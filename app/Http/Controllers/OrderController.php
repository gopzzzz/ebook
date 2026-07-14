<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Customer;
use App\Models\User;
use App\Models\Cart;
use App\Models\ShippingAddress;
use App\Models\OrderMaster;
use App\Models\Order_trans;
use App\Models\Item;
use DB;
use Illuminate\Support\Facades\Http;


class OrderController extends Controller
{

public function addtocart(Request $request){
  if (Auth::check()) {
$userId = Auth::user()->id;
$productId = $request->id;
$size = $request->size;

$cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

if ($cart) {
 $productCount = Cart::where('user_id', $userId)->count();

return response()->json([
    'status' => 0,
    'count' => $productCount
]);
} else {
    // New product → insert
    $cart = new Cart();
    $cart->user_id = $userId;
    $cart->product_id = $productId;
    $cart->size = $size;
    $cart->qty = 1;
    $cart->save();
}

$productCount = Cart::where('user_id', $userId)->count();

return response()->json([
    'status' => 0,
    'count' => $productCount
]);

    } else {


        return response()->json([
            'status' => 1,
            'message' => 'Login required'
        ]);

    }
}

public function changeqty(Request $request){
if (Auth::check()) {

    $userId = Auth::user()->id;
    $productId = $request->id;
    $variant_id = $request->vid;

    $cart = Cart::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

    // ✅ If not exists → create
    if (!$cart) {
        $cart = new Cart();
        $cart->user_id = $userId;
        $cart->product_id = $productId;
        $cart->qty = 1;
        $cart->save();

        $qty = 1;

    } else {

        // ✅ Increment
        if ($variant_id == 1) {
            $cart->qty += 1;
            $cart->save();
            $qty = $cart->qty;

        } 
        // ✅ Decrement
        else if ($variant_id == 2) {

            if ($cart->qty > 1) {
                $cart->qty -= 1;
                $cart->save();
                $qty = $cart->qty;
            } else {
                $cart->delete();
                $qty = 0;
            }

        } 
        // ✅ Remove item
        else {
            $cart->delete();
            $qty = 0;
        }
    }

    // ✅ TOTAL cart count (IMPORTANT FIX)
    $productCount = Cart::where('user_id', $userId)->where('product_id',$productId)->sum('qty');
    $product_list = Cart::where('user_id', $userId)
    ->leftJoin('items', 'carts.product_id', '=', 'items.id')
    ->select('carts.qty', 'items.mrp', 'items.sr')
    ->get();

$subtotal = 0;
$grandtotal = 0;

foreach ($product_list as $products) {

    // ✅ multiply with qty
    $subtotal += $products->mrp * $products->qty;
    $grandtotal += $products->sr * $products->qty;
}

$discount = $subtotal - $grandtotal;

return response()->json([
    'status' => 0,
    'subtotal' => $subtotal,
    'grandtotal' => $grandtotal,
    'discount' => $discount,
    'count' => $productCount, // total cart count
    'qty' => $qty
]);

} else {
    

    return response()->json([
        'status' => 1,
        'message' => 'Login required'
    ]);
}
}


public function cart(){
    return view('web.cart');
}
public function shipping_details(){
     return view('web.shipping_details'); 
}
public function addshippingaddress(Request $request){
      try {

        $shipping = new ShippingAddress;
        $shipping->cus_id = Auth::user()->id;
        $shipping->phone_number = $request->contactnumber;
        $shipping->address = $request->address;
        $shipping->pincode = $request->pincode;
        $shipping->district = $request->district;
        $shipping->state = $request->state;
        $shipping->save();

       DB::table('customers')
    ->where('user_id', Auth::user()->id)
    ->update([
        'ship_id' => $shipping->id
    ]);

        return redirect('shipping_details');

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Shipping address added successfully'
        // ]);

    } catch (\Exception $e) {

        return response()->json([
            'status' => false,
            'message' => 'Something went wrong',
            'error' => $e->getMessage() // optional (remove in production)
        ]);
    }

}
public function checkout(Request $request)
{
    $shipping_id = $request->shipping_id;
    $userId = Auth::id();
    $email = Auth::user()->email;
    $shippingId=DB::table('shipping_address')->where('id',$shipping_id )->first();

   
    try {

        // DB::beginTransaction();

        // Update selected shipping
        Customer::where('user_id', $userId)->update([
            'ship_id' => $shipping_id
        ]);

           $order = DB::table('order_masters')
            ->orderBy('order_id', 'desc')
            ->first();
            
if ($order == null) {
    $id = 10000;
} else {
    $id = $order->order_id + 1;
}
        // Create Order Master
        $master = new OrderMaster;
        $master->cus_id = $userId;
        $master->order_id = $id;
        $master->total_amount = 0;
        $master->total_mrp=0;
        $master->shipping_charge = 60;
        $master->discount = 0;
        $master->total_sr = 0;
        $master->status = 0;
        $master->address_id = $shipping_id;
         $master->payment_order_id = $request->razorpay_order_id;
          $master->razorpay_payment_id = $request->razorpay_payment_id;
           $master->razorpay_signature = $request->razorpay_signature;
        $master->save();

        $total = 0;
        $totalmrp = 0;

        $cart = DB::table('carts')->where('user_id', $userId)->get();

        foreach ($cart as $items) {

            $product = DB::table('items')->where('id', $items->product_id)->first();

            $lineTotal = $product->sr * $items->qty;
            $total += $lineTotal;

             $linemrp = $product->mrp * $items->qty;
            $totalmrp += $linemrp;

            


            $trans = new Order_trans;
            $trans->order_master_id = $master->id; // 🔥 important
            $trans->book_id = $items->product_id;
            $trans->mrp = $product->mrp;
            $trans->sr = $product->sr;
            $trans->qty = $items->qty;
            $trans->total_amount = $lineTotal;
            $trans->taxable_amount = 0;
            $trans->size = $items->size;
            $trans->save();
        }

        // Update total
        $master->total_amount = $total + $master->shipping_charge;
        $master->total_sr=$total;
        $master->total_mrp=$totalmrp;
        $master->discount=$totalmrp-$total;
        $master->save();

        // Clear cart
        DB::table('carts')->where('user_id', $userId)->delete();
        
     
      
//    $response = Http::withHeaders([
//     'x-client-id' => env('CASHFREE_APP_ID'),
//     'x-client-secret' => env('CASHFREE_SECRET_KEY'),
//     'x-api-version' => '2022-09-01',
//     'Content-Type' => 'application/json'
// ])->post('https://sandbox.cashfree.com/pg/orders', [
//     "order_id" =>"ORD".$id,
//     "order_amount" => (float) $total ,
//     "order_currency" => "INR",
//     "customer_details" => [
//         "customer_id" => "CUS_" . $userId,
//         "customer_email" => $email,
//         "customer_phone" => $shippingId->phone_number,
//     ],
//     "order_meta" => [
//         "return_url" => url('/payment-success?order_id={order_id}')
//     ]
// ]);

// return response()->json($response->json());

        
        
        

        // DB::commit();

        return redirect()->route('success')->with('success', $id);

    } catch (\Exception $e) {

        DB::rollBack();
        // echo $e->getMessage();exit;
      return redirect()->route('success')->with('error', $e->getMessage());

    }
}


public function paymentSuccess(Request $request)
{
    $orderId = $request->query('order_id');
    
    


    if (!$orderId) {
        return "Order ID missing!";
    }
    
 

    // Verify payment status with Cashfree
    $response = Http::withHeaders([
        'x-client-id' => env('CASHFREE_APP_ID'),
        'x-client-secret' => env('CASHFREE_SECRET_KEY'),
        'x-api-version' => '2022-09-01'
    ])->get("https://api.cashfree.com/pg/orders/$orderId");

    $data = $response->json();
    
    // echo "<pre>";print_r( $data);exit;
    $oId = str_replace('ORD', '', $orderId);
    
      $updated = DB::table('order_masters')
    ->where('order_id', $oId)
    ->update([
        'pay_status' => $data['order_status'],
        'updated_at' => now()
    ]);
    
   $userId=DB::table('order_masters') ->where('order_id', $oId)->first();

   DB::table('carts')->where('user_id', $userId->cus_id)->delete();

    if (isset($data['order_status']) && $data['order_status'] === 'PAID') {
        
         return redirect()->route('success')->with('success', $orderId);
        
        
        //return redirect('sucess');
    }

    return view('payment.failed', compact('data'));
}
public function success(){
    return view('web.success');
}
public function orderview($id){
    $order_master=DB::table('order_masters')
    ->leftJoin('customers', 'order_masters.cus_id', '=', 'customers.user_id')
    ->leftJoin('shipping_address', 'customers.ship_id', '=', 'shipping_address.id')
    ->where('order_masters.id',$id)
    ->select('order_masters.*','customers.name','customers.ship_id','shipping_address.phone_number','shipping_address.address','shipping_address.pincode','shipping_address.district','shipping_address.state')
    ->first();
    // print_r($order_master);exit;
    $order_trans=DB::table('order_trans')
     ->leftJoin('items', 'order_trans.book_id', '=', 'items.id')
     ->select('order_trans.*','items.name','items.pro_code')
    ->where('order_master_id',$id)->get();
  return view('web.orderview',compact('order_master','order_trans'));
}
public function paymentSuccesswithrazorpay(Request $reques){

 $secret = env('RAZORPAY_SECRET');

        $generated_signature = hash_hmac(
            'sha256',
            $request->razorpay_order_id . "|" . $request->razorpay_payment_id,
            $secret
        );

        if ($generated_signature === $request->razorpay_signature) {

            // Update order status here

            return response()->json([
                'status' => true,
                'message' => 'Payment Verified Successfully'
            ]);

        } else {

            return response()->json([
                'status' => false,
                'message' => 'Signature Verification Failed'
            ]);
        }
    
}
public function saveGuestCart(Request $request)
{
    session()->put('guest_cart', $request->cart);

    return response()->json([
        'status' => true,
        'data' => session('guest_cart')
    ]);
}

}