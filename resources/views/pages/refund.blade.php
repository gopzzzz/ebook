@extends('layouts.weblayout')

@section('content')

<style>
.policy-wrapper{
    background: #F3F4F6;
    padding: 60px 15px;
}

/* Hero */
.policy-hero{
    max-width: 950px;
    margin: auto;
    background: linear-gradient(135deg, #d85225, #d85225);
    color: #fff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.policy-hero h1{
    font-size: 34px;
    font-weight: 700;
    color: #fff;
}

.policy-hero p{
    margin-top: 8px;
    opacity: 0.9;
}

/* Card */
.policy-container{
    max-width: 950px;
    margin: -30px auto 0;
    background: #fff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.06);
}

/* Section */
.policy-section{
    margin-bottom: 35px;
}

.policy-section h2{
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}

.policy-section h2 span{
    background: #d85225;
    color: #fff;
    font-size: 14px;
    padding: 4px 10px;
    border-radius: 6px;
    margin-right: 10px;
}

.policy-section p{
    color: #4B5563;
    margin-bottom: 10px;
}

.policy-section ul{
    padding-left: 20px;
}

.policy-section ul li{
    margin-bottom: 8px;
    color: #374151;
}

/* Highlight Box */
.policy-highlight{
    background: #ECFDF5;
    border-left: 4px solid #d85225;
    padding: 15px 20px;
    border-radius: 8px;
    margin: 20px 0;
    color: #000;
}

/* Contact */
.policy-contact{
    background: #F9FAFB;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #d85225;
    text-align: center;
}

.policy-contact strong{
    font-size: 18px;
}

/* Responsive */
@media(max-width:768px){
    .policy-hero h1{
        font-size: 26px;
    }
    .policy-container{
        padding: 25px;
    }
}
</style>

<div class="policy-wrapper">

    <!-- Hero -->
    <div class="policy-hero">
        <h1>Shipping & Replacement Policy</h1>
        <p>Brandson Clothings – Last Updated: 02 March 2024</p>
    </div>

    <!-- Content -->
    <div class="policy-container">

        <p>
            Thank you for shopping with <strong>Brandson Clothings</strong>. We are committed to delivering 
            your orders quickly and ensuring a smooth experience.
        </p>

        <div class="policy-highlight">
            📦 Orders are dispatched within 24 hours from our office.
        </div>

        <!-- Shipping -->
        <div class="policy-section">
            <h2><span>1</span>Shipping</h2>
            <ul>
                <li>Orders are shipped within 24 hours of confirmation</li>
                <li>Delivery usually takes 2–5 working days depending on location</li>
                <li>If not delivered within 7 working days, please contact us</li>
                <li>Additional shipping charges may apply for international orders</li>
            </ul>
        </div>

        <!-- Replacement -->
        <div class="policy-section">
            <h2><span>2</span>Replacement Policy</h2>
            <p>
                We offer replacement only (no refunds) under the following conditions:
            </p>
            <ul>
                <li>Product is damaged or defective</li>
                <li>Incorrect item delivered</li>
                <li>Request raised within 7 days of delivery</li>
            </ul>

            <p>
                Our team may contact you to verify the issue before approving replacement.
            </p>
        </div>

        <!-- Process -->
        <div class="policy-section">
            <h2><span>3</span>Replacement Process</h2>
            <ul>
                <li>Contact our support team via email or phone</li>
                <li>Provide order details and issue description</li>
                <li>Follow return instructions shared by our team</li>
            </ul>
        </div>

        <!-- Exceptions -->
        <div class="policy-section">
            <h2><span>4</span>Exceptions</h2>
            <ul>
                <li>Customized or personalized products are non-returnable unless damaged</li>
                <li>Sale items are generally not eligible for replacement</li>
            </ul>
        </div>

        <!-- Contact -->
        <div class="policy-section">
            <h2><span>5</span>Contact Us</h2>
            <div class="policy-contact">
                <p>For support or replacement requests:</p>
                <p><strong>📧 support@brandsonclothings.com</strong></p>
                <p><strong>📞 +91 80759 50651</strong></p>
                <p><small>Available 24×7</small></p>
            </div>
        </div>

    </div>

</div>

@endsection