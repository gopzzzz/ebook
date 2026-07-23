@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Varients/ Attributes
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
    <h5 class="mb-0">Attributes</h5>
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
          <form action="{{ route('addattributes') }}" method="POST"> @csrf <div class="modal-header">
              <h5 class="modal-title">Attributes </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                <label class="form-label">Attributes Name</label>
                <input type="hidden" name="varientid" value="{{$id}}">
                <input type="text" name="attribute" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Attributes Value</label>
                <input type="hidden" name="varientid" value="{{$id}}">
                <input type="text" name="attribute_name" class="form-control" placeholder="Enter Value" required>
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
           <th>Attributes Name</th>
          <th>Attributes Value</th>
           
          <th>Actions</th>
        </tr>
      </thead>
      <tbody> @foreach ($attributes as $attribute) <tr>
        <td>{{ $attributes->firstItem() + $loop->index }}</td>
         <td>
            {{ $attribute->name }}
          </td>
          <td>
            {{ $attribute->value }}
          </td>
            
          <td>
            <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Editmodal" data-id="{{ $attribute->id }}" data-value="{{ $attribute->name }}" data-name="{{ $attribute->value }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit </a>
                <a class="dropdown-item delete-btn"  href="{{ route('attributedestroy', $attribute->id) }}">
                  <i class="bx bx-trash me-1"></i> Delete </a>
              </div>
            </div>
          </td>
        </tr> @endforeach </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $attributes->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="Editmodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editCategoryForm"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit Attributes</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                <label class="form-label">Attributes Name</label>
                <input type="text" name="attribute" id="editCategoryvalue" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Attributes Value</label>
                <input type="text" name="attribute_name" id="editCategoryName" class="form-control" required>
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
      const attributeInput = document.getElementById('editCategoryvalue');

        
        editModal.addEventListener('show.bs.modal', function(event) {
          const button = event.relatedTarget;
          const id = button.getAttribute('data-id');
          const name = button.getAttribute('data-name');
           const value = button.getAttribute('data-value');
          nameInput.value = name;
           attributeInput.value = value;
          form.action = "{{ url('editattributes') }}/" + button.dataset.id;
         
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
