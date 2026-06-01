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
        
          <th>Status </th>
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
        <td>
    @if($order->status == 0)
        <span class="btn btn-warning btn-sm">Pending</span>
    @elseif($order->status == 1)
        <span class="btn btn-primary btn-sm">Confirmed</span>
    @elseif($order->status == 2)
        <span class="btn btn-info btn-sm">Shipped</span>
    @else
        <span class="btn btn-success btn-sm">Delivered</span>
    @endif
</td>
          <td>
          <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item editstatus" data-bs-toggle="modal" data-bs-target="#Editmodal" data-id="{{ $order->id }}" >
                  <i class="bx bx-edit-alt me-1"></i> Update Status </a>
                  <a href="{{url('orderview/'.$order->id)}}" class="dropdown-item"  data-id="{{ $order->id }}" target="_blank">
                  <i class="bx bx-show-alt me-1"></i> View Order </a>
               
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
        <div class="modal fade" id="Editmodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ route('updateStatus')}}" id="editStatusForm">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Update Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                         <label for="order_status" class="form-label">Shipping Address</label>
                         <input type="hidden" name="id" id="id">
                       <textarea class="form-control" id="address"> </textarea>
                        <label for="order_status" class="form-label">Order Status</label>
                        <select name="order_status" id="order_status" class="form-control" required>
                            <option value="0">Pending</option>
                            <option value="1">Confirmed</option>
                            <option value="2">Shipped</option>
                            <option value="3">Delivered</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>

</div>
</div>
<!--/ Bordered Table -->
 @endsection

<script>
    document.querySelectorAll('.editStatusBtn').forEach(button => {
        button.addEventListener('click', function () {
            let orderId = this.getAttribute('data-id');
            let status = this.getAttribute('data-status');

            console.log('Order ID:', orderId);

            document.getElementById('order_status').value = status;
            document.getElementById('editStatusForm').action = `/orders/status/${orderId}`;
        });
    });
</script>



