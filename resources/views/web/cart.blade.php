@extends('layouts.weblayout')

@section('content')
<style>
.cart-container{
width:900px;
margin:40px auto;
background:#fff;
padding:20px;
border:1px solid #ddd;
}

.cart-title{
font-size:28px;
margin-bottom:20px;
color:#F59E0B;
}
.cart-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
color:#F59E0B;
}

.checkout-btn{
background:#f59e0b;
color:#fff;
padding:14px 24px;
text-decoration:none;
font-weight:bold;
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

}

.cart-img img{
width:120px;
}

.cart-details{
flex:1;
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

.cart-meta{
font-size:14px;
margin-bottom:10px;
}

.qty-box{
display:flex;
align-items:center;
gap:10px;
border:2px solid #f0c14b;
border-radius:25px;
padding:5px 10px;
width:max-content;
height:15%;
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
}

.subtotal{
margin-top:30px;
font-size:20px;
text-align:right;
color:#f0c14b;
}

</style>

<div class="cart-container">

<div class="cart-header">
    <h2>Shopping Cart</h2>
    <a href="#" class="checkout-btn">PROCEED TO CHECKOUT</a>
</div>

   @if($cartItems->count() > 0)
      @php 
      $sum=0;
      $mrp=0;
      @endphp
            @foreach($cartItems as $item)

<div class="cart-item">

<div class="cart-img">
<img src="{{asset('assets/img/items/'.$item->image)}}">
</div>

<div class="cart-details">

<div class="cart-product">
{{$item->name}}
</div>

<div class="stock">In Stock</div>


<div class="qty-box">
<button class="qty-btn">-</button>
<span>1</span>
<button class="qty-btn">+</button>
</div>

<div class="links">
<a href="#">Delete</a> 

</div>

</div>


<div class="cart-right">
<div class="item-price"><span class="prev-price">₹ {{$item->mrp}}</span>₹ {{$item->sr}}
										</div>
</div>

</div>

@php 

$sum=$sum+$item->sr;
$mrp=$mrp+$item->mrp;


@endphp

@endforeach
	


<div class="subtotal">
    
    Subtotal ({{$cartCount}} item): <b>₹ {{$mrp}}</b><br>
Discount : <b>₹ {{$mrp - $sum}}</b> <br>
Grand Total : <b>₹ {{$sum}}</b>
</div>

 @else
            <div class="empty-cart">Cart is empty</div>
        @endif

</div>
@endsection