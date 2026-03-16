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
use DB;


class OrderController extends Controller
{

public function addtocart(Request $request){
  if (Auth::check()) {
$userId = Auth::user()->id;
$productId = $request->id;

$cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

if ($cart) {
    // Product already in cart → increase quantity
    $cart->qty = $cart->qty + 1;
    $cart->save();
} else {
    // New product → insert
    $cart = new Cart();
    $cart->user_id = $userId;
    $cart->product_id = $productId;
    $cart->qty = 1;
    $cart->save();
}

$productCount = Cart::where('user_id', $userId)->sum('qty');

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

public function cart(){
    return view('web.cart');
}

}