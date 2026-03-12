@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Shipping Address
</h4>
<!-- Bordered Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Shipping Address</h5>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> Add New Record </button>
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="{{ route('shippingaddress.store') }}" method="POST"> @csrf <div class="modal-header">
              <h5 class="modal-title">Shipping Address Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Customer ID</label>
                <select name="cus_id" class="form-select" required>
                  <option value="">Select Customer</option> @foreach ($customers as $customer) <option value="{{ $customer->id }}">{{ $customer->name }}</option> @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Address</label>
                <in type="text" name="address" class="form-control" placeholder="Enter Address">
              </div>
              <div class="mb-3">
                <label class="form-label">Pincode</label>
                <input type="number" name="pincode" class="form-control" placeholder="Enter Pincode">
              </div>
              <div class="mb-3">
                <label class="form-label">District</label>
                <input type="text" name="district" class="form-control" placeholder="Enter District">
              </div>
              <div class="mb-3">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control" placeholder="Enter state">
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
          
          <th>Customer</th>
          <th>Address</th>
          <th>Pincode</th>
          <th>District</th>
          <th>State</th>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
@foreach($shippingaddress as $address)
<tr>

<td>{{ $address->customer->name ?? '-' }}</td>
<td>{{ $address->address }}</td>
<td>{{ $address->pincode }}</td>
<td>{{ $address->district }}</td>
<td>{{ $address->state }}</td>

<td>
<div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
<a href="#" 
   class="dropdown-item"
   data-bs-toggle="modal"
   data-bs-target="#EditAddressModal"
   data-id="{{ $address->id }}"
   data-cus="{{ $address->cus_id }}"
   data-address="{{ e($address->address) }}"
   data-pincode="{{ $address->pincode }}"
   data-district="{{ $address->district }}"
   data-state="{{ $address->state }}">

<i class="bx bx-edit-alt me-1"></i> Edit
</a>

<a href="#" class="dropdown-item text-danger">
<i class="bx bx-trash me-1"></i> Delete
</a>
              </div>
            </div>
          </td>
        </tr> @endforeach </tbody>
    </table>
   <div class="modal fade" id="EditAddressModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <form method="POST" id="editAddressForm">
        @csrf
        @method('POST')

        <div class="modal-header">
          <h5 class="modal-title">Edit Shipping Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Customer</label>
            <select name="cus_id" id="editCustomer" class="form-select">
              @foreach ($customers as $customer)
              <option value="{{ $customer->id }}">
                {{ $customer->name }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" id="editAddress" class="form-control"></textarea>
          </div>

          <div class="row">
            <div class="col">
              <label class="form-label">Pincode</label>
              <input type="text" name="pincode" id="editPincode" class="form-control">
            </div>

            <div class="col">
              <label class="form-label">District</label>
              <input type="text" name="district" id="editDistrict" class="form-control">
            </div>
          </div>

          <div class="mt-3">
            <label class="form-label">State</label>
            <input type="text" name="state" id="editState" class="form-control">
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>
    <script>
document.addEventListener('DOMContentLoaded', function () {

  const editModal = document.getElementById('EditAddressModal');
  const form = document.getElementById('editAddressForm');

  editModal.addEventListener('show.bs.modal', function (event) {

    const button = event.relatedTarget;

    form.action = `/shippingaddress/update/${button.dataset.id}`;

    document.getElementById('editCustomer').value = button.dataset.cus;
    document.getElementById('editAddress').value = button.dataset.address;
    document.getElementById('editPincode').value = button.dataset.pincode;
    document.getElementById('editDistrict').value = button.dataset.district;
    document.getElementById('editState').value = button.dataset.state;

  });

});
</script>
  </div>
</div>
</div>
<!--/ Bordered Table --> @endsection