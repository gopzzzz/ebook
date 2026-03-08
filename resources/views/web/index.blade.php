@extends('layouts.weblayout')

@section('content')
<section id="billboard">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<button class="prev slick-arrow">
						<i class="icon icon-arrow-left"></i>
					</button>

					<div class="main-slider pattern-overlay">
						@foreach($banner as $banner)
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">{{$banner->banner_title}}</h2>
								
								<div class="btn-wrap">
									<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content-->
							<img src="{{asset('banners/'.$banner->banner)}}" alt="banner" class="banner-image">
						</div><!--slider-item-->
						@endforeach

						

					</div><!--slider-->

					<button class="next slick-arrow">
						<i class="icon icon-arrow-right"></i>
					</button>

				</div>
			</div>
		</div>

	</section>

	<section id="special-offer" class="bookshelf pb-5 mb-5">

		<div class="section-header align-center">
			<div class="title">
				<span>Grab your opportunity</span>
			</div>
			<h2 class="section-title">Deal Of the Day</h2>
		</div>

		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="product-list" data-aos="fade-up">
						<div class="grid product-grid">
							@foreach($dod as $deals)
							<div class="product-item">
								<figure class="product-style">
									<a href="product.html"><img src="{{asset('assets/img/items/'.$deals->image)}}" alt="Books" class="product-item"></a>
									<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Buy Now</button>
								</figure>
								<figcaption>
								<h3>{{ substr($deals->name, 0, 25) }}...</h3>
									<span>{{$deals->author_name}}</span>
									<div class="item-price">
										<span class="prev-price">₹ {{$deals->mrp}}</span>₹ {{$deals->amount}}
									</div>
								</div>
							</figcaption>
							@endforeach

							
							</div>
						</div><!--grid-->
					</div>
				</div><!--inner-content-->
			</div>
		</div>
	</section>

	<section id="client-holder" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="logo-wrap">
						<div class="grid">
							<a href="#"><img src="images/client-image1.png" alt="client"></a>
							<a href="#"><img src="images/client-image2.png" alt="client"></a>
							<a href="#"><img src="images/client-image3.png" alt="client"></a>
							<a href="#"><img src="images/client-image4.png" alt="client"></a>
							<a href="#"><img src="images/client-image5.png" alt="client"></a>
						</div>
					</div><!--image-holder-->
				</div>
			</div>
		</div>
	</section>

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
							@foreach($fastmovingProducts as $fastProduct)
							<div class="col-md-3">
								
								<div class="product-item">
									<figure class="product-style">
										<a href="{{url('product/'.$fastProduct->slug)}}"><img src="{{asset('assets/img/items/'.$fastProduct->image)}}" alt="Books" class="product-item"></a>
										<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
											Cart</button>
									</figure>
									<figcaption>
										<h3>{{ substr($fastProduct->name, 0, 15) }}...</h3>
										<span>{{$fastProduct->author_name}}</span>
										<div class="item-price">
											<span class="prev-price">₹ {{$fastProduct->mrp}}</span>₹ {{$fastProduct->sr}}
										
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
						<a href="#" class="btn-accent-arrow">View all products <i
								class="icon icon-ns-arrow-right"></i></a>
					</div>

				</div>
			</div>
		</div>
	</section>

@endsection