@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Ads
</h4>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Ads</h5>
    <div class="d-flex align-items-center gap-2">
      <form method="GET" action="{{ route('ads.index') }}" class="d-flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search ad...">
        <button type="submit" class="btn btn-outline-primary">Search</button>
      </form>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> Add New Record </button>
    
    <div class="modal fade" id="modalCenter" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data"> @csrf <div class="modal-header">
              <h5 class="modal-title">Ad Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/png,image/jpeg" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Link</label>
                <input type="text" name="link" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
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
          <th>Name</th>
          <th>Image</th>
          <th>Amount</th>
          <th>Link</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody> @foreach ($ads as $ad) <tr>
          <td>{{ $ad->name }}</td>
          <td>
            <img src="{{ asset('uploads/ads/'.$ad->image) }}" width="50" height="50" style="object-fit: cover; border-radius: 6px;">
          </td>
          <td>{{ $ad->amount }}</td>
          <td>{{ $ad->link }}</td>
          <td>{{ $ad->start_date }}</td>
          <td>{{ $ad->end_date }}</td>
          <td>
            <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditAdmodal" data-id="{{ $ad->id }}" data-name="{{ $ad->name }}" data-image="{{ $ad->image }}" data-amount="{{ $ad->amount }}" data-link="{{ $ad->link }}" data-start="{{ $ad->start_date }}" data-end="{{ $ad->end_date }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit </a>
                <a class="dropdown-item text-danger" href="#">
                  <i class="bx bx-trash me-1"></i> Delete </a>
              </div>
            </div>
          </td>
        </tr> @endforeach </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
      {{ $ads->appends(request()->query())->links() }}
    </div>
    
    <div class="modal fade" id="EditAdmodal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editAdForm" enctype="multipart/form-data"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit Ad</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" id="editName" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Current Image</label>
                <br>
                <img id="editAdPreview" src="" class="img-thumbnail mb-2" width="120">
              </div>
              <div class="mb-3">
                <label class="form-label">Replace Image (optional)</label>
                <input type="file" name="image" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" id="editAmount" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Link</label>
                <input type="text" name="link" id="editLink" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" id="editStart" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" id="editEnd" class="form-control">
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
      document.addEventListener('DOMContentLoaded', function() {
        const editAdModal = document.getElementById('EditAdmodal');
        const form = document.getElementById('editAdForm');
        const preview = document.getElementById('editAdPreview');
        const nameInput = document.getElementById('editName');
        const amountInput = document.getElementById('editAmount');
        const linkInput = document.getElementById('editLink');
        const startInput = document.getElementById('editStart');
        const endInput = document.getElementById('editEnd');
        editAdModal.addEventListener('show.bs.modal', function(event) {
          const button = event.relatedTarget;
          const id = button.getAttribute('data-id');
          const image = button.getAttribute('data-image');
          const name = button.getAttribute('data-name');
          const amount = button.getAttribute('data-amount');
          const link = button.getAttribute('data-link');
          const start = button.getAttribute('data-start');
          const end = button.getAttribute('data-end');
          preview.src = image ? "{{ asset('uploads/ads') }}/" + image : "";
          nameInput.value = name;
          amountInput.value = amount;
          linkInput.value = link;
          startInput.value = start;
          endInput.value = end;
          form.action = "{{ url('ads/update') }}/" + id;
        });
      });
    </script>
  </div>
</div>
</div> @endsection