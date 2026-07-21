@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Offer
</h4>
<div class="card">
   @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Offer</h5>
    <div class="d-flex align-items-center gap-2">

      <form method="GET" action="{{ route('offers.index') }}" class="d-flex gap-2">
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
          <form action="{{ route('offers.store') }}" method="POST"> @csrf <div class="modal-header">
              <h5 class="modal-title">Offer Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
             <div class="mb-3">
    <label class="form-label">Type</label>
    <select name="type" class="form-control" required>
        <option value="">Select Type</option>
        <option value="1">Deal of the Day</option>
    </select>
</div>
            <div class="mb-3">
                <label class="form-label">Product</label>
                <select name="product_id" class="form-select" required>
                  <option value="">Select Product</option> @foreach ($items as $item) <option value="{{ $item->id }}">{{ $item->name }}</option> @endforeach
                </select>
              </div>

 <div class="mb-3">
<label class="form-label">Amount</label>
<input type="text" name="amount" class="form-control" required>
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
</div>
<div class="card-body">
  <div class="table-responsive text-nowrap">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SL No.</th>
          <th>Type</th>
          <th>Product</th>
          <th>Amount</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
@foreach ($offers as $offer)
<tr>
  <td>{{ $offers->firstItem() + $loop->index }}</td>
  <td>
    {{ $offer->type }}</td>
   <td title="{{ $offer->item->name ?? '-' }}">
{{ \Illuminate\Support\Str::words($offer->item->name ?? '-', 10, '...') }}
</td>
  <td> {{ $offer->amount }}
  </td>

  <td>
    <div class="dropdown position-static">
      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
      </button>

      <div class="dropdown-menu">
        <a href="#"
           class="dropdown-item"
           data-bs-toggle="modal"
           data-bs-target="#EditOffermodal"
           data-id="{{ $offer->id }}"
           data-type="{{ $offer->type }}"
           data-productid="{{ $offer->product_id }}"
           data-amount="{{ $offer->amount }}">
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
        {{ $offers->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="EditOffermodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <form method="POST" id="editOfferForm">
    @csrf

    <div class="modal-header">
        <h5 class="modal-title">Edit Offer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <div class="modal-body">

        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type" id="editOfferType" class="form-control" required>
                <option value="">Select Type</option>
                <option value="1">Deal of the Day</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Product</label>
            <select name="product_id" id="editProductid" class="form-select" required>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="text" name="amount" id="editamount" class="form-control" required>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </div>
</form>
        </div>
      </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {

    const editOfferModal = document.getElementById('EditOffermodal');
    const form = document.getElementById('editOfferForm');

    const typeInput = document.getElementById('editOfferType');
    const productIdInput = document.getElementById('editProductid');
    const amountInput = document.getElementById('editamount');

    if (editOfferModal) {

        editOfferModal.addEventListener('show.bs.modal', function (event) {

            const button = event.relatedTarget;

            if (!button) return;

            const id = button.dataset.id;
            const type = button.dataset.type;
            const productId = button.dataset.productid;
            const amount = button.dataset.amount;

            typeInput.value = type || '';
            productIdInput.value = productId || '';
            amountInput.value = amount || '';

            form.action = "{{ url('offers/update') }}/" + id;
        });
    }

});
</script>
  </div>
</div>
</div>
 @endsection
