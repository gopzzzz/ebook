@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Items
</h4>
<!-- Bordered Table -->
 <div class="card">
<div class="card-header">
  <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

    <h5 class="mb-0">Items</h5>

    <div class="d-flex align-items-center gap-2">

      <form method="GET" action="{{ route('items.index') }}" class="d-flex gap-2">
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
          <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data"> @csrf <div class="modal-header">
              <h5 class="modal-title">Items</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Author Name</label>
                <select name="author_id" class="form-select" required>
                  <option value="">Select </option> @foreach ($authors as $author) <option value="{{ $author->id }}">{{ $author->author_name }}</option> @endforeach
                </select>
              </div>
             <div class="mb-3">
                <label class="form-label">Publisher Name</label>
                <select name="publisher_id" class="form-select" required>
                  <option value="">Select </option> @foreach ($publishers as $publisher) <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option> @endforeach
                </select>
              </div>

              
              <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="cat_id" class="form-select" required>
                  <option value="">Select Category</option> @foreach ($categories as $category) <option value="{{ $category->id }}">{{ $category->category_name }}</option> @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">MRP</label>
                <input type="number" name="mrp" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Selling Rate</label>
                <input type="number" name="sr" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/png,image/jpeg" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
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
          <th>Image</th>
          <th>Name</th>
          <th>Category Name</th>
          <th>MRP</th>
          <th>Selling Price</th>
          
          <th>Actions</th>
        </tr>
      </thead>
      <tbody> @foreach ($items as $item) <tr>
        <td>{{ $items->firstItem() + $loop->index }}</td>
          <td>
            <img src="{{ asset('assets/img/items/'.$item->image) }}" width="50" height="50" style="object-fit: cover; border-radius: 6px;">
          </td>
          <td title="{{ $item->name }}">
    {{ \Illuminate\Support\Str::words($item->name, 8, '...') }}
</td>
          <td>{{ $item->category->category_name ?? '-' }}</td>
          <td>{{ $item->mrp }}</td>
          <td>{{ $item->sr }}</td>
          
          <td>
            <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditItemmodal" data-id="{{ $item->id }}" data-name="{{ e($item->name) }}" data-author="{{ $item->author_id }}" data-publisher="{{ $item->publisher_id }}"  data-category="{{ $item->cat_id }}" data-mrp="{{ $item->mrp }}" data-sr="{{ $item->sr }}" data-image="{{ $item->image }}" data-description="{{ e($item->description) }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit </a>
                <a href="#" class="dropdown-item text-danger">
                  <i class="bx bx-trash me-1"></i> Delete </a>
              </div>
            </div>
          </td>
        </tr> @endforeach </tbody>
    </table>
</div>
    <div class="d-flex justify-content-center mt-3">
        {{ $items->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="EditItemmodal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" id="editItemForm" enctype="multipart/form-data"> @csrf @method('POST') <div class="modal-header">
              <h5 class="modal-title">Edit Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" id="editName" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Author name</label>
                <select name="author_id" id="editAuthor" class="form-select" required> @foreach ($authors as $author) <option value="{{ $author->id }}">{{ $author->author_name }}</option> @endforeach </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Publisher</label>
                <select name="publisher_id" id="editPublisher" class="form-select" required> @foreach ($publishers as $publisher) <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option> @endforeach </select>
              </div>
              
              <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="cat_id" id="editCategory" class="form-select" required> @foreach ($categories as $category) <option value="{{ $category->id }}">{{ $category->category_name }}</option> @endforeach </select>
              </div>
              <div class="row">
                <div class="col">
                  <label class="form-label">MRP</label>
                  <input type="number" name="mrp" id="editMrp" class="form-control">
                </div>
                <div class="col">
                  <label class="form-label">SR</label>
                  <input type="number" name="sr" id="editSr" class="form-control">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Current Image</label>
                <br>
                <img id="editImagePreview" src="" class="img-thumbnail mb-2" width="120">
              </div>
              <div class="mb-3">
                <label class="form-label">Replace Image (optional)</label>
                <input type="file" name="image" class="form-control">
              </div>
              <div class="mt-3">
                <label class="form-label">Description</label>
                <textarea name="description" id="editDescription" class="form-control"></textarea>
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
        const editItemModal = document.getElementById('EditItemmodal');
        const form = document.getElementById('editItemForm');
        editItemModal.addEventListener('show.bs.modal', function(event) {
          const button = event.relatedTarget;
          form.action = `/items/update/${button.dataset.id}`;
          document.getElementById('editName').value = button.dataset.name;
          document.getElementById('editAuthor').value = button.dataset.author;
          document.getElementById('editPublisher').value = button.dataset.publisher;
          document.getElementById('editCategory').value = button.dataset.category;
          document.getElementById('editMrp').value = button.dataset.mrp;
          document.getElementById('editSr').value = button.dataset.sr;
          document.getElementById('editImagePreview').src = `/assets/img/items/${button.dataset.image}`;
          document.getElementById('editDescription').value = button.dataset.description ?? '';
        });
      });
    </script>
  </div>
</div>
</div>
<style>
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
}

.pagination li {
    list-style: none;
}

.pagination .page-link {
    padding: 6px 12px;
    margin: 0 3px;
}

.pagination svg {
    width: 16px;
    height: 16px;
}
</style>
<!--/ Bordered Table --> @endsection