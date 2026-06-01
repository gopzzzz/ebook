@extends('layouts.weblayout')

@section('content')

<style>

/* ===== NAVBAR FIX ===== */
.navbar-nav {
    flex-direction: row !important;
    flex-wrap: nowrap;
    overflow-x: auto;
}

.navbar-nav::-webkit-scrollbar {
    display: none;
}

.nav-link {
    white-space: nowrap;
    font-size: 14px;
    padding: 6px 10px;
}

/* ===== CONTAINER ===== */
.container-xxl {
    width: 100% !important;
    padding: 10px;
}

/* ===== PROFILE ===== */
.card {
    border-radius: 10px;
}

.address-box {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
    font-size: 14px;
}

/* ===== ORDER ===== */
.order-container {
    width: 100%;
}

.order-title {
    font-size: 20px;
    margin-bottom: 10px;
    color: #F59E0B;
}

/* CARD */
.order-card {
    border: 1px solid #ddd;
    padding: 12px;
    margin-bottom: 12px;
    background: #fff;
    border-radius: 8px;
}

/* HEADER */
.order-header {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    font-size: 13px;
}

/* BODY */
.order-body {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
    flex-wrap: wrap;
}

/* PRICE */
.order-price {
    font-size: 15px;
    font-weight: bold;
}

/* BUTTON */
.view-btn {
    background: #f59e0b;
    color: #fff;
    padding: 6px 10px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 13px;
}

/* ===== MOBILE FIX ===== */
@media (max-width: 768px) {

    /* NAVBAR STACK */
    .container-fluid {
        flex-wrap: wrap !important;
    }

    /* MOVE LOGOUT DOWN */
    .navbar-nav:last-child {
        width: 100%;
        justify-content: flex-end;
        margin-top: 5px;
    }

    /* ORDER STACK */
    .order-body {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .order-header {
        flex-direction: column;
        gap: 3px;
    }

    .view-btn {
        width: 100%;
        text-align: center;
    }

}

</style>


<div class="container-xxl">

  <!-- NAVBAR -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid d-flex justify-content-between">

      <!-- LEFT MENU -->
      <ul class="navbar-nav flex-row nav nav-tabs border-0">

        <li class="nav-item me-2">
          <button class="nav-link text-white active"
                  data-bs-toggle="tab"
                  data-bs-target="#profile"
                  type="button">
            👤 Profile
          </button>
        </li>

        <li class="nav-item me-2">
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

    <!-- PROFILE -->
    <div class="tab-pane fade show active" id="profile">
      <div class="card">
        <div class="card-body">

          <h5>👤 Profile</h5>

          <p><strong>Name:</strong> {{ $profile->name }}</p>

          <h6 class="mt-3">📍 Shipping Address</h6>

          @forelse($cusAddress as $address)
            <div class="address-box">
              {{ $address->address }},
              {{ $address->district }},
              {{ $address->state }} - {{ $address->pincode }} <br>
              📞 {{ $address->phone_number }}
            </div>
          @empty
            <p>No address found</p>
          @endforelse

        </div>
      </div>
    </div>

    <!-- ORDERS -->
    <div class="tab-pane fade" id="orders">
      <div class="card">
        <div class="card-body">

          <div class="order-container">

            <h5 class="order-title">📦 My Orders</h5>

            @if($orders->count() > 0)

              @foreach($orders as $order)

              <div class="order-card">

                <div class="order-header">
                  <div><strong>ID:</strong> {{ $order->order_id }}</div>
                  <div>{{ date('d M Y', strtotime($order->created_at)) }}</div>
                </div>

                <div class="order-body">

                  <div class="order-price">
                    ₹ {{ $order->total_amount }}
                  </div>

                  <a href="{{ route('orderview', $order->id) }}"
                     class="view-btn" target="_blank">
                     View Details
                  </a>

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