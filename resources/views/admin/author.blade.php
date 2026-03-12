@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Author Creation
</h4>
<!-- Bordered Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Author</h5>
    <div class="d-flex align-items-center gap-2">

      <form method="GET" action="{{ route('authors.index') }}" class="d-flex gap-2">
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
          <form action="{{ route('authors.store') }}" method="POST"> @csrf <div class="modal-header">
              <h5 class="modal-title">Author Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Author name </label>
                <input type="text" name="author_name" class="form-control" placeholder="Enter Name" required>
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
          <th>Author Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody> @foreach ($authors as $author) <tr>
          <td>
            {{ $author->author_name }}
          </td>
          <td>
            <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditAuthormodal" data-id="{{ $author->id }}" data-name="{{ $author->author_name }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit </a>
                <a class="dropdown-item" href="#">
                  <i class="bx bx-trash me-1"></i> Delete </a>
              </div>
            </div>
          </td>
        </tr> @endforeach </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $authors->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="EditAuthormodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editAuthorForm"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit Author</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Author Name</label>
                <input type="text" name="author_name" id="editAuthorName" class="form-control" required>
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
      document.addEventListener('DOMContentLoaded', function() {
        const editAuthorModal = document.getElementById('EditAuthormodal');
        const form = document.getElementById('editAuthorForm');
        const nameInput = document.getElementById('editAuthorName');
        editAuthorModal.addEventListener('show.bs.modal', function(event) {
          const button = event.relatedTarget;
          const id = button.getAttribute('data-id');
          const name = button.getAttribute('data-name');
          nameInput.value = name;
          form.action = `/authors/update/${id}`;
        });
      });
    </script>
  </div>
</div>
</div>
<!--/ Bordered Table --> @endsection