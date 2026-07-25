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

    <h1>Cancellation Policy</h1>

    <p>
        Thank you for shopping with <strong>{{$app_profile->name}}</strong>.
        Please read our cancellation policy carefully before placing your order.
    </p>

    <h2>No Cancellation Policy</h2>

    <ul>
        <li>All orders placed on our website are considered final.</li>

        <li>Once an order has been successfully placed and payment has been confirmed, it <strong>cannot be cancelled</strong>.</li>

        <li>Please review your product selection, shipping address, and payment details carefully before completing your purchase.</li>

        <li>If an incorrect shipping address has been provided, please contact us immediately. We will try our best to update the address before dispatch, but changes cannot be guaranteed.</li>

        <li>If an order cannot be fulfilled due to product unavailability or any unforeseen reason from our side, the full payment will be refunded to the original payment method.</li>
    </ul>

    <div class="note">
        <strong>Note:</strong> By placing an order on Pinterest Item Buy, you acknowledge that you have read, understood, and agreed to this Cancellation Policy.
    </div>

</div>

@endsection