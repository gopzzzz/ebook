<div class="top-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<div class="social-links">
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
						</div><!--social-links-->
					</div>
					<div class="col-md-6">
						<div class="right-element">
							@if(Auth::check())
							<a href="{{url('userprofile')}}"><i class="icon icon-user"></i><span> {{ Auth::user()->name }}</span></a>
							<a href="{{url('cart')}}"  class="cart for-buy"><i class="icon icon-clipboard"></i><span id="carts">:{{ $cartCount }}
							</span></a>
							@else
<a href="{{url('userlogin')}}" class="user-account for-buy"><span>Sign In</span></a>


							@endif

							<div class="action-menu">

								<div class="search-bar">
									<a href="#" class="search-button search-toggle" data-selector="#header-wrap">
										<i class="icon icon-search"></i>
									</a>
							<div class="search-wrapper">
    <form role="search" method="get" class="search-box" autocomplete="off">
        <input 
            class="search-input" 
            placeholder="Search products..." 
            type="search" 
            id="search"
        >
    </form>

    <!-- DROPDOWN -->
    <div id="search-list" class="dropdown-box"></div>
</div>


								</div>
							</div>

						</div><!--top-right-->
					</div>

				</div>
			</div>
		</div><!--top-content-->

		<header class="header">
			<div class="container-fluid">
				<div class="row">

					<div class="col-md-2">
						<div class="main-logo">
							<a href="{{url('index')}}"><img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo"></a>
							 <!-- <h2>Aron</h2> -->
						</div>

					</div>

					<div class="col-md-10">

						<nav id="navbar">
							<div class="main-menu stellarnav">
								<ul class="menu-list">
									<li class="menu-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><a href="{{url('index')}}">Home</a></li>
										<li class="menu-item {{ Route::currentRouteName() == 'product-list' ? 'active' : '' }}"><a href="{{url('product-list')}}" class="nav-link">Products</a></li>
									<li class="menu-item {{ Route::currentRouteName() == 'aboutus' ? 'active' : '' }}">
										<a href="{{url('aboutus')}}" class="nav-link">About Us</a>

									

									</li>
								
									<li class="menu-item {{ Route::currentRouteName() == 'team' ? 'active' : '' }}"><a href="{{url('team')}}" class="nav-link">Team</a></li>
									<li class="menu-item {{ Route::currentRouteName() == 'contactus' ? 'active' : '' }}"><a href="{{url('contactus')}}" class="nav-link">Contact Us</a></li>
								
								</ul>

								<div class="hamburger">
									<span class="bar"></span>
									<span class="bar"></span>
									<span class="bar"></span>
								</div>

							</div>
						</nav>

					</div>

				</div>
			</div>
		</header>

		<div class="category-bar">
    <div class="container-fluid">
        <ul class="category-menu">
            <li><a href="#">Men</a></li>
            <li><a href="#">Women</a></li>
            <li><a href="#">T-Shirts</a></li>
            <li><a href="#">Shirts</a></li>
            <li><a href="#">Jeans</a></li>
            <li><a href="#">Jackets</a></li>
            <li><a href="#">Footwear</a></li>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="#">Sale</a></li>
        </ul>
    </div>
</div>