@extends('layouts.weblayout')

@section('content')

<div class="success-page-container">
    <div class="success-card">
        @if(session('success'))
            <div class="success-icon-animation">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
            </div>
            
            <h2 class="success-title">Payment Successful!</h2>
            <p class="success-subtitle">Thank you for your purchase. Your order has been placed successfully.</p>
            
            <div class="order-details-box">
                <span class="order-label">Order ID</span>
                <span class="order-id">#{{ session('success') }}</span>
            </div>
            
            <div class="success-actions">
                <a href="{{ url('/') }}" class="btn-continue-shopping">Continue Shopping</a>
                @if(Auth::check())
                <a href="{{ url('orderview', session('success')) }}" class="btn-view-order">View Order</a>
                @else
                <a href="{{ url('userlogin') }}" class="btn-view-order">Login to View Order</a>
                @endif
            </div>
        @elseif(session('error'))
            <div class="success-icon-animation" style="color: #ef4444;">
                <i class="ri-error-warning-fill" style="font-size: 80px; line-height: 1;"></i>
            </div>
            <h2 class="success-title" style="color: #ef4444;">Oops! Something went wrong.</h2>
            <p class="success-subtitle">{{ session('error') }}</p>
            <div class="success-actions">
                <a href="{{ url('cart') }}" class="btn-continue-shopping">Return to Cart</a>
            </div>
        @else
            <!-- Fallback if accessed directly -->
            <div class="success-icon-animation">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
            </div>
            <h2 class="success-title">Action Successful</h2>
            <p class="success-subtitle">Your request has been processed.</p>
            <div class="success-actions">
                <a href="{{ url('/') }}" class="btn-continue-shopping">Return Home</a>
            </div>
        @endif
    </div>
</div>

@endsection
