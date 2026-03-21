@extends('layouts.weblayout')

@section('content')

<style>
.cart-container{
    width:90%;
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

<form class="mb-3" action="{{ route('checkout') }}" method="POST" id="checkout">
@csrf

<div class="cart-container row">

    <!-- LEFT SIDE (ADDRESS) -->
    <div class="col-sm-6">

        <div class="cart-header">
            <h2>Shupping Address</h2>
        </div>

      
        @foreach($cusAddress as $shipping)
        <div class="cart-item">
            <div class="cart-product">
                <input type="radio" name="shipping_id" value="{{ $shipping->id }}" required @if($shipping->id == $shipping->ship_id) checked @endif>

                {{ $shipping->address }},
                {{ $shipping->district }},
                {{ $shipping->state }},
                Pin : {{ $shipping->pincode }} <br>

                Phone Number : {{ $shipping->phone_number }}
            </div>
        </div>
        @endforeach

        <a href="#" class="checkout-btn" data-bs-toggle="modal" data-bs-target="#myModal">
            + Add New Shipping Address
        </a>

    </div>

    <!-- RIGHT SIDE (CART ITEMS) -->
    <div class="col-sm-6">

        @if($cartItems->count() > 0)

            @php 
                $sum = 0;
                $mrp = 0;
            @endphp

            @foreach($cartItems as $item)

            <div class="cart-item" id="cart-item_{{$item->product_id}}">

                <div class="cart-img">
                    <img src="{{ asset('assets/img/items/'.$item->image) }}">
                </div>

                <div class="cart-details">
                    <div class="cart-product">
                        {{ $item->name }}
                    </div>

                    <div class="qty-box">
                        Qty 
                        <span id="qty_{{$item->product_id}}">
                            {{ $item->qty }}
                        </span>
                    </div>
                </div>

               

            </div>

            @php 
                $sum += ($item->sr * $item->qty);
                $mrp += ($item->mrp * $item->qty);
            @endphp

            @endforeach

            <div class="subtotal">
                Subtotal ({{$cartCount}} item): 
                <b id="subtotal">₹ {{$mrp}}</b><br>
                

                Discount : 
                <b id="discount">₹ {{$mrp - $sum}}</b><br>

                 Shipping Charge : 
                <b >₹ 60</b><br>

                Grand Total : 
                <b id="grandtotal">₹ {{$sum + 60}}</b>
            </div>

        @else
            <div class="empty-cart">Cart is empty</div>
        @endif
      @if($cusAddress->isNotEmpty())
    <button type="submit" class="checkout-btn">
        PROCEED TO CHECKOUT ->
    </button>
@endif

    </div>

</div>

</form>

<!-- MODAL -->
<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('addshippingaddress') }}" method="POST">
            @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Add Shipping Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <textarea class="form-control" name="address" placeholder="Enter Shipping Address"></textarea>
                    <input type="text" name="district" class="form-control" placeholder="Enter District">
                    <input type="text" name="state" class="form-control" placeholder="Enter State">
                    <input type="text" name="pincode" class="form-control" placeholder="Enter Pincode">
                    <input type="text" name="contactnumber" class="form-control" placeholder="Enter Contact Number">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

<script>
$('input[type="radio"]').on('change', function () {
    $('input[type="radio"]').not(this).prop('checked', false);
});
</script>
<script>
$(document).ready(function () {

    $('#checkout').on('submit', function (e) {

        if (!$('input[name="shipping_id"]:checked').val()) {
            e.preventDefault();
            alert('Please select a shipping address');
        }

    });

});
</script>