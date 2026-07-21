@extends('layouts.weblayout')

@section('content')

       <style>
   
        .about-section {
            padding: 80px 0;
        }
        .section-title {
            color: #d85225;
            font-weight: 700;
        }
        .highlight {
            color: #d85225;
            font-weight: 600;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .card-custom:hover {
            transform: translateY(-5px);
        }
        p{
            color: #000;
        }
    </style>



	<section class="about-section">
    <div class="container">
    <div class="text-center mb-5">
        <h1 class="section-title">About Us</h1>
        <p class="lead">Style That Defines You</p>
    </div>

    <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
            <p>
                Welcome to <span class="highlight">Brandson Clothings</span>, your trusted fashion destination based in
                <strong>Thodupuzha, Kerala</strong>. We are passionate about bringing the latest trends,
                premium-quality apparel, and affordable fashion to customers across India.
            </p>

            <p>
                At Brandson Clothings, we believe that great style should be accessible to everyone.
                Our collections are carefully selected to offer the perfect blend of comfort, quality,
                and modern fashion, helping you look and feel your best every day.
            </p>

            <p>
                Whether you're looking for casual wear, trendy outfits, or wardrobe essentials,
                we provide fashionable clothing that complements your lifestyle and personality.
                Every product is chosen with a focus on quality, durability, and customer satisfaction.
            </p>

            <p>
                With secure online shopping, easy ordering, and reliable nationwide shipping,
                we proudly serve customers across India, delivering style and confidence right
                to their doorstep.
            </p>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card card-custom p-4">
                <h4 class="section-title">Our Vision</h4>
                <p>
                    To become one of India's most trusted fashion brands by providing stylish,
                    high-quality clothing at affordable prices.
                </p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card card-custom p-4">
                <h4 class="section-title">Our Mission</h4>
                <p>
                    To deliver trendy, comfortable, and premium-quality fashion that inspires
                    confidence and self-expression.
                </p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card card-custom p-4">
                <h4 class="section-title">Our Commitment</h4>
                <p>
                    We are committed to exceptional customer service, reliable delivery,
                    and a seamless shopping experience for every customer.
                </p>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
