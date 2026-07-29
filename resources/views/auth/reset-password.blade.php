@extends('layouts.weblayout')

@section('content')
<style>
    .auth-page {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fdfdfd;
        padding: 2rem 1rem;
    }
    .auth-card {
        background: #ffffff;
        width: 100%;
        max-width: 460px;
        padding: 3rem 2.5rem;
        border-radius: 16px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(0,0,0,0.04);
    }
    .auth-title {
        font-size: 1.75rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 2rem;
        color: #111;
        letter-spacing: -0.02em;
    }
    .auth-input-group {
        margin-bottom: 1.5rem;
    }
    .auth-label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
        color: #444;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .auth-input {
        width: 100%;
        padding: 0.875rem 1.25rem;
        border: 2px solid #eee;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.2s;
        box-sizing: border-box;
        background: #fafafa;
    }
    .auth-input:focus {
        border-color: #111;
        background: #fff;
        outline: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .auth-btn {
        width: 100%;
        padding: 1rem;
        background: #111;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-top: 0.5rem;
    }
    .auth-btn:hover {
        background: #333;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .auth-btn:active {
        transform: translateY(0);
    }
    .auth-error {
        color: #d92d20;
        font-size: 0.8rem;
        margin-top: 0.4rem;
        display: block;
        font-weight: 500;
    }
</style>

<div class="auth-page">
    <div class="auth-card">

        <h3 class="auth-title">Reset Password</h3>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div class="auth-input-group">
                <label class="auth-label">Email Address</label>
                <input type="email" name="email" 
                       class="auth-input"
                       value="{{ old('email', request()->email) }}" 
                       required>
                @error('email')
                    <small class="auth-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="auth-input-group">
                <label class="auth-label">New Password</label>
                <input type="password" name="password" 
                       class="auth-input" required>
                @error('password')
                    <small class="auth-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="auth-input-group">
                <label class="auth-label">Confirm Password</label>
                <input type="password" name="password_confirmation" 
                       class="auth-input" required>
            </div>

            <button type="submit" class="auth-btn">
                Reset Password
            </button>
        </form>

    </div>
</div>
@endsection
