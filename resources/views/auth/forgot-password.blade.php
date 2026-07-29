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
        margin-bottom: 0.5rem;
        color: #111;
        letter-spacing: -0.02em;
    }
    .auth-subtitle {
        text-align: center;
        color: #667;
        font-size: 0.95rem;
        margin-bottom: 2.5rem;
        line-height: 1.5;
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
    .auth-link {
        display: block;
        text-align: center;
        margin-top: 1.5rem;
        color: #666;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        transition: color 0.2s;
    }
    .auth-link:hover {
        color: #111;
    }
    .auth-alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        font-weight: 500;
        text-align: center;
    }
    .auth-alert.success { background: #e6f6ee; color: #0d8246; border: 1px solid #c3ebd5; }
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
        
        @if(session('status'))
            <div class="auth-alert success">
                {{ session('status') }}
            </div>
        @endif

        <h3 class="auth-title">Forgot Password?</h3>
        <p class="auth-subtitle">No worries, we'll send you reset instructions.</p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="auth-input-group">
                <label class="auth-label">Email Address</label>
                <input
                    type="email"
                    class="auth-input"
                    name="email"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                    <span class="auth-error">{{ $message }}</span>
                @enderror
            </div>
            
            <button class="auth-btn" type="submit">
                Email Password Reset Link
            </button>
        </form>

        <a href="{{ url('userlogin') }}" class="auth-link">
            &larr; Back to Login
        </a>
    </div>
</div>
@endsection
