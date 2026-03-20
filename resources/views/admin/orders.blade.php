@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> New Orders
</h4>
<!-- Bordered Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">New Orders</h5>
    <div class="d-flex align-items-center gap-2">

      <form method="GET" action="{{ route('orders.index') }}" class="d-flex gap-2">
        <input 
          type="text" 
          name="search"
          value="{{ request('search') }}"
          class="form-control"
          placeholder="Search item..."
        >
        <button type="submit" class="btn btn-outline-primary">Search</button>
      </form>
</div>
    
  
  </div>
<div class="card-body">
  <div class="table-responsive text-nowrap">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SL No.</th>
          <th>Order ID</th>
          <th>Customer</th>
          <th>Total</th>
          <th>Shipping</th>
          <th>Discount</th>
          <th>Address id</th>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody> @foreach($orders as $order) 
        <tr>
         <td>{{ $orders->firstItem() + $loop->index }}</td>
          <td>{{ $order->order_id }}</td>
          <td>{{ $order->customer_name?? '-' }}</td>
          <td>{{ $order->total_amount }}</td>
          <td>{{ $order->shipping_charge }}</td>
          <td>{{ $order->discount }}</td>
          <td>{{ $order->address_id }}</td>
          <td>
          <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">
                  <i class="bx bx-edit-alt me-1"></i> Update Status </a>
               
              </div>
            </div>
         </td>
        </tr>
         @endforeach
         </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $orders->appends(request()->query())->links() }}
    </div>
  </div>
</div>
</div>
<!--/ Bordered Table -->
 @endsection