@extends('layouts.mainlayout')

@section('content')

<style>
.profile-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    transition: 0.3s;
}
.profile-card:hover {
    transform: translateY(-6px);
}
.profile-cover {
    height: 150px;
    background: linear-gradient(135deg, #4e73df, #224abe);
}
.profile-img {
    margin-top: -60px;
    text-align: center;
}
.profile-img img {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    border: 5px solid #fff;
    object-fit: cover;
}
.profile-body {
    padding: 20px;
}
</style>

@php
    $profile = $admin;
    $logo = data_get($profile, 'logo');
    $name = data_get($profile, 'name', 'No Name');
    $desc = data_get($profile, 'description');
    $email = data_get($profile, 'email', '-');
    $phone = data_get($profile, 'phone_number', '-');
    $address = data_get($profile, 'address', '-');

    $facebook = data_get($profile, 'facebook_link');
    $youtube = data_get($profile, 'youtube_link');
    $insta = data_get($profile, 'insta_link');
    $twitter = data_get($profile, 'twitter_link');
    
   
@endphp

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Profile
</h4>

<div class="card mb-4">
<div class="row justify-content-center">

@if($profile)

<div class="col-md-8 col-lg-6">
    <div class="profile-card">

        <div class="profile-cover"></div>

        {{-- PROFILE IMAGE --}}
        <div class="profile-img">
            <img 
                src="{{ !empty($logo) ? asset('public/uploads/profile/'.$logo) : 'https://via.placeholder.com/110' }}">
        </div>

        <div class="profile-body">

            <div class="text-center mb-4">
                <h3 class="fw-bold">{{ $name }} </h3>

                @if(!empty($desc))
                    <p class="text-muted">{{ $desc }}</p>
                @endif
            </div>

            <div class="px-4 text-start">

                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Phone:</strong> {{ $phone }}</p>
                <p><strong>Address:</strong> {{ $address }}</p>

               <div class="d-flex justify-content-start gap-3 mt-3">

    @if(!empty($facebook))
        <a href="{{ $facebook }}" target="_blank" class="social-icon fb">
            <i class="fab fa-facebook-f"></i>
        </a>
    @endif

    @if(!empty($youtube))
        <a href="{{ $youtube }}" target="_blank" class="social-icon yt">
            <i class="fab fa-youtube"></i>
        </a>
    @endif

    @if(!empty($insta))
        <a href="{{ $insta }}" target="_blank" class="social-icon insta">
            <i class="fab fa-instagram"></i>
        </a>
    @endif

    @if(!empty($twitter))
        <a href="{{ $twitter }}" target="_blank" class="social-icon tw">
            <i class="fab fa-twitter"></i>
        </a>
    @endif

</div>

            </div>

            <div class="text-center mt-4">
                <button class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#EditProfileModal">
                    Edit Profile
                </button>
            </div>

        </div>
    </div>
</div>

@endif

</div>
</div>

{{-- ================= MODAL ================= --}}
@if($profile)
<div class="modal fade" id="EditProfileModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <form method="POST" enctype="multipart/form-data" action="{{url('profiles/update')}}">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3 text-center">
            <label>Current Logo</label><br>
            
            <img 
                src="{{ !empty($logo) ? asset('public/uploads/profile/'.$logo) : 'https://via.placeholder.com/120' }}" 
                class="img-thumbnail" width="120">
          </div>

          <div class="mb-3">
            <label>Replace Logo</label>
            <input type="file" name="logo" class="form-control">
          </div>

          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $name }}">
          </div>

          <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $desc ?? '' }}</textarea>
          </div>

          <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $phone }}">
          </div>

          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $email }}">
          </div>

          <div class="mb-3">
            <label>Facebook</label>
            <input type="text" name="facebook_link" class="form-control" value="{{ $facebook ?? '' }}">
          </div>

          <div class="mb-3">
            <label>YouTube</label>
            <input type="text" name="youtube_link" class="form-control" value="{{ $youtube ?? '' }}">
          </div>

          <div class="mb-3">
            <label>Instagram</label>
            <input type="text" name="insta_link" class="form-control" value="{{ $insta ?? '' }}">
          </div>

          <div class="mb-3">
            <label>Twitter</label>
            <input type="text" name="twitter_link" class="form-control" value="{{ $twitter ?? '' }}">
          </div>

          <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ $address }}</textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>
@endif

@endsection
