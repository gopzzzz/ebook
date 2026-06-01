@extends('layouts.weblayout')

@section('content')

<style>
.gallery-section {
    padding: 60px 0;
    background: #f9f9f9;
}

.gallery-title {
    text-align: center;
    font-size: 28px;
    margin-bottom: 30px;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
}

.gallery-item {
    width: 100%;
    height: 250px; /* 🔥 fixed height */
    overflow: hidden;
    border-radius: 10px;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* 🔥 important */
}

/* hover zoom */
.gallery-item:hover img {
    transform: scale(1.1);
}
</style>

  
<section class="gallery-section">
    <div class="container">
        <h2 class="gallery-title">Our Publishers</h2>

        <div class="gallery-grid">
            @foreach($team as $image)
                <div class="gallery-item">
                    <a href="{{ asset('uploads/gallery/'.$image->publisher_logo) }}" class="gallery-link">
                        <img src="{{ asset('public/uploads/publisher_logo/'.$image->publisher_logo) }}" alt="Gallery">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection