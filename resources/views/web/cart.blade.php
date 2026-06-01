@extends('layouts.weblayout')

@section('content')

<style>
.cart-container{
    max-width:900px;
    width:95%;
    margin:20px auto;
    background:#fff;
    padding:20px;
    border:1px solid #ddd;
    border-radius:10px;
}

.cart-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
    color:#F59E0B;
    flex-wrap:wrap;
    gap:10px;
}

.checkout-btn{
    background:#f59e0b;
    color:#fff;
    padding:10px 18px;
    text-decoration:none;
    font-weight:bold;
    border-radius:6px;
}

.checkout-btn:hover{
    background:#d97706;
}

.cart-item{
    display:flex;
    gap:20px;
    border-top:1px solid #eee;
    padding:20px 0;
    color:#F59E0B;
    flex-wrap:wrap;
}

.cart-img img{
    width:120px;
    max-width:100%;
}

.cart-details{
    flex:1;
    min-width:200px;
}

.cart-product{
    font-size:18px;
    margin-bottom:8px;
}

.stock{
    color:green;
    font-size:14px;
    margin-bottom:8px;
}



.qty-box{
    display:flex;
    align-items:center;
    gap:10px;
    border:2px solid #f0c14b;
    border-radius:25px;
    padding:5px 10px;
    width:max-content;
    margin:10px auto; /* ✅ THIS LINE CENTERS IT */
}

.qty-btn{
    background:none;
    border:none;
    font-size:18px;
    cursor:pointer;
    color:#000;
}

.links{
    margin-top:10px;
    font-size:14px;
}

.links a{
    margin-right:10px;
    color:#0073bb;
    text-decoration:none;
}

.price{
    font-size:20px;
    font-weight:bold;
}

.cart-right{
    text-align:right;
    min-width:120px;
}

.subtotal{
    margin-top:30px;
    font-size:18px;
    text-align:right;
    color:#f0c14b;
}

/* ✅ MOBILE FIX */
@media (max-width: 768px){

    .cart-item{
        flex-direction:column;
        align-items:center;
        text-align:center;
    }

    .cart-right{
        text-align:center;
        margin-top:10px;
    }

    .cart-header{
        flex-direction:column;
        text-align:center;
    }

    .subtotal{
        text-align:center;
    }

}
</style>

<div class="container">
<div class="cart-container">

<div class="cart-header">
   
<h2>Shopping Cart</h2>
    
  
</div>

@if($cartItems->count() > 0)

@php 
$sum=0;
$mrp=0;
@endphp

@foreach($cartItems as $item)

<div class="cart-item" id="cart-item_{{$item->product_id}}">

<div class="cart-img">
<img src="{{asset('public/assets/img/items/'.$item->image)}}">
</div>

<div class="cart-details">

<div class="cart-product">
{{$item->name}}
</div>

<div class="stock">In Stock</div>

<div class="qty-box">
<button class="qty-btn btn-increment" data-id="{{$item->product_id}}" data-vid="2">-</button>
<span id="qty_{{$item->product_id}}">{{$item->qty}}</span>
<button class="qty-btn btn-increment" data-id="{{$item->product_id}}" data-vid="1">+</button>
</div>

<div class="links">
<a href="#" class="btn-increment" data-id="{{$item->product_id}}" data-vid="3">Delete</a> 
</div>

</div>

<div class="cart-right">
<div class="item-price">
<span class="prev-price">₹ {{$item->mrp}}</span> ₹ {{$item->sr}}
</div>
</div>

</div>

@php 
$sum += ($item->sr * $item->qty);
$mrp += ($item->mrp * $item->qty);
@endphp

@endforeach

<div class="subtotal">
    Subtotal ({{$cartCount}} item): <b id="subtotal">₹ {{$mrp}}</b><br>
    Shipping Charge : <b>₹ 60</b><br>
    Discount : <b id="discount">₹ {{$mrp - $sum}}</b><br>
    Grand Total : <b id="grandtotal">₹ {{$sum + 60}}</b>
    
    
</div>

   @if($cartItems->count() > 0)
    <a href="{{url('shipping_details')}}">
    <button type="button" class="checkout-btn" >
        CONTINUE >>
    </button>
    </a>
    @endif

@else

<div class="empty-cart">Cart is empty</div>

@endif

</div>
</div>

@endsection