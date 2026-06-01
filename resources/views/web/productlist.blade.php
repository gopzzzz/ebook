@extends('layouts.weblayout')

@section('content')


<section id="popular-books" class="bookshelf py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Popular Books</h2>
					</div>

					<ul class="tabs">
						@foreach($category as $cat)
						<li data-tab-target="#all-genre" class="tab">{{$cat->category_name}}</li>
						@endforeach
						<!-- <li data-tab-target="#business" class="tab">Business</li>
						<li data-tab-target="#technology" class="tab">Technology</li>
						<li data-tab-target="#romantic" class="tab">Romantic</li>
						<li data-tab-target="#adventure" class="tab">Adventure</li>
						<li data-tab-target="#fictional" class="tab">Fictional</li> -->
					</ul>

					<div class="tab-content">
						<div id="all-genre" data-tab-content class="active">
							<div class="row">
						@foreach($items as $productList)
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
							

								

							</div>

						</div>
						

						

						

						

						
					</div>

				</div><!--inner-tabs-->

			</div>
		</div>
	</section>
@endsection