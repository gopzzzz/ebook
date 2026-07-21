@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Category
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
    <h5 class="mb-0">Category</h5>
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
          <form action="{{ route('categories.store') }}" enctype="multipart/form-data" method="POST"> @csrf <div class="modal-header">
              <h5 class="modal-title">Category Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category_name" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/png,image/jpeg" required>
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
          <th>Category</th>
            <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody> @foreach ($categories as $category) <tr>
         <td>{{ $categories->firstItem() + $loop->index }}</td>
          <td>
            {{ $category->category_name }}
          </td>

           <td>
    <img src="{{ asset('public/uploads/banners/'.$category->image) }}" width="50" height="50" style="object-fit: cover; border-radius: 6px;">
  </td>
          <td>
            <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Editmodal"  data-image="{{ $category->image }}" data-id="{{ $category->id }}" data-name="{{ $category->category_name }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit </a>
                <a class="dropdown-item  delete-btn" href="{{ route('categories.delete', $category->id) }}">
                  <i class="bx bx-trash me-1"></i> Delete </a>
              </div>
            </div>
          </td>
        </tr> @endforeach </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $categories->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="Editmodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editCategoryForm"  enctype="multipart/form-data"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Current Image</label>
                <br>
                <img id="editBannerPreview" src="" class="img-thumbnail mb-2" width="120">
              </div>
              <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="category_name" id="editCategoryName" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Replace Image (optional)</label>
                <input type="file" name="image" class="form-control">
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
        const editModal = document.getElementById('Editmodal');
        const form = document.getElementById('editCategoryForm');
        const nameInput = document.getElementById('editCategoryName');
        editModal.addEventListener('show.bs.modal', function(event) {
          const button = event.relatedTarget;
          const id = button.getAttribute('data-id');
          const name = button.getAttribute('data-name');
          nameInput.value = name;
          form.action = "{{ url('categories/update') }}/" + button.dataset.id;
         
        });
      });
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-btn').forEach(function(btn) {

        btn.addEventListener('click', function(e) {
            e.preventDefault();

            let deleteUrl = this.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "This record will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }

            });
        });

    });

});
</script>
  </div>
</div>
</div>
 @endsection
