@extends('layouts.weblayout')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <div class="card">
        <div class="card-body">
        @if(session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif
        

          <h3 class="mb-2 text-center">Welcome to Aron Books 👋</h3>
          <p class="mb-4 text-center">Register to explore books and manage your account</p>

          <form class="mb-3" action="{{ route('uregister') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Enter your email or username"
                required
              />
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input
                type="text"
                class="form-control"
                name="email"
                placeholder="Enter your email or username"
                required
              />
            </div>

           <div class="mb-3 form-password-toggle">
  <label class="form-label">Create Password</label>
  <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
</div>

<div class="mb-3 form-password-toggle">
  <label class="form-label">Confirm Password</label>
  <input type="password" class="form-control" id="confirm_password" name="cpassword" placeholder="Confirm password" required>
  <small id="pass_error" style="color:red;"></small>
</div>


            <div class="mb-3">
              <button class="btn btn-primary w-100" type="submit">
                Register
              </button>
            </div>

          </form>

          <p class="text-center">
            <span>You have an account?</span>
            <a href="{{url('userlogin')}}">
              <span>Login</span>
            </a>
          </p>

        </div>
      </div>

    </div>
  </div>
</div>


@endsection


