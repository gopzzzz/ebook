@extends('layouts.weblayout')

@section('content')
<style>
.contact-section {
    padding: 60px 0;
    background: #f9f9f9;
}

.contact-title {
    text-align: center;
    font-size: 30px;
    margin-bottom: 40px;
}

.contact-grid {
    display: grid;
 
    gap: 30px;
}

.contact-info {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    color: #000;
}

.contact-form {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}


/* mobile */
@media (max-width: 768px) {
    .contact-grid {
        grid-template-columns: 1fr;
    }
}
</style>

      <section class="contact-section">
    <div class="container">

        <h2 class="contact-title">Contact Us</h2>

        <div class="contact-grid">

            <!-- LEFT: INFO -->
            <div class="contact-info">
                <h4>Get in Touch</h4>
                <p>We’d love to hear from you. Reach out for any queries or support.</p>

                <p><strong>📍 Address:</strong> {{$company->address}}</p>
                <p><strong>📞 Phone:</strong>  {{$company->phone_number}}</p>
                <p><strong>📧 Email:</strong> {{$company->email}}</p>
            </div>

        

        </div>

    </div>
</section>
@endsection