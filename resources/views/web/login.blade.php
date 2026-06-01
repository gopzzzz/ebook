@extends('layouts.weblayout')

@section('content')
<style>
    .login-card {
        max-width: 450px;
        margin: auto;
    }

   
</style>

<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <div class="login-card w-100">

            <div class="card shadow-sm border-0">
                <div class="card-body p-3">

                    {{-- Alerts --}}
                    @if(session('success'))
                        <div class="alert alert-success text-center small-text py-2">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger text-center small-text py-2">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Title --}}
                    <div class="text-center mb-3">
                        <h5 class="mb-1">Login</h5>
                        <p class="text-muted small-text mb-0">
                            Access your account
                        </p>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('signin') }}" method="POST">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-2">
                            <label>Email / Username</label>
                            <input 
                                type="text"
                                class="form-control"
                                name="email"
                                placeholder="Enter email or username"
                                required
                            >
                        </div>

                        {{-- Password --}}
                        <div class="mb-2">
                            <div class="d-flex justify-content-between">
                                <label>Password</label>
                                <a href="{{ url('forget_password') }}" class="small-text">
                                    Forgot?
                                </a>
                            </div>

                            <input 
                                type="password"
                                class="form-control"
                                name="password"
                                placeholder="Enter password"
                                required
                            >
                        </div>

                        {{-- Remember --}}
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label small-text" for="remember">
                                Remember me
                            </label>
                        </div>

                        {{-- Button --}}
                        <div class="d-grid mb-2">
                            <button class="btn btn-primary" type="submit">
                                Login
                            </button>
                        </div>

                    </form>

                    {{-- Register --}}
                    <div class="text-center">
                        <span class="small-text">No account?</span>
                        <a href="{{ url('user_registration') }}" class="small-text">
                            Register
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection