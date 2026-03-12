@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Order Master
</h4>
<!-- Bordered Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Order Master</h5>
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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> Add New Record </button>
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="{{ route('orders.store') }}" method="POST"> @csrf <div class="modal-header">
              <h5 class="modal-title">Master Order Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Order ID</label>
                <input type="text" name="order_id" class="form-control" placeholder="Enter Order ID" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Customer ID</label>
                <select name="cus_id" class="form-select" required>
                  <option value="">Select Customer</option> @foreach ($customers as $customer) <option value="{{ $customer->id }}">{{ $customer->name }}</option> @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Total Amount</label>
                <input type="number" name="total_amount" class="form-control" placeholder="Enter Total Amount">
              </div>
              <div class="mb-3">
                <label class="form-label">Shipping Charge</label>
                <input type="number" name="shipping_charge" class="form-control" placeholder="Enter Shipping Charge">
              </div>
              <div class="mb-3">
                <label class="form-label">Discount</label>
                <input type="number" name="discount" class="form-control" placeholder="Enter Discount">
              </div>
              <div class="mb-3">
                <label class="form-label">Address ID</label>
                <input type="text" name="address_id" class="form-control" placeholder="Enter Address ID">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> Close </button>
              <button type="submit" class="btn btn-primary"> Save </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<div class="card-body">
  <div class="table-responsive text-nowrap">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Customer</th>
          <th>Total</th>
          <th>Shipping</th>
          <th>Discount</th>
          <th>Address id</th>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody> @foreach($orders as $order) <tr>
          <td>{{ $order->order_id }}</td>
          <td>{{ $order->customer->name ?? '-' }}</td>
          <td>{{ $order->total_amount }}</td>
          <td>{{ $order->shipping_charge }}</td>
          <td>{{ $order->discount }}</td>
          <td>{{ $order->address_id }}</td>
          <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">
                  <i class="bx bx-edit-alt me-1"></i> Edit </a>
                <a class="dropdown-item" href="#">
                  <i class="bx bx-trash me-1"></i> Delete </a>
              </div>
            </div>
        </tr> @endforeach </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $orders->appends(request()->query())->links() }}
    </div>
  </div>
</div>
</div>
<!--/ Bordered Table --> @endsection