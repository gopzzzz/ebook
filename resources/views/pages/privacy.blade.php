@extends('layouts.weblayout')

@section('content')

<style>
.privacy-container{
    max-width: 900px;
    margin: 60px auto;
    background: #ffffff;
    color: #000;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    line-height: 1.7;
}

.privacy-title{
    font-size: 34px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #111827;
}

.privacy-date{
    color: #6B7280;
    margin-bottom: 25px;
}

.privacy-section{
    margin-top: 30px;
}

.privacy-section h2{
    font-size: 22px;
    margin-bottom: 12px;
    color: #d85225;
    font-weight: 600;
}

.privacy-section p{
    margin-bottom: 12px;
    color: #374151;
}

.privacy-section ul{
    padding-left: 20px;
}

.privacy-section ul li{
    margin-bottom: 8px;
    color: #374151;
}

.highlight-box{
    background: #FFF7ED;
    border-left: 4px solid #d85225;
    padding: 15px 20px;
    border-radius: 8px;
    margin: 20px 0;
}

.contact-box{
    background: #F9FAFB;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
    border: 1px solid #E5E7EB;
}
</style>

<div class="privacy-container">

    <div class="privacy-title">Privacy Policy – Brandson Clothings</div>
    <div class="privacy-date"><strong>Effective Date:</strong> April 16, 2026</div>

    <p>
        This Privacy Policy explains how <strong>Brandson Clothings</strong> collects, uses, and protects your 
        personal information when you use our website and services.
    </p>

    <div class="privacy-section">
        <h2>Information We Collect</h2>

        <div class="highlight-box">
            We collect information to provide better services and improve your experience.
        </div>

        <p><strong>Personal Information:</strong></p>
        <ul>
            <li>Account registration details</li>
            <li>Order and transaction information</li>
            <li>Customer support communication</li>
            
        </ul>

        <p>
            This may include your name, email, phone number, shipping address, and payment details.
        </p>

        <p><strong>Non-Personal Information:</strong></p>
        <p>
            We automatically collect technical data such as browser type, device info, IP address, 
            and usage patterns through cookies.
        </p>
    </div>

    <div class="privacy-section">
        <h2>How We Use Your Information</h2>
        <ul>
            <li>Order processing and delivery</li>
            <li>Customer support services</li>
            <li>Website performance improvement</li>
            <li>Order updates and notifications</li>
            <li>Marketing communication (with consent)</li>
        </ul>
    </div>

    <div class="privacy-section">
        <h2>Sharing of Information</h2>
        <p>We do not sell your personal information. Data may be shared with:</p>
        <ul>
            <li>Trusted service providers (payment, delivery, hosting)</li>
            <li>Authorities when legally required</li>
            <li>Marketing partners (only with consent)</li>
        </ul>
    </div>

    <div class="privacy-section">
        <h2>Cookies</h2>
        <p>
            Cookies help enhance your browsing experience. You can disable cookies in your browser, 
            but some features may not function properly.
        </p>
    </div>

    <div class="privacy-section">
        <h2>Data Security</h2>
        <p>
            We implement appropriate security measures to protect your data. However, no online 
            transmission is 100% secure.
        </p>
    </div>

    <div class="privacy-section">
        <h2>Children’s Privacy</h2>
        <p>
            Our services are not intended for children under 13. We do not knowingly collect their data.
        </p>
    </div>

    <div class="privacy-section">
        <h2>Your Rights</h2>
        <p>
            You can access, update, or delete your personal information anytime. You may also withdraw 
            consent by contacting us.
        </p>
    </div>

    <div class="privacy-section">
        <h2>Policy Updates</h2>
        <p>
            We may update this policy periodically. Updates will be posted on this page.
        </p>
    </div>

    <div class="privacy-section">
        <h2>Contact Us</h2>

        <div class="contact-box">
            <p>If you have any questions or concerns:</p>
            <p><strong>Phone:</strong> +91 80759 50651</p>
        </div>
    </div>

</div>

@endsection
