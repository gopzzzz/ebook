@extends('layouts.weblayout')

@section('content')

<div class="container" style="max-width:500px; margin-top:60px;">
    <div class="card shadow">
        <div class="card-body">

            <h3 class="text-center mb-4">Reset Password</h3>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Token -->
                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <!-- Email -->
                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email" 
                           class="form-control"
                           value="{{ old('email', request()->email) }}" 
                           required>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" name="password" 
                           class="form-control" required>

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" 
                           class="form-control" required>
                </div>

                <!-- Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection