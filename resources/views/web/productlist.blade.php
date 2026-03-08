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
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<a href="{{url('product/'.$productList->slug)}}"><img src="{{asset('assets/img/items/'.$productList->image)}}" alt="Books" class="product-item"></a>
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>{{ substr($productList->name, 0, 15) }}...</h3>
											<span>{{$productList->author_name}}</span>
										<div class="item-price">
											<span class="prev-price">$ {{$productList->mrp}}</span>$ {{$productList->sr}}
										</div>
										</figcaption>
									</div>
								</div>
								@endforeach

							

								

							</div>

						</div>
						<div id="business" data-tab-content>
							<div class="row">
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item2.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Peaceful Enlightment</h3>
											<span>Marmik Lama</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item4.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Great travel at desert</h3>
											<span>Sanchit Howdy</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item6.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Life among the pirates</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item8.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Simple way of piece life</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

							</div>
						</div>

						<div id="technology" data-tab-content>
							<div class="row">
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item1.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Peaceful Enlightment</h3>
											<span>Marmik Lama</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item3.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Great travel at desert</h3>
											<span>Sanchit Howdy</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item5.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Life among the pirates</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item7.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Simple way of piece life</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>
							</div>
						</div>

						<div id="romantic" data-tab-content>
							<div class="row">
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item1.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Peaceful Enlightment</h3>
											<span>Marmik Lama</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item3.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Great travel at desert</h3>
											<span>Sanchit Howdy</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item5.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Life among the pirates</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item7.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Simple way of piece life</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>
							</div>
						</div>

						<div id="adventure" data-tab-content>
							<div class="row">
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item5.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Life among the pirates</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item7.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Simple way of piece life</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>
							</div>
						</div>

						<div id="fictional" data-tab-content>
							<div class="row">
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item5.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Life among the pirates</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item7.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Simple way of piece life</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div><!--inner-tabs-->

			</div>
		</div>
	</section>
@endsection