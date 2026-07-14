@extends('layouts.weblayout')

@section('content')

<style>
/* ── keep all old classes untouched ── */
.cart-wrapper { max-width:1000px; margin:50px auto; padding:0 15px; }
.cart-header-section { margin-bottom:40px; }
.cart-header-section h1 { font-size:28px; font-weight:700; color:#000; }
.cart-items-container { background:#fff; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.1); }
.cart-item-card { display:flex; gap:24px; padding:20px; border-bottom:1px solid #f0f0f0; align-items:flex-start; transition:background-color 0.2s ease; }
.cart-item-card:last-child { border-bottom:none; }
.cart-item-card:hover { background-color:#fafafa; }
.cart-item-image { width:140px; height:140px; flex-shrink:0; border-radius:6px; overflow:hidden; background:#f5f5f5; }
.cart-item-image img { width:100%; height:100%; object-fit:cover; }
.cart-item-details { flex:1; display:flex; flex-direction:column; }
.cart-item-name { font-size:16px; font-weight:600; color:#1a1a1a; margin-bottom:6px; }
.cart-item-status { font-size:13px; color:#22c55e; font-weight:500; margin-bottom:12px; }
.delivery-info { font-size:12px; color:#666; margin-bottom:12px; }
.quantity-control { display:flex; align-items:center; gap:12px; width:fit-content; background:#f5f5f5; border-radius:6px; padding:6px 8px; margin-bottom:12px; }
.quantity-btn { background:none; border:none; width:28px; height:28px; display:flex; align-items:center; justify-content:center; cursor:pointer; color:#666; font-weight:600; transition:color 0.2s ease; }
.quantity-btn:hover { color:#F59E0B; }
.quantity-value { min-width:24px; text-align:center; font-weight:600; color:#1a1a1a; }
.cart-item-actions { display:flex; gap:16px; font-size:13px; }
.cart-item-actions a { color:#F59E0B; text-decoration:none; font-weight:600; cursor:pointer; transition:color 0.2s ease; }
.cart-item-actions a:hover { color:#e59000; }
.cart-item-price-section { display:flex; flex-direction:column; align-items:flex-end; gap:8px; }
.price-discounted { font-size:18px; font-weight:700; color:#1a1a1a; }
.price-original { font-size:13px; color:#999; text-decoration:line-through; }
.discount-percent { font-size:12px; color:#22c55e; font-weight:600; }
.cart-summary { background:#f9f9f9; border:1px solid #e8e8e8; border-radius:4px; padding:20px; margin-top:0; }
.summary-title { font-size:14px; font-weight:700; color:#1a1a1a; margin-bottom:16px; padding-bottom:10px; border-bottom:1px solid #e8e8e8; }
.summary-row { display:flex; justify-content:space-between; font-size:14px; margin-bottom:12px; color:#333; }
.summary-row:last-of-type { margin-bottom:0; }
.summary-label { font-weight:400; color:#555; }
.summary-value { font-weight:600; color:#1c1c1c; }
.summary-divider { border-top:1px solid #e8e8e8; margin:14px 0; }
.summary-total { display:flex; justify-content:space-between; font-size:16px; font-weight:700; color:#1c1c1c; }
.shipping-notice { background:#e8f5e9; padding:10px 14px; border-radius:3px; font-size:13px; color:#2e7d32; margin-top:14px; font-weight:500; }
.checkout-section { margin-top:0; }
.checkout-btn { width:100%; background:#fb641b; color:#fff; padding:14px 32px; border:none; border-radius:3px; font-size:15px; font-weight:700; cursor:pointer; transition:background 0.2s; letter-spacing:0.2px; }
.checkout-btn:hover { background:#e05a16; }
.empty-cart-state { text-align:center; padding:60px 20px; background:#fff; border-radius:4px; border:1px solid #e8e8e8; }
.empty-cart-text { color:#333; font-size:18px; font-weight:600; margin-bottom:8px; }
.continue-shopping-link { display:inline-block; background:#fb641b; color:#fff; padding:12px 28px; border-radius:3px; text-decoration:none; font-weight:700; font-size:14px; transition:background 0.2s; }
.continue-shopping-link:hover { background:#e05a16; }

/* ── NEW PROFESSIONAL CART STYLES ── */
.nc-page { background:#f1f3f6; padding:24px 0 48px; }
.nc-wrap { max-width:1200px; margin:0 auto; padding:0 16px; }

.nc-breadcrumb {
    background:#f1f3f6;
    padding: 12px 16px 0;
    max-width:1200px;
    margin: 0 auto;
    font-size:13px;
    color:#777;
}
.nc-breadcrumb a { color:#555; text-decoration:none; }
.nc-breadcrumb a:hover { color:#fb641b; }
.nc-breadcrumb span { margin:0 6px; }

.nc-layout {
    display:grid;
    grid-template-columns:1fr 340px;
    gap:16px;
    align-items:start;
}

.nc-items-box {
    background:#fff;
    border:1px solid #ddd;
    border-radius:3px;
}
.nc-items-header {
    padding:16px 20px;
    border-bottom:1px solid #f0f0f0;
    display:flex;
    align-items:center;
    justify-content:space-between;
}
.nc-items-title {
    font-size:16px;
    font-weight:500;
    color:#212121;
}
.nc-items-count {
    font-size:13px;
    color:#878787;
}
.nc-free-delivery-banner {
    background:#e8f5e9;
    border-bottom:1px solid #c8e6c9;
    padding:10px 20px;
    font-size:13px;
    color:#2e7d32;
    font-weight:500;
    display:flex;
    align-items:center;
    gap:6px;
}

.nc-item {
    display:flex;
    gap:20px;
    padding:20px;
    border-bottom:1px solid #f0f0f0;
    align-items:flex-start;
}
.nc-item:last-child { border-bottom:none; }

.nc-item-img-wrap {
    width:112px;
    flex-shrink:0;
}
.nc-item-img-wrap img {
    width:100%;
    height:112px;
    object-fit:cover;
    display:block;
    border:1px solid #f0f0f0;
}

.nc-item-info { flex:1; }
.nc-item-name {
    font-size:15px;
    color:#212121;
    font-weight:400;
    margin-bottom:4px;
    line-height:1.4;
}
.nc-item-seller {
    font-size:13px;
    color:#878787;
    margin-bottom:10px;
}
.nc-item-price-row {
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:14px;
    flex-wrap:wrap;
}
.nc-item-sp {
    font-size:18px;
    font-weight:700;
    color:#212121;
}
.nc-item-mrp {
    font-size:14px;
    color:#878787;
    text-decoration:line-through;
}
.nc-item-disc {
    font-size:14px;
    color:#388e3c;
    font-weight:600;
}

.nc-qty-row {
    display:flex;
    align-items:center;
    gap:8px;
    margin-bottom:14px;
}
.nc-qty-label {
    font-size:14px;
    color:#212121;
    font-weight:500;
}
.nc-qty-ctrl {
    display:flex;
    align-items:center;
    border:1px solid #c2c2c2;
    border-radius:2px;
    overflow:hidden;
}
.nc-qty-btn {
    width:34px;
    height:34px;
    background:#fff;
    border:none;
    cursor:pointer;
    font-size:16px;
    color:#212121;
    font-weight:600;
    transition:background 0.15s;
    display:flex;
    align-items:center;
    justify-content:center;
}
.nc-qty-btn:hover { background:#f0f0f0; }
.nc-qty-num {
    width:40px;
    text-align:center;
    font-size:14px;
    font-weight:700;
    color:#212121;
    border-left:1px solid #c2c2c2;
    border-right:1px solid #c2c2c2;
    padding:6px 0;
    background:#fff;
}

.nc-item-actions {
    display:flex;
    gap:0;
}
.nc-item-act-btn {
    font-size:13px;
    color:#212121;
    font-weight:500;
    text-decoration:none;
    cursor:pointer;
    padding:6px 14px;
    border:1px solid #c2c2c2;
    background:#fff;
    transition:background 0.15s;
    line-height:1;
    display:inline-flex;
    align-items:center;
    gap:4px;
}
.nc-item-act-btn:first-child { border-right:none; border-radius:2px 0 0 2px; }
.nc-item-act-btn:last-child { border-radius:0 2px 2px 0; }
.nc-item-act-btn:hover { background:#f5f5f5; }
.nc-item-act-btn.remove-btn { color:#e53935; border-color:#c2c2c2; }

.nc-summary-box {
    background:#fff;
    border:1px solid #ddd;
    border-radius:3px;
    position:sticky;
    top:16px;
}
.nc-summary-header {
    padding:14px 20px;
    border-bottom:1px solid #e8e8e8;
    font-size:12px;
    font-weight:700;
    color:#878787;
    letter-spacing:0.8px;
    text-transform:uppercase;
}
.nc-summary-body { padding:16px 20px; }
.nc-sum-row {
    display:flex;
    justify-content:space-between;
    font-size:14px;
    color:#212121;
    margin-bottom:14px;
    align-items:center;
}
.nc-sum-label { color:#212121; }
.nc-sum-val { font-weight:500; color:#212121; }
.nc-sum-val.disc { color:#388e3c; font-weight:600; }
.nc-sum-divider { border:none; border-top:1px dashed #e8e8e8; margin:4px 0 14px; }
.nc-sum-total-row {
    display:flex;
    justify-content:space-between;
    font-size:16px;
    font-weight:700;
    color:#212121;
    margin-bottom:4px;
}
.nc-sum-savings {
    font-size:13px;
    color:#388e3c;
    font-weight:500;
    margin-bottom:16px;
}
.nc-checkout-btn {
    display:block;
    width:100%;
    background:#fb641b;
    color:#fff;
    text-align:center;
    padding:14px;
    border:none;
    border-radius:3px;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
    transition:background 0.2s;
    text-decoration:none;
    letter-spacing:0.3px;
}
.nc-checkout-btn:hover { background:#e05a16; color:#fff; }
.nc-secure-txt {
    text-align:center;
    font-size:12px;
    color:#878787;
    margin-top:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:4px;
}

.nc-empty-box {
    background:#fff;
    border:1px solid #ddd;
    border-radius:3px;
    padding:72px 20px;
    text-align:center;
}
.nc-empty-img { font-size:64px; margin-bottom:16px; opacity:0.25; }
.nc-empty-title { font-size:20px; font-weight:500; color:#212121; margin-bottom:6px; }
.nc-empty-sub { font-size:14px; color:#878787; margin-bottom:24px; }
.nc-empty-btn {
    display:inline-block;
    background:#fb641b;
    color:#fff;
    padding:12px 32px;
    border-radius:3px;
    text-decoration:none;
    font-weight:700;
    font-size:14px;
    transition:background 0.2s;
}
.nc-empty-btn:hover { background:#e05a16; color:#fff; }

@media (max-width:900px) {
    .nc-layout { grid-template-columns:1fr; }
    .nc-summary-box { position:static; }
}
@media (max-width:600px) {
    .nc-item { flex-wrap:wrap; }
    .nc-item-img-wrap { width:80px; }
    .nc-item-img-wrap img { height:80px; }
}
</style>

<div class="nc-breadcrumb">
    <a href="{{url('index')}}">Home</a>
    <span>›</span>
    <span style="color:#1c1c1c;font-weight:500;">Shopping Cart</span>
</div>

<div class="nc-page">
    <div class="nc-wrap">
        @if($cartItems->count() > 0)
        @php $sum = 0; $mrp = 0;
            foreach($cartItems as $_i) { $sum += ($_i->sr * $_i->qty); $mrp += ($_i->mrp * $_i->qty); }
        @endphp

        <div class="nc-layout">
            <div>
                <div class="nc-items-box">
                    <div class="nc-items-header">
                        <div class="nc-items-title">My Cart <span style="color:#878787;font-size:14px;">({{$cartCount}} items)</span></div>
                    </div>
                    <!-- <div class="nc-free-delivery-banner">
                        <i class="fa-solid fa-truck-fast"></i> Free delivery on this order
                    </div> -->

                    @foreach($cartItems as $item)
                    <div class="nc-item" id="cart-item_{{$item->product_id}}">
                        <div class="nc-item-img-wrap">
                            <img src="{{asset('public/assets/img/items/'.$item->image)}}" alt="{{$item->name}}">
                        </div>
                        <div class="nc-item-info">
                            <div class="nc-item-name">{{$item->name}}</div>
                            <div class="nc-item-seller">Seller: BrandsonStore &nbsp;<span style="color:#388e3c;font-size:12px;">✓ Trusted</span> <br>
                            Size : {{$item->size}} 
                        </div>
                            <div class="nc-item-price-row">
                                <span class="nc-item-sp">₹{{$item->sr}}</span>
                                <span class="nc-item-mrp">₹{{$item->mrp}}</span>
                                <span class="nc-item-disc">{{round((($item->mrp - $item->sr) / $item->mrp) * 100)}}% off</span>
                            </div>
                            <div class="nc-qty-row">
                                <span class="nc-qty-label">Qty:</span>
                                <div class="nc-qty-ctrl">
                                    <button class="nc-qty-btn quantity-btn btn-increment" data-id="{{$item->product_id}}" data-vid="2">−</button>
                                    <div class="nc-qty-num quantity-value" id="qty_{{$item->product_id}}">{{$item->qty}}</div>
                                    <button class="nc-qty-btn quantity-btn btn-increment" data-id="{{$item->product_id}}" data-vid="1">+</button>
                                </div>
                            </div>
                            <div class="nc-item-actions">
                                <a href="#" class="nc-item-act-btn remove-btn btn-increment" data-id="{{$item->product_id}}" data-vid="3">
                                    <i class="fa-regular fa-trash-can" style="font-size:12px;"></i> Remove
                                </a>
                                <a href="#" class="nc-item-act-btn">
                                    <i class="fa-regular fa-heart" style="font-size:12px;"></i> Save for later
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
<!-- 
                <div style="background:#fff;border:1px solid #ddd;border-top:none;border-radius:0 0 3px 3px;padding:16px 20px;text-align:right;">
                    <a href="{{url('shipping_details')}}" style="display:inline-block;">
                        <button type="button" class="checkout-btn" style="width:auto;padding:14px 56px;">Place Order</button>
                    </a>
                </div> -->
            </div>

            <div>
                <div class="nc-summary-box">
                    <div class="nc-summary-header">Price Details</div>
                    <div class="nc-summary-body">
                        <div class="nc-sum-row">
                            <span class="nc-sum-label">Price ({{$cartCount}} items)</span>
                            <span class="nc-sum-val" id="subtotal">₹{{$mrp}}</span>
                        </div>
                        <div class="nc-sum-row">
                            <span class="nc-sum-label">Discount</span>
                            <span class="nc-sum-val disc" id="discount">− ₹{{$mrp - $sum}}</span>
                        </div>
                        <div class="nc-sum-row">
                            <span class="nc-sum-label">Delivery Charges</span>
                            <span class="nc-sum-val disc">₹ 60 </span>
                        </div>
                        <hr class="nc-sum-divider">
                        <div class="nc-sum-total-row">
                            <span>Total Amount</span>
                            <span id="grandtotal">₹{{$sum + 60}}</span>
                        </div> 
                        @if($mrp > $sum)
                        <div class="nc-sum-savings">You will save ₹{{$mrp - $sum}} on this order</div>
                        @endif
                        <a href="{{url('shipping_details')}}" class="nc-checkout-btn">Place Order</a>
                        <div class="nc-secure-txt">
                            <i class="fa-solid fa-lock" style="font-size:11px;color:#388e3c;"></i> Safe and Secure Payments
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @else
        <div class="nc-empty-box">
            <div class="nc-empty-img">🛒</div>
            <div class="nc-empty-title">Your cart is empty!</div>
            <div class="nc-empty-sub">Add items to it now.</div>
            <a href="{{url('index')}}" class="nc-empty-btn">Shop Now</a>
        </div>
        @endif
    </div>
</div>

@endsection