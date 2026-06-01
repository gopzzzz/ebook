@extends('layouts.weblayout')

@section('content')
<style>
#mainCarousel {
    width: 100vw;
}

/* Fix inner items */
.carousel-inner,
.carousel-item {
    width: 100%;
}

/* Image styling */
.carousel-item img {
    width: 100%;
    height: 450px; /* adjust as needed */
    object-fit: cover;
}
.carousel-control-prev,
.carousel-control-next {
    top: 50%;
    transform: translateY(-50%);
    width: auto;
}

/* Optional: make arrows more visible */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-size: 100% 100%;
    width: 40px;
    height: 40px;
}
</style>

<!-- FULL WIDTH CAROUSEL -->
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators -->
    <div class="carousel-indicators">
        @foreach($banner as $index => $bk)
            <button type="button"
                data-bs-target="#mainCarousel"
                data-bs-slide-to="{{ $index }}"
                class="{{ $index == 0 ? 'active' : '' }}"
                aria-current="{{ $index == 0 ? 'true' : '' }}">
            </button>
        @endforeach
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        @foreach($banner as $index => $banners)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('public/uploads/banners/'.$banners->banner) }}" alt="Banner {{ $index+1 }}">
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

	<!--<section id="special-offer" class="bookshelf pb-5 mb-5">-->

	<!--	<div class="section-header align-center">-->
	<!--		<div class="title">-->
	<!--			<span>Grab your opportunity</span>-->
	<!--		</div>-->
	<!--		<h2 class="section-title">Deal Of the Day</h2>-->
	<!--	</div>-->

	<!--	<div class="container">-->
	<!--		<div class="row">-->
	<!--			<div class="inner-content">-->
	<!--				<div class="product-list" data-aos="fade-up">-->
	<!--					<div class="grid product-grid">-->
	<!--						@foreach($dod as $deals)-->
	<!--						<div class="product-item">-->
	<!--							<figure class="product-style">-->
	<!--								<a href="product.html"><img src="{{asset('assets/img/items/'.$deals->image)}}" alt="Books" class="product-item"></a>-->
	<!--								<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Buy Now</button>-->
	<!--							</figure>-->
	<!--							<figcaption>-->
	<!--							<h3>{{ substr($deals->name, 0, 25) }}...</h3>-->
	<!--								<span>{{$deals->author_name}}</span>-->
	<!--								<div class="item-price">-->
	<!--									<span class="prev-price">₹ {{$deals->mrp}}</span>₹ {{$deals->amount}}-->
	<!--								</div>-->
	<!--							</div>-->
	<!--						</figcaption>-->
	<!--						@endforeach-->

							
	<!--						</div>-->
	<!--					</div><!--grid-->
	<!--				</div>-->
	<!--			</div><!--inner-content-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</section>-->

	<!--<section id="client-holder" data-aos="fade-up">-->
	<!--	<div class="container">-->
	<!--		<div class="row">-->
	<!--			<div class="inner-content">-->
	<!--				<div class="logo-wrap">-->
	<!--					<div class="grid">-->
	<!--						<a href="#"><img src="images/client-image1.png" alt="client"></a>-->
	<!--						<a href="#"><img src="images/client-image2.png" alt="client"></a>-->
	<!--						<a href="#"><img src="images/client-image3.png" alt="client"></a>-->
	<!--						<a href="#"><img src="images/client-image4.png" alt="client"></a>-->
	<!--						<a href="#"><img src="images/client-image5.png" alt="client"></a>-->
	<!--					</div>-->
	<!--				</div><!--image-holder-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</section>-->

	<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Fast Moving Products</h2>
					</div>

					<div class="product-list" data-aos="fade-up">
						<div class="row">
					@foreach($fastmovingProducts as $productList)
<div class="col-6 col-md-3">
    <div class="product-item">
        <figure class="product-style">
            
            <a href="{{ url('product/'.$productList->slug) }}">
                <img src="{{ asset('public/assets/img/items/'.$productList->image) }}" 
                     alt="Books" 
                     class="product-item">
            </a>

            @php
                $inCart = in_array($productList->id, $cartProductIds);
            @endphp

            @if($inCart)
                <a href="{{ url('cart') }}">
                    <button type="button" 
                            class="add-to-cart btn btn-primary" 
                            data-id="{{ $productList->id }}">
                        <span class="btn-text">Go To Cart</span>
                        <span class="btn-loader d-none">
                            <i class="fa fa-spinner fa-spin"></i> Loading...
                        </span>
                    </button>
                </a>
            @else
                <button type="button" 
                        class="add-to-cart btn btn-primary" 
                        data-id="{{ $productList->id }}">
                    <span class="btn-text">Add to Cart</span>
                    <span class="btn-loader d-none">
                        <i class="fa fa-spinner fa-spin"></i> Loading...
                    </span>
                </button>
            @endif

        </figure>

        <figcaption>
            <h3>{{ Str::limit($productList->name, 20) }}</h3>
            <div class="item-price">
                <span class="prev-price">₹ {{ $productList->mrp }}</span> 
                ₹ {{ $productList->sr }}
            </div>
        </figcaption>

    </div>
</div>
@endforeach
							

						</div><!--ft-books-slider-->
					</div><!--grid-->


				</div><!--inner-content-->
			</div>

			<div class="row">
				<div class="col-md-12">

					<div class="btn-wrap align-right">
						<a href="{{url('product-list')}}" class="btn-accent-arrow">View all products <i
								class="icon icon-ns-arrow-right"></i></a>
					</div>

				</div>
			</div>
		</div>
	</section>

@endsection