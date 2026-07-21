@extends('layouts.weblayout')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <div class="w-100" style="max-width: 420px;">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    {{-- Alerts --}}
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-warning text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Title --}}
                    <h3 class="text-center mb-2">Forgot Password? 🔐</h3>
                    <p class="text-center text-muted mb-4">
                        Enter your email to receive a reset link
                    </p>

                    {{-- Form --}}
                    <form action="{{ route('reset') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control form-control-lg"
                                name="email"
                                placeholder="Enter your email"
                                required
                            >
                        </div>

                        {{-- Button --}}
                        <div class="d-grid mb-3">
                            <button class="btn btn-primary btn-lg" type="submit">
                                Send Reset Link
                            </button>
                        </div>

                    </form>

                    {{-- Back to login --}}
                    <p class="text-center mb-0">
                        <a href="{{ url('userlogin') }}">← Back to Login</a>
                    </p>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
