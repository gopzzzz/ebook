@extends('layouts.weblayout')

@section('content')

<style>
.navbar-nav {
    flex-direction: row !important;
}

.nav-link {
    white-space: nowrap;
}

.container-fluid {
    overflow-x: auto;
}

.container-fluid::-webkit-scrollbar {
    display: none;
}


</style>

<style>
.order-container{
    width:90%;
    margin:40px auto;
}
.order-title{
    font-size:28px;
    margin-bottom:20px;
    color:#F59E0B;
}
.order-card{
    border:1px solid #ddd;
    padding:20px;
    margin-bottom:15px;
    background:#fff;
}
.order-header{
    display:flex;
    justify-content:space-between;
    margin-bottom:10px;
}
.order-id{
    font-weight:bold;
}
.order-status{
    color:green;
    font-weight:bold;
}
.order-body{
    display:flex;
    justify-content:space-between;
}
.order-price{
    font-size:18px;
    font-weight:bold;
}
.view-btn{
    background:#f59e0b;
    color:#fff;
    padding:8px 15px;
    text-decoration:none;
}
</style>
<div class="container-xxl" style="width:100%;">

  <!-- NAVBAR -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid d-flex justify-content-between flex-nowrap">

      <!-- LEFT MENU -->
      <ul class="navbar-nav flex-row nav nav-tabs border-0">

        <li class="nav-item me-3">
          <button class="nav-link text-white active"
                  data-bs-toggle="tab"
                  data-bs-target="#profile"
                  type="button">
            👤 Profile
          </button>
        </li>

        <li class="nav-item me-3">
          <button class="nav-link text-white"
                  data-bs-toggle="tab"
                  data-bs-target="#orders"
                  type="button">
            📦 Orders
          </button>
        </li>

      </ul>

      <!-- RIGHT MENU -->
      <ul class="navbar-nav flex-row">
        <li class="nav-item">
          <a class="nav-link text-danger" href="{{url('logout')}}">🚪 Logout</a>
        </li>
      </ul>

    </div>
  </nav>

  <!-- TAB CONTENT -->
  <div class="tab-content mt-3">

    <!-- Profile Tab -->
 <div class="tab-pane fade show active" id="profile">
  <div class="card">
    <div class="card-body">

      <h3>Profile</h3>

      <p>👤 {{ $profile->name }}</p>
      <!-- <p>📞 {{ $profile->phone_number }}</p> -->

      

      <h5>📍 Shipping Address</h5>

      @forelse($cusAddress as $address)
        <div class="border p-2 mb-2 rounded">
          {{ $address->address }}, {{ $address->district }}, {{ $address->state }} - {{ $address->pincode }} <br>
          📞 {{ $address->phone_number }}
        </div>
      @empty
        <p>No address found</p>
      @endforelse

    </div>
  </div>
</div>

    <!-- Orders Tab -->
    <div class="tab-pane fade" id="orders">
      <div class="card">
        <div class="card-body">
       <div class="order-container">

    <h2 class="order-title">My Orders</h2>

    @if($orders->count() > 0)

        @foreach($orders as $order)

        <div class="order-card">

            <div class="order-header">
                <div class="order-id">
                    Order ID: {{ $order->order_id }}
                </div>

                <div class="order-status">
                    <!-- {{ $order->status ?? 'Placed' }} -->
                </div>
            </div>

            <div class="order-body">

                <div>
                    <p>Date: {{ date('d M Y', strtotime($order->created_at)) }}</p>
                    <!-- <p>Total Items: {{ $order->total_items ?? '-' }}</p> -->
                </div>

                <div class="order-price">
                    ₹ {{ $order->total_amount }}
                </div>

                <div>
                    <a href="{{ route('orderview', $order->id) }}" class="view-btn">
                        View Details
                    </a>
                </div>

            </div>

        </div>

        @endforeach

    @else
        <p>No orders found</p>
    @endif

</div>
          
        </div>
      </div>
    </div>

  </div>

</div>


@endsection