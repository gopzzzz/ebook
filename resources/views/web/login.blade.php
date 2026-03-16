@extends('layouts.weblayout')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <div class="card">
        <div class="card-body">

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    @if(session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif

          <h3 class="mb-2 text-center">Welcome to Aron Books 👋</h3>
          <p class="mb-4 text-center">Login to explore books and manage your account</p>

          <form class="mb-3" action="{{ route('signin') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label class="form-label">Email or Username</label>
              <input
                type="text"
                class="form-control"
                name="email"
                placeholder="Enter your email or username"
                required
              />
            </div>

            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label">Password</label>
                <a href="#">
                  <small>Forgot Password?</small>
                </a>
              </div>

              <div class="input-group input-group-merge">
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  placeholder="Enter your password"
                  required
                />
               
              </div>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember">
                <label class="form-check-label">Remember Me</label>
              </div>
            </div>

            <div class="mb-3">
              <button class="btn btn-primary w-100" type="submit">
                Login
              </button>
            </div>

          </form>

          <p class="text-center">
            <span>Don't have an account?</span>
            <a href="{{url('user_registration')}}">
              <span>Register</span>
            </a>
          </p>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection