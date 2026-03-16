@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Banner
</h4>
<!-- Bordered Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Banner</h5>
    <div class="d-flex align-items-center gap-2">

      <form method="GET" action="{{ route('banners.index') }}" class="d-flex gap-2">
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
          <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">@csrf <div class="modal-header">
              <h5 class="modal-title">Banner Creation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Banner</label>
                <input type="file" name="banner" class="form-control" accept="image/png,image/jpeg" required>
</div>
              <div class="mb-3">
<label class="form-label">Banner Title</label>
<input type="text" name="banner_title" class="form-control" required>
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
          <th>Banner</th>
          <th>Banner Title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
@foreach ($banners as $banner)
<tr>
  <td>{{ $banners->firstItem() + $loop->index }}</td>
  <td>
    <img src="{{ asset('uploads/banners/'.$banner->banner) }}" width="50" height="50" style="object-fit: cover; border-radius: 6px;">
  </td>
   <td> {{ $banner->banner_title }}
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
           data-bs-target="#EditBannermodal"
           data-id="{{ $banner->id }}"
           data-banner="{{ $banner->banner }}"
           data-banner_title="{{ $banner->banner_title }}">
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
        {{ $banners->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="EditBannermodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editBannerForm" enctype="multipart/form-data"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit Banner</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Current Banner</label>
                <br>
                <img id="editBannerPreview" src="" class="img-thumbnail mb-2" width="120">
              </div>
              <div class="mb-3">
                <label class="form-label">Replace Banner (optional)</label>
                <input type="file" name="banner" class="form-control">
              </div>
              
              <div class="mb-3">
                <label class="form-label"> Banner Title</label>
                <input type="text" name="banner_title" id="editBannerTitle" class="form-control" required>
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

  const editBannerModal = document.getElementById('EditBannermodal');
  const form = document.getElementById('editBannerForm');
  const preview = document.getElementById('editBannerPreview');
  const titleInput = document.getElementById('editBannerTitle');

  editBannerModal.addEventListener('show.bs.modal', function (event) {

    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const banner = button.getAttribute('data-banner');
    const banner_title = button.getAttribute('data-banner_title');

    // set preview image
    preview.src = banner 
    ? `{{ asset('uploads/banners') }}/${banner}` 
    : '';

    // set banner title
    titleInput.value = banner_title;

    // update form action
   form.action = "{{ url('banners/update') }}/" + id;

  });

});
</script>
  </div>
</div>
</div>
<!--/ Bordered Table --> @endsection