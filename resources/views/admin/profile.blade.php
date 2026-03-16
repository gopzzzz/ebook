@extends('layouts.mainlayout')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Profiles
</h4>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Profiles</h5>

    <div class="d-flex align-items-center gap-2">
      <form method="GET" action="{{ route('profiles.index') }}" class="d-flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search profile...">
        <button type="submit" class="btn btn-outline-primary">Search</button>
      </form>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProfileModal">
      Add New Record
    </button>

    {{-- CREATE PROFILE MODAL --}}
    <div class="modal fade" id="createProfileModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-header">
              <h5 class="modal-title">Create Profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

              <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/png,image/jpeg" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input type="text" name="facebook_link" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Youtube</label>
                <input type="text" name="youtube_link" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input type="text" name="insta_link" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Twitter</label>
                <input type="text" name="twitter_link" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control"></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone_number" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
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
          <th>SL No.</th>
          <th>Logo</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($profiles as $profile)
        <tr>
          <td>{{ $profiles->firstItem() + $loop->index }}</td>
          <td>
            <img src="{{ asset('uploads/profile/'.$profile->logo) }}" width="50" height="50" style="object-fit:cover;border-radius:6px;">
          </td>

          <td>{{ $profile->name }}</td>
          <td>{{ $profile->phone_number }}</td>
          <td>{{ $profile->email }}</td>
          <td>{{ $profile->address }}</td>

          <td>
            <div class="dropdown position-static">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>

              <div class="dropdown-menu">

                <a href="#" class="dropdown-item"
                data-bs-toggle="modal"
                data-bs-target="#EditProfileModal"

                data-id="{{ $profile->id }}"
                data-logo="{{ $profile->logo }}"
                data-name="{{ $profile->name }}"
                data-phone="{{ $profile->phone_number }}"
                data-email="{{ $profile->email }}"
                data-address="{{ $profile->address }}"
                data-description="{{ $profile->description }}"
                data-facebook="{{ $profile->facebook_link }}"
                data-youtube="{{ $profile->youtube_link }}"
                data-insta="{{ $profile->insta_link }}"
                data-twitter="{{ $profile->twitter_link }}"
                >

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
      {{ $profiles->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="EditProfileModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <form method="POST" id="editProfileForm" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Current Logo</label>
            <br>
            <img id="editLogoPreview" src="" class="img-thumbnail mb-2" width="120">
          </div>

          <div class="mb-3">
            <label class="form-label">Replace Logo</label>
            <input type="file" name="logo" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" id="editName" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="editDescription" class="form-control"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone_number" id="editPhone" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" id="editEmail" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Facebook</label>
            <input type="text" name="facebook_link" id="editFacebook" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Youtube</label>
            <input type="text" name="youtube_link" id="editYoutube" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Instagram</label>
            <input type="text" name="insta_link" id="editInsta" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Twitter</label>
            <input type="text" name="twitter_link" id="editTwitter" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" id="editAddress" class="form-control"></textarea>
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

const editModal = document.getElementById('EditProfileModal');

const form = document.getElementById('editProfileForm');

const preview = document.getElementById('editLogoPreview');

const nameInput = document.getElementById('editName');
const descriptionInput = document.getElementById('editDescription');
const phoneInput = document.getElementById('editPhone');
const emailInput = document.getElementById('editEmail');
const facebookInput = document.getElementById('editFacebook');
const youtubeInput = document.getElementById('editYoutube');
const instaInput = document.getElementById('editInsta');
const twitterInput = document.getElementById('editTwitter');
const addressInput = document.getElementById('editAddress');

editModal.addEventListener('show.bs.modal', function(event) {

const button = event.relatedTarget;

const id = button.getAttribute('data-id');
const logo = button.getAttribute('data-logo');
const name = button.getAttribute('data-name');
const description = button.getAttribute('data-description');
const phone = button.getAttribute('data-phone');
const email = button.getAttribute('data-email');
const facebook = button.getAttribute('data-facebook');
const youtube = button.getAttribute('data-youtube');
const insta = button.getAttribute('data-insta');
const twitter = button.getAttribute('data-twitter');
const address = button.getAttribute('data-address');

console.log(facebook, youtube, insta, twitter);

preview.src = logo ? "{{ asset('uploads/profile') }}/" + logo : "";

nameInput.value = name || "";
descriptionInput.value = description || "";
phoneInput.value = phone || "";
emailInput.value = email || "";
facebookInput.value = facebook || "";
youtubeInput.value = youtube || "";
instaInput.value = insta || "";
twitterInput.value = twitter || "";
addressInput.value = address || "";

form.action = "{{ url('profiles/update') }}/" + id;

});

});

</script>

</div>
</div>

@endsection