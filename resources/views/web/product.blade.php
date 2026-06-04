@extends('layouts.weblayout')

@section('content')


	

	<section id="best-selling" class="leaf-pattern-overlay">
		<div class="corner-pattern-overlay"></div>
		<div class="container-fluid">
			<div class="row justify-content-center">

				<div class="col-md-12">

					<div class="row">

						<div class="col-md-4">
							<figure class="products-thumb">
								<img src="{{asset('public/assets/img/items/'.$product->image)}}" alt="book" class="single-image">
							</figure>
						</div>

						<div class="col-md-8">
							<div class="product-entry">
								<h2 class="section-title divider">{{$product->name}}</h2>

								<div class="products-content">
									<div class="author-name">By {{$product->author_name}}</div>
									<h3 class="item-title">{{$product->publisher_name}}</h3>
									<p>{!! nl2br(e($product->description)) !!}</p>
									<div class="item-price"><span class="prev-price">₹ {{$product->mrp}}</span>₹ {{$product->sr}}
										</div>
									<!-- <div class="btn-wrap">
										<a href="#" class="btn-accent-arrow">shop it now <i
												class="icon icon-ns-arrow-right"></i></a>
									</div> -->
									<button type="button" class="add-to-cart" data-id="{{$product->id}}" data-product-tile="add-to-cart"><span class="btn-text">Add to Cart</span>
    <span class="btn-loader d-none">
        <i class="fa fa-spinner fa-spin"></i> Loading...
    </span></button>
								</div>

							</div>
						</div>

					</div>
					<!-- / row -->

				</div>

			</div>
		</div>
	</section>

@endsection