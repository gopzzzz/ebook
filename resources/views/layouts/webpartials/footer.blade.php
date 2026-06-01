<footer id="footer">
		<div class="container">
			<div class="row">

				<div class="col-md-4">

					<div class="footer-item">
						<div class="company-brand">
							<img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo" class="footer-logo">
							<p>{{$app_profile->description}}</p>
						</div>
					</div>

				</div>

				<div class="col-md-2">

					<div class="footer-menu">
						<h5>Pages</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="{{url('product-list')}}">Products</a>
							</li>
							<li class="menu-item">
								<a href="{{url('aboutus')}}">About Us</a>
							</li>
							<li class="menu-item">
								<a href="#">Team</a>
							</li>
							<li class="menu-item">
								<a href="#">Contact Us</a>
							</li>
						
						</ul>
					</div>

				</div>
				<div class="col-md-2">

					<div class="footer-menu">
						<h5>Privacy & Terms</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="{{url('privacy')}}" target="_blank">Privacy</a>
							</li>
							<li class="menu-item">
								<a href="{{url('term-conditions')}}" target="_blank">Terms & Conditions</a>
							</li>
							<li class="menu-item">
								<a href="{{url('refund')}}" target="_blank">Refund Policy</a>
							</li>
						
						</ul>
					</div>

				</div>
				<div class="col-md-2">

					<div class="footer-menu">
						<h5>My account</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="{{url('userlogin')}}">Sign In</a>
							</li>
							<li class="menu-item">
								<a href="{{url('cart')}}">View Cart</a>
							</li>
							<li class="menu-item">
								<a href="{{url('userprofile')}}">Profile</a>
							</li>
							<li class="menu-item">
								<a href="{{url('userprofile')}}">Track My Order</a>
							</li>
						</ul>
					</div>

				</div>
				<div class="col-md-2">

					<div class="footer-menu">
						<h5>Help</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="#">{{$app_profile->address}}</a>
							</li>
							<li class="menu-item">
								<a href="#">+91 {{$app_profile->phone_number}}</a>
							</li>
							<li class="menu-item">
								<a href="#">{{$app_profile->email}}</a>
							</li>
							
						</ul>
					</div>

				</div>

			</div>
			<!-- / row -->

		</div>
	</footer>

	<div id="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="copyright">
						<div class="row">

							<div class="col-md-9">
								<p style="color:#74642F;" >© 2026 All rights reserved. Developed by <a
										href="https://routeqinnovations.com/" style="color:#74642F" target="_blank">Routeq Innovatiuons Private Limited</a></p>
							</div>

							<div class="col-md-3">
								<div class="social-links align-right">
									<ul>
										<li>
											<a href="{{$app_profile->facebook_link}}" target="_blank"><i class="icon icon-facebook"></i></a>
										</li>
										<li>
											<a href="{{$app_profile->twitter_link}}" target="_blank"><i class="icon icon-twitter"></i></a>
										</li>
										<li>
											<a href="{{$app_profile->youtube_link}}" target="_blank"><i class="icon icon-youtube-play"></i></a>
										</li>
										<li>
											<a href="{{$app_profile->insta_link}}" target="_blank"><i class="icon icon-behance-square"></i></a>
										</li>
									</ul>
								</div>
							</div>

						</div>
					</div><!--grid-->

				</div><!--footer-bottom-content-->
			</div>
		</div>
	</div>