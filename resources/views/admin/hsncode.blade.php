@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> HSN CODE
</h4>
<!-- Bordered Table -->
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
    <h5 class="mb-0">HSN CODE</h5>
    <div class="d-flex align-items-center gap-2">

      <form method="GET" action="{{ route('categories.index') }}" class="d-flex gap-2">
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
          <form action="{{ route('hsn.store') }}" method="POST"> @csrf <div class="modal-header">
              <h5 class="modal-title">HSN CODE Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label">HSN Code</label>
            <input type="text"
                   name="hsn_code"
                   class="form-control"
                   placeholder="Enter HSN Code"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Tax (%)</label>
            <input type="number"
                   step="0.01"
                   name="tax"
                   class="form-control"
                   placeholder="Enter Total Tax"
                   required>
        </div>

        <div class="col-md-4">
            <label class="form-label">IGST (%)</label>
            <input type="number"
                   step="0.01"
                   name="igst"
                   class="form-control"
                   placeholder="Enter IGST"
                   required>
        </div>

        <div class="col-md-4">
            <label class="form-label">CGST (%)</label>
            <input type="number"
                   step="0.01"
                   name="cgst"
                   class="form-control"
                   placeholder="Enter CGST"
                   required>
        </div>

        <div class="col-md-4">
            <label class="form-label">SGST (%)</label>
            <input type="number"
                   step="0.01"
                   name="sgst"
                   class="form-control"
                   placeholder="Enter SGST"
                   required>
        </div>

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
          <th>HSN CODE</th>
           <th>Tax</th>
            <th>Igst</th>
             <th>Cgst</th>
              <th>Sgst</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody> @foreach ($data as $samples) <tr>
        <td>{{ $data->firstItem() + $loop->index }}</td>
          <td>
            {{ $samples->code }}
          </td>
           <td>
            {{ $samples->tax }}
          </td>
           <td>
            {{ $samples->igst }}
          </td>
           <td>
            {{ $samples->cgst }}
          </td>
           <td>
            {{ $samples->sgst }}
          </td>
          <td>
            <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Editmodal" data-id="{{ $samples->id }}" data-name="{{ $samples->code }}" data-tax="{{ $samples->tax }}" data-igst="{{ $samples->igst }}" data-cgst="{{ $samples->cgst }}" data-sgst="{{ $samples->sgst }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit </a>
               
              </div>
            </div>
          </td>
        </tr> @endforeach </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $data->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="Editmodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editCategoryForm"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit HSN CODE</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
           <div class="modal-body">
    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label">HSN Code</label>
            <input type="text"
                   name="hsn_code"
                   class="form-control"
                   placeholder="Enter HSN Code" id="edithsnname"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Tax (%)</label>
            <input type="number"
                   step="0.01"
                   name="tax"
                   class="form-control"
                   placeholder="Enter Total Tax" id="edithsntax"
                   required>
        </div>

        <div class="col-md-4">
            <label class="form-label">IGST (%)</label>
            <input type="number"
                   step="0.01"
                   name="igst"
                   class="form-control"
                   placeholder="Enter IGST" id="edithsnigst"
                   required>
        </div>

        <div class="col-md-4">
            <label class="form-label">CGST (%)</label>
            <input type="number"
                   step="0.01"
                   name="cgst"
                   class="form-control"
                   placeholder="Enter CGST" id="edithsncgst"
                   required>
        </div>

        <div class="col-md-4">
            <label class="form-label">SGST (%)</label>
            <input type="number"
                   step="0.01"
                   name="sgst"
                   class="form-control"
                   placeholder="Enter SGST" id="edithsnsgst"
                   required>
        </div>

    </div>
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
document.addEventListener('DOMContentLoaded', function () {

    const editModal = document.getElementById('Editmodal');
    const form = document.getElementById('editCategoryForm');

    const nameInput = document.getElementById('edithsnname');
    const taxInput = document.getElementById('edithsntax');
    const igstInput = document.getElementById('edithsnigst');
    const cgstInput = document.getElementById('edithsncgst');
    const sgstInput = document.getElementById('edithsnsgst');

    editModal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        const id = button.dataset.id;
        const name = button.dataset.name;
        const tax = button.dataset.tax;
        const igst = button.dataset.igst;
        const cgst = button.dataset.cgst;
        const sgst = button.dataset.sgst;

        nameInput.value = name || '';
        taxInput.value = tax || '';
        igstInput.value = igst || '';
        cgstInput.value = cgst || '';
        sgstInput.value = sgst || '';

        form.action = "{{ url('hsn/update') }}/" + id;

    });

});
</script>
  </div>
</div>
</div>
<!--/ Bordered Table --> @endsection