@extends('layouts.weblayout')

@section('content')

<style>
    .register-card {
        max-width: 460px;
        margin: auto;
    }

   
</style>





<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <div class="register-card w-100">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">

                    {{-- Error --}}
                    @if(session('error'))
                        <div class="alert alert-warning text-center small-text py-2">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Title --}}
                    <div class="text-center mb-3">
                        
                        <p class="text-muted mb-0">Join Aron Books</p>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('uregister') }}" method="POST" id="registerForm">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-2">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Your name" required>
                        </div>

                        {{-- Email --}}
                        <div class="mb-2">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Your email" required>
                        </div>

                        {{-- Password --}}
                        <div class="mb-2">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-2">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="cpassword" placeholder="Confirm password" required>
                            <small id="pass_error" class="text-danger small-text"></small>
                        </div>

                        {{-- Button --}}
                        <div class="d-grid mb-2 mt-3">
                            <button class="btn btn-primary" type="submit">
                                Register
                            </button>
                        </div>

                    </form>

                    {{-- Login --}}
                    <div class="text-center">
                        <span class="small-text">Already have an account?</span>
                        <a href="{{ url('userlogin') }}" class="small-text">Login</a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

{{-- Password Match Script --}}
<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    let password = document.getElementById('password').value;
    let confirm = document.getElementById('confirm_password').value;
    let error = document.getElementById('pass_error');

    if (password !== confirm) {
        e.preventDefault();
        error.innerText = "Passwords do not match!";
    } else {
        error.innerText = "";
    }
});
</script>
@endsection