@extends('layouts.weblayout')

@section('content')
<style>
.success-page-container { display: flex; justify-content: center; align-items: center; padding: 4rem 1rem; min-height: 60vh; background-color: var(--bg-1, #f8f9fa); }
.success-card { background: #ffffff; border-radius: 20px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08); padding: 3rem 2rem; max-width: 500px; width: 100%; text-align: center; animation: slideUpFade 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
@keyframes slideUpFade { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
.success-icon-animation { width: 80px; height: 80px; margin: 0 auto 1.5rem auto; }
.checkmark { width: 80px; height: 80px; border-radius: 50%; display: block; stroke-width: 3.5; stroke: #22c55e; stroke-miterlimit: 10; box-shadow: inset 0px 0px 0px #22c55e; animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both; }
.checkmark__circle { stroke-dasharray: 166; stroke-dashoffset: 166; stroke-width: 3.5; stroke-miterlimit: 10; stroke: #22c55e; fill: none; animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards; }
.checkmark__check { transform-origin: 50% 50%; stroke-dasharray: 48; stroke-dashoffset: 48; animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.6s forwards; }
@keyframes stroke { 100% { stroke-dashoffset: 0; } }
@keyframes scale { 0%, 100% { transform: none; } 50% { transform: scale3d(1.1, 1.1, 1); } }
@keyframes fill { 100% { box-shadow: inset 0px 0px 0px 40px rgba(34, 197, 94, 0.1); } }
.success-title { font-size: 1.8rem; font-weight: 800; color: var(--black, #0f172a); margin-bottom: 0.5rem; }
.success-subtitle { color: var(--mid-gray, #64748b); font-size: 0.95rem; line-height: 1.5; margin-bottom: 2rem; }
.order-details-box { background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 12px; padding: 1.2rem; margin-bottom: 2rem; display: flex; justify-content: center; align-items: center; gap: 0.75rem; }
.order-label { color: #475569; font-size: 0.9rem; font-weight: 600; }
.order-id { color: #0f172a; font-size: 1.1rem; font-weight: 800; background: #e2e8f0; padding: 0.2rem 0.8rem; border-radius: 6px; letter-spacing: 0.5px; }
.success-actions { display: flex; flex-direction: column; gap: 1rem; }
.success-actions a { text-decoration: none; border-radius: 99px; padding: 0.85rem 1.5rem; font-weight: 700; font-size: 0.95rem; transition: all 0.3s ease; }
.btn-continue-shopping { background-color: #0f172a; color: #ffffff; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
.btn-continue-shopping:hover { background-color: #1e293b; color: #ffffff !important; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(0,0,0,0.15); }
.btn-view-order { background-color: transparent; color: #0f172a; border: 2px solid #e2e8f0; }
.btn-view-order:hover { border-color: #cbd5e1; background-color: #f8fafc; color: #0f172a !important; }
</style><div class="success-page-container">
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
