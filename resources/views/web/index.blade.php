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

			
		<style>
.hp-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; margin-top:8px; }
.hp-card { background:#fff; border:1px solid #ddd; border-radius:3px; overflow:hidden; display:flex; flex-direction:column; transition:box-shadow .2s; }
.hp-card:hover { box-shadow:0 4px 20px rgba(0,0,0,.1); }
.hp-card-img { position:relative; aspect-ratio:4/5; background:#f9f9f9; overflow:hidden; border-bottom:1px solid #f0f0f0; }
.hp-card-img a { display:block; height:100%; }
.hp-card-img img { width:100%; height:100%; object-fit:cover; transition:transform .35s; display:block; }
.hp-card:hover .hp-card-img img { transform:scale(1.04); }
.hp-disc { position:absolute; top:8px; left:8px; background:#388e3c; color:#fff; font-size:11px; font-weight:700; padding:3px 7px; border-radius:2px; z-index:2; }
.hp-card-body { padding:11px; flex:1; display:flex; flex-direction:column; }
.hp-brand { font-size:11px; font-weight:700; color:#2874f0; text-transform:uppercase; margin-bottom:3px; }
.hp-name { font-size:13px; color:#212121; font-weight:400; line-height:1.4; margin-bottom:6px; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; height:37px; }
.hp-rating { display:flex; align-items:center; gap:5px; margin-bottom:7px; }
.hp-chip { display:inline-flex; align-items:center; gap:3px; background:#388e3c; color:#fff; font-size:11px; font-weight:700; padding:2px 6px; border-radius:2px; }
.hp-chip i { font-size:9px; }
.hp-cnt { font-size:11px; color:#878787; }
.hp-prices { display:flex; align-items:baseline; gap:6px; flex-wrap:wrap; margin-bottom:10px; }
.hp-sp { font-size:16px; font-weight:700; color:#212121; }
.hp-mrp { font-size:12px; color:#878787; text-decoration:line-through; }
.hp-off { font-size:12px; color:#388e3c; font-weight:600; }
.hp-foot { margin-top:auto; border-top:1px solid #f0f0f0; }
.hp-atc,
.hp-go {
    display:flex !important;
    align-items:center !important;
    justify-content:center !important;
    gap:7px !important;
    width:100% !important;
    padding:12px 10px !important;
    border:none !important;
    margin:0 !important;
    font-size:14px !important;
    font-weight:700 !important;
    cursor:pointer !important;
    background:#ff9f00 !important;
    color:#fff !important;
    transition:background .2s !important;
    text-decoration:none !important;
    letter-spacing:.3px !important;
    white-space:nowrap !important;
    box-sizing:border-box !important;
    font-family:inherit !important;
    line-height:1 !important;
    position:static !important;
    bottom:auto !important;
    left:auto !important;
    z-index:auto !important;
    text-transform:none !important;
    text-align:center !important;
}
.hp-atc:hover, .hp-go:hover { background:#e08e00 !important; color:#fff !important; }
.hp-atc *, .hp-go * { color:#fff !important; }
@media(max-width:900px){ .hp-grid{ grid-template-columns:repeat(2,1fr); } }
</style>

		<div class="hp-grid">
        @foreach($fastmovingProducts as $productList)
        @php
            $inCart  = in_array($productList->id, $cartProductIds);
            $dPct    = ($productList->mrp > 0 && $productList->mrp > $productList->sr) ? round((($productList->mrp - $productList->sr)/$productList->mrp)*100) : 0;
            $bname   = !empty($productList->author_name) ? $productList->author_name : 'Brandson';
        @endphp
        <div class="hp-card">
            <div class="hp-card-img">
                <a href="{{ url('product/'.$productList->slug) }}">
                    <img src="{{ asset('public/assets/img/items/'.$productList->image) }}" alt="{{ $productList->name }}" loading="lazy">
                </a>
                @if($dPct > 0)<span class="hp-disc">{{ $dPct }}% OFF</span>@endif
            </div>
            <div class="hp-card-body">
                <div class="hp-brand">{{ $bname }}</div>
                <div class="hp-name">{{ $productList->name }}</div>
                <div class="hp-rating">
                    <div class="hp-chip">4.1 <i class="fa-solid fa-star"></i></div>
                    <span class="hp-cnt">(128)</span>
                </div>
                <div class="hp-prices">
                    <span class="hp-sp">₹{{ number_format($productList->sr, 2) }}</span>
                    @if($productList->mrp > $productList->sr)
                    <span class="hp-mrp">₹{{ number_format($productList->mrp, 2) }}</span>
                    @if($dPct > 0)<span class="hp-off">{{ $dPct }}% off</span>@endif
                    @endif
                </div>
                <div class="hp-foot">
                    @if($inCart)
                    <a href="{{ url('cart') }}" class="hp-go">
                        <i class="fa-solid fa-cart-shopping" style="font-size:13px;"></i> Go to Cart
                    </a>
                    @else
                    <a href="#" class="hp-atc add-to-cart" data-id="{{ $productList->id }}">
                        <i class="fa-solid fa-cart-plus" style="font-size:13px;"></i>
                        <span class="btn-text">Add to Cart</span>
                        <span class="btn-loader d-none"><i class="fa fa-spinner fa-spin"></i></span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
		</div>

							

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