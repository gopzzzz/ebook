@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Customer
</h4>
<!-- Bordered Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Customer</h5>
    <div class="d-flex align-items-center gap-2">

      <form method="GET" action="{{ route('customers.index') }}" class="d-flex gap-2">
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
          <form action="{{ route('customers.store') }}" method="POST"> @csrf <div class="modal-header">
              <h5 class="modal-title">Customer Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="mb-3">
              <label class="form-label">Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter Address">
            </div>

            <div class="mb-3">
              <label class="form-label">Pincode</label>
              <input type="text" name="pincode" class="form-control" placeholder="Enter Pincode">
            </div>

            <div class="mb-3">
              <label class="form-label">District</label>
              <input type="text" name="district" class="form-control" placeholder="Enter District">
            </div>

            <div class="mb-3">
              <label class="form-label">State</label>
              <input type="text" name="state" class="form-control" placeholder="Enter State">
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
</div>
<div class="card-body">
  <div class="table-responsive text-nowrap">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SL No.</th>
          <th>Name</th>
          <th>Shipping address </th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
@foreach ($customers as $customer)
<tr>
  <td>{{ $customers->firstItem() + $loop->index }}</td>
  <td>
    {{ $customer->name }}</td>
   <td>{{ $customer->shipping_address ?? '-' }}</td>

  <td>
    <div class="dropdown position-static">
      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
      </button>

      <div class="dropdown-menu">
        <a href="#"
           class="dropdown-item"
           data-bs-toggle="modal"
           data-bs-target="#EditCustomermodal"
           data-id="{{ $customer->id }}"
           data-name="{{ $customer->name }}"
           data-shipping-address="{{ $customer->shipping_address }}">
          <i class="bx bx-edit-alt me-1"></i> Edit
        </a>

        <a class="dropdown-item text-danger" href="#">
          <i class="bx bx-trash me-1"></i> Delete
        </a>
      </div>
    </div>
  </td>
</tr>
@endforeach
</tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $customers->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="EditCustomermodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editCustomerForm"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label"> Name</label>
                <input type="text" name="name" id="editCustomerName" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Shipping Address</label>
                <input type="text" name="shipping_address" id="editShippingAddress" class="form-control">
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> Close </button>
              <button type="submit" class="btn btn-primary"> Update </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {

  const editCustomerModal = document.getElementById('EditCustomermodal');
  const form = document.getElementById('editCustomerForm');
  const nameInput = document.getElementById('editCustomerName');
  const shippingInput = document.getElementById('editShippingAddress');

  editCustomerModal.addEventListener('show.bs.modal', function(event) {

    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');
   const shippingAddress = button.getAttribute('data-shipping-address');

    nameInput.value = name;
   shippingInput.value = shippingAddress ?? '';

    form.action = `/customers/update/${id}`;

  });

});
    </script>
  </div>
</div>
</div>
<!--/ Bordered Table --> @endsection