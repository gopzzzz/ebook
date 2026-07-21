@extends('layouts.weblayout')

@section('content')
<style>
.cx-breadcrumb {
    background: #f7f7f7;
    border-bottom: 1px solid #e8e8e8;
    padding: 10px 0;
}
.cx-breadcrumb-inner {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 20px;
    font-size: 13px;
    color: #777;
}
.cx-breadcrumb-inner a {
    color: #555;
    text-decoration: none;
}
.cx-breadcrumb-inner a:hover { color: #F59E0B; }
.cx-breadcrumb-inner span { margin: 0 6px; }

.cx-page {
    background: #fff;
    padding: 48px 0 64px;
}
.cx-container {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 20px;
}
.cx-page-heading {
    font-size: 24px;
    font-weight: 700;
    color: #1c1c1c;
    margin-bottom: 6px;
}
.cx-page-sub {
    font-size: 14px;
    color: #888;
    margin-bottom: 36px;
}

.cx-layout {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 40px;
    align-items: start;
}

.cx-contact-sidebar {
    display: flex;
    flex-direction: column;
    gap: 0;
    border: 1px solid #e8e8e8;
    border-radius: 4px;
    overflow: hidden;
}
.cx-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 20px 22px;
    border-bottom: 1px solid #f0f0f0;
    background: #fff;
    transition: background 0.2s;
}
.cx-contact-item:last-child { border-bottom: none; }
.cx-contact-item:hover { background: #fafafa; }
.cx-contact-icon {
    width: 40px;
    height: 40px;
    background: #fff8ee;
    border: 1px solid #fde8b8;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #F59E0B;
    font-size: 16px;
}
.cx-contact-label {
    font-size: 11px;
    font-weight: 600;
    color: #999;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 3px;
}
.cx-contact-val {
    font-size: 14px;
    font-weight: 600;
    color: #1c1c1c;
    line-height: 1.5;
}

.cx-social-strip {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 16px 22px;
    background: #fafafa;
    border: 1px solid #e8e8e8;
    border-top: none;
}
.cx-social-strip-label {
    font-size: 13px;
    color: #555;
    font-weight: 500;
    flex-shrink: 0;
}
.cx-social-a {
    width: 34px;
    height: 34px;
    border-radius: 4px;
    border: 1px solid #e0e0e0;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #555;
    font-size: 14px;
    transition: all 0.2s ease;
}
.cx-social-a:hover {
    border-color: #F59E0B;
    color: #F59E0B;
    background: #fff8ee;
}

.cx-form-box {
    border: 1px solid #e8e8e8;
    border-radius: 4px;
    overflow: hidden;
}
.cx-form-header {
    background: #fafafa;
    border-bottom: 1px solid #e8e8e8;
    padding: 16px 24px;
}
.cx-form-header-title {
    font-size: 15px;
    font-weight: 700;
    color: #1c1c1c;
}
.cx-form-body {
    padding: 28px 24px;
}
.cx-form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}
.cx-field {
    margin-bottom: 18px;
}
.cx-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #444;
    margin-bottom: 6px;
}
.cx-input,
.cx-textarea {
    width: 100%;
    padding: 10px 13px;
    border: 1px solid #d8d8d8;
    border-radius: 4px;
    font-size: 14px;
    color: #1c1c1c;
    background: #fff;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    font-family: inherit;
    box-sizing: border-box;
}
.cx-input:focus, .cx-textarea:focus {
    border-color: #F59E0B;
    box-shadow: 0 0 0 3px rgba(245,158,11,0.12);
}
.cx-input::placeholder, .cx-textarea::placeholder {
    color: #bbb;
}
.cx-textarea {
    resize: vertical;
    min-height: 120px;
}
.cx-submit {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #F59E0B;
    color: #fff;
    padding: 11px 28px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s, box-shadow 0.2s;
}
.cx-submit:hover {
    background: #e08e00;
    box-shadow: 0 2px 8px rgba(245,158,11,0.3);
}

.cx-info-note {
    background: #f0f7ff;
    border: 1px solid #c8dff8;
    border-left: 3px solid #1976D2;
    border-radius: 4px;
    padding: 12px 16px;
    font-size: 13px;
    color: #1565c0;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 8px;
}

@media (max-width: 860px) {
    .cx-layout { grid-template-columns: 1fr; gap: 24px; }
}
@media (max-width: 540px) {
    .cx-form-row-2 { grid-template-columns: 1fr; }
    .cx-form-body { padding: 20px 16px; }
}
</style>

<div class="cx-breadcrumb">
    <div class="cx-breadcrumb-inner">
        <a href="{{url('index')}}">Home</a>
        <span>›</span>
        <span style="color:#1c1c1c;font-weight:500;">Contact Us</span>
    </div>
</div>

<div class="cx-page">
    <div class="cx-container">
        <h1 class="cx-page-heading">Contact Us</h1>
        <p class="cx-page-sub">We're here to help. Reach out to us and we'll respond within 24 hours.</p>

        <div class="cx-layout">
            <div>
                <div class="cx-contact-sidebar">
                    <div class="cx-contact-item">
                        <div class="cx-contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <div class="cx-contact-label">Our Address</div>
                            <div class="cx-contact-val">{{$company->address}}</div>
                        </div>
                    </div>
                    <div class="cx-contact-item">
                        <div class="cx-contact-icon"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <div class="cx-contact-label">Phone Number</div>
                            <div class="cx-contact-val">{{$company->phone_number}}</div>
                        </div>
                    </div>
                    <div class="cx-contact-item">
                        <div class="cx-contact-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <div class="cx-contact-label">Email Address</div>
                            <div class="cx-contact-val">{{$company->email}}</div>
                        </div>
                    </div>
                    <div class="cx-contact-item">
                        <div class="cx-contact-icon"><i class="fa-regular fa-clock"></i></div>
                        <div>
                            <div class="cx-contact-label">Working Hours</div>
                            <div class="cx-contact-val">Mon – Sat: 9:00 AM – 6:00 PM</div>
                        </div>
                    </div>
                </div>
                <div class="cx-social-strip">
                    <span class="cx-social-strip-label">Follow us:</span>
                    <a href="#" class="cx-social-a"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="cx-social-a"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="cx-social-a"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="cx-social-a"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>

            <div>
                <div class="cx-info-note">
                    <i class="fa-solid fa-circle-info"></i>
                    For order-related queries, please include your Order ID for faster resolution.
                </div>
                <div class="cx-form-box">
                    <div class="cx-form-header">
                        <div class="cx-form-header-title">Send Us a Message</div>
                    </div>
                    <div class="cx-form-body">
                        <form>
                            <div class="cx-form-row-2">
                                <div class="cx-field">
                                    <label class="cx-label">Full Name <span style="color:#e53935;">*</span></label>
                                    <input type="text" class="cx-input" placeholder="Enter your name" required>
                                </div>
                                <div class="cx-field">
                                    <label class="cx-label">Email Address <span style="color:#e53935;">*</span></label>
                                    <input type="email" class="cx-input" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="cx-field">
                                <label class="cx-label">Phone Number</label>
                                <input type="tel" class="cx-input" placeholder="Enter your phone number">
                            </div>
                            <div class="cx-field">
                                <label class="cx-label">Subject <span style="color:#e53935;">*</span></label>
                                <input type="text" class="cx-input" placeholder="What is this about?">
                            </div>
                            <div class="cx-field">
                                <label class="cx-label">Message <span style="color:#e53935;">*</span></label>
                                <textarea class="cx-textarea" placeholder="Describe your issue or query in detail..." required></textarea>
                            </div>
                            <button type="submit" class="cx-submit">
                                Submit <i class="fa-solid fa-paper-plane" style="font-size:13px;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
