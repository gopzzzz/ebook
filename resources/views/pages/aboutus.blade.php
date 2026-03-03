@extends('layouts.weblayout')

@section('content')

       <style>
   
        .about-section {
            padding: 80px 0;
        }
        .section-title {
            color: #1E3A8A;
            font-weight: 700;
        }
        .highlight {
            color: #F59E0B;
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
            <p class="lead">Empowering Education Through Accessible Knowledge</p>
        </div>

        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <p>
                    Welcome to <span class="highlight">YourBrandName</span>, your trusted online destination 
                    for academic books, competitive exam guides, and essential study materials. 
                    We believe that education is the spark that ignites success, and our goal is to 
                    make quality learning resources accessible to every student.
                </p>
                <p>
                    Whether you are preparing for school exams, entrance tests, government 
                    competitive exams, or professional certifications, we provide carefully 
                    curated books from trusted publishers at affordable prices.
                </p>
                <p>
                    Our platform is designed for convenience, offering a seamless browsing 
                    experience, secure payments, and reliable delivery to ensure students 
                    receive their study materials without hassle.
                </p>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card card-custom p-4">
                    <h4 class="section-title">Our Vision</h4>
                    <p>To become a leading and trusted online bookstore that supports students in achieving academic excellence.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card card-custom p-4">
                    <h4 class="section-title">Our Mission</h4>
                    <p>To provide affordable, authentic, and high-quality study materials that empower learners nationwide.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card card-custom p-4">
                    <h4 class="section-title">Our Commitment</h4>
                    <p>We are committed to supporting dreams, careers, and lifelong learning through reliable service and trusted resources.</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection