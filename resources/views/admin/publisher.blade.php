@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Publisher
</h4>
<!-- Bordered Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Publisher</h5>
    <div class="d-flex align-items-center gap-2">

      <form method="GET" action="{{ route('publishers.index') }}" class="d-flex gap-2">
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
          <form action="{{ route('publishers.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="modal-header">
    <h5 class="modal-title">Publisher Creation</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

    <div class="mb-3">
        <label class="form-label">Publisher Logo</label>
        <input type="file" name="publisher_logo" id="publisher_logo" class="form-control" accept=".png,.jpg,.jpeg" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Publisher name</label>
        <input type="text" name="publisher_name" class="form-control" placeholder="Enter Name" required>
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
          <th>Publisher Logo</th>
          <th>Publisher</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody> @foreach ($publishers as $publisher) <tr>

          <td>
            <img src="{{ asset('uploads/publisher_logo/'.$publisher->publisher_logo) }}" width="50" height="50" style="object-fit: cover; border-radius: 6px;">
          </td>
          <td>
            {{ $publisher->publisher_name }}
          </td>
          <td>
            <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditPublishermodal" data-id="{{ $publisher->id }}" data-publisher_logo="{{$publisher->publisher_logo}}" data-name="{{ $publisher->publisher_name }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit </a>
                <a class="dropdown-item" href="#">
                  <i class="bx bx-trash me-1"></i> Delete </a>
              </div>
            </div>
          </td>
        </tr> @endforeach </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $publishers->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="EditPublishermodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editPublisherForm" enctype="multipart/form-data"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit Publisher</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Current Publisher Logo</label>
                <br>
                <img id="editLogoPreview" src="" class="img-thumbnail mb-2" width="120">
              </div>
              <div class="mb-3">
                <label class="form-label">Replace Publisher Logo (optional)</label>
                <input type="file" name="publisher_logo" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Publisher Name</label>
                <input type="text" name="publisher_name" id="editPublisherName" class="form-control" required>
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

    const editPublisherModal = document.getElementById('EditPublishermodal');
    const form = document.getElementById('editPublisherForm');
    const preview = document.getElementById('editLogoPreview');
    const nameInput = document.getElementById('editPublisherName');

    editPublisherModal.addEventListener('show.bs.modal', function(event) {

        const button = event.relatedTarget;

        const id = button.getAttribute('data-id');
        const publisher_logo = button.getAttribute('data-publisher_logo');
        const name = button.getAttribute('data-name');

        // show current logo
        preview.src = `{{ asset('uploads/publisher_logo') }}/${publisher_logo}`;

        // set publisher name
        nameInput.value = name;

        // set form action
        form.action = `/publishers/update/${id}`;

    });

});
</script>
  </div>
</div>
</div>
<!--/ Bordered Table --> @endsection