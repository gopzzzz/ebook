@extends('layouts.weblayout')

@section('content')

<style>
.tc-wrapper{
    background: #F3F4F6;
    padding: 60px 15px;
}

/* Hero Header */
.tc-hero{
    max-width: 950px;
    margin: auto;
    background: linear-gradient(135deg, #d85225, #d85225);
    color: #fff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
 
}

.tc-hero h1{
    font-size: 36px;
    font-weight: 700;
    color: #fff;
}

.tc-hero p{
    opacity: 0.9;
    margin-top: 10px;
}

/* Main Card */
.tc-container{
    max-width: 950px;
    margin: -30px auto 0;
    background: #fff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.06);
    color: #000;
}

/* Sections */
.tc-section{
    margin-bottom: 35px;
}

.tc-section h2{
    font-size: 20px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
}

.tc-section h2 span{
    background: #FEF3C7;
    color: #F59E0B;
    font-size: 14px;
    padding: 4px 10px;
    border-radius: 6px;
    margin-right: 10px;
}

.tc-section p{
    color: #4B5563;
    margin-bottom: 10px;
}

.tc-section ul{
    padding-left: 20px;
}

.tc-section ul li{
    margin-bottom: 8px;
    color: #374151;
}

/* Divider */
.tc-divider{
    height: 1px;
    background: #E5E7EB;
    margin: 30px 0;
}

/* Contact Box */
.tc-contact{
    background: #F9FAFB;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #E5E7EB;
    text-align: center;
}

.tc-contact strong{
    font-size: 18px;
    color: #111827;
}

/* Responsive */
@media(max-width:768px){
    .tc-hero h1{
        font-size: 26px;
    }
    .tc-container{
        padding: 25px;
    }
}
</style>

<div class="tc-wrapper">

    <!-- Hero -->
    <div class="tc-hero">
        <h1>Terms & Conditions</h1>
        <p>Brandson Clothings – Effective from June 1, 2026</p>
    </div>

    <!-- Content -->
    <div class="tc-container">

        <p>
            Welcome to <strong>Brandson Clothings</strong>. By accessing our website, you agree to comply 
            with the following Terms & Conditions.
        </p>

        <div class="tc-divider"></div>

        <div class="tc-section">
            <h2><span>1</span>Use of Website</h2>
            <ul>
                <li>For personal and non-commercial use only</li>
                <li>No illegal or unauthorized activities</li>
                <li>No hacking, reverse engineering, or disruption</li>
                <li>Respect website functionality</li>
            </ul>
        </div>

        <div class="tc-section">
            <h2><span>2</span>Content Ownership</h2>
            <p>All materials belong to Brandson Clothings and are protected by law.</p>
            <ul>
                <li>No copying or reuse without permission</li>
                <li>No harmful or illegal content submissions</li>
            </ul>
        </div>

        <div class="tc-section">
            <h2><span>3</span>User Accounts</h2>
            <ul>
                <li>You are responsible for account security</li>
                <li>All activities under your account are your responsibility</li>
            </ul>
        </div>

        <div class="tc-section">
            <h2><span>4</span>Disclaimer</h2>
            <p>The website is provided “as is” without warranties.</p>
        </div>

        <div class="tc-section">
            <h2><span>5</span>Limitation of Liability</h2>
            <p>Brandson Clothings is not liable for damages arising from usage.</p>
        </div>

        <div class="tc-section">
            <h2><span>6</span>Indemnification</h2>
            <p>You agree to protect Brandson Clothings from claims or losses.</p>
        </div>

        <div class="tc-section">
            <h2><span>7</span>Governing Law</h2>
            <p>Applicable laws: Kerala, India</p>
        </div>

        <div class="tc-section">
            <h2><span>8</span>Dispute Resolution</h2>
            <p>Resolved via arbitration in Thiruvananthapuram.</p>
        </div>

        <div class="tc-section">
            <h2><span>9</span>Termination</h2>
            <p>Access may be terminated anytime without notice.</p>
        </div>

        <div class="tc-section">
            <h2><span>10</span>Entire Agreement</h2>
            <p>These terms represent the full agreement.</p>
        </div>

        <div class="tc-section">
            <h2><span>11</span>Updates</h2>
            <p>Terms may be updated periodically.</p>
        </div>

        <div class="tc-section">
            <h2><span>12</span>Contact</h2>
            <div class="tc-contact">
                <p>Need help?</p>
                <strong>📞 +91 80759 50651</strong>
            </div>
        </div>

    </div>

</div>

@endsection