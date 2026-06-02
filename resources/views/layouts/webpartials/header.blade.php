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
        <div class="cat-bar-inner">
            <button class="cat-mobile-toggle" id="catMenuToggle" aria-label="Browse Categories">
                <span class="cat-toggle-icon">
                    <span></span><span></span><span></span>
                </span>
                <span class="cat-toggle-text">Categories</span>
                <i class="fa-solid fa-chevron-down cat-chevron"></i>
            </button>
            <ul class="category-menu" id="categoryMenu">
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
</div>

<style>
.cat-bar-inner {
    position: relative;
}
.cat-mobile-toggle {
    display: none;
    width: 100%;
    align-items: center;
    gap: 10px;
    background: none;
    border: none;
    padding: 11px 4px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    color: #212121;
}
.cat-toggle-icon {
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.cat-toggle-icon span {
    display: block;
    width: 16px;
    height: 2px;
    background: #212121;
    border-radius: 2px;
    transition: all 0.25s;
}
.cat-toggle-text {
    flex: 1;
    text-align: left;
}
.cat-chevron {
    font-size: 10px;
    color: #878787;
    transition: transform 0.25s ease;
}
.cat-mobile-toggle.cat-open .cat-chevron {
    transform: rotate(180deg);
}

@media (max-width: 768px) {
    .cat-mobile-toggle {
        display: flex;
    }
    #categoryMenu {
        display: none;
        flex-direction: column;
        background: #fff;
        border-radius: 3px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        position: absolute;
        top: calc(100% + 2px);
        left: 0;
        right: 0;
        z-index: 9999;
        padding: 4px 0;
        border: 1px solid #e0e0e0;
    }
    #categoryMenu.cat-menu-open {
        display: flex;
    }
    #categoryMenu li {
        padding: 0;
        border-right: none;
        border-bottom: 1px solid #f5f5f5;
        flex-shrink: unset;
    }
    #categoryMenu li:last-child {
        border-bottom: none;
    }
    #categoryMenu li a {
        padding: 12px 18px;
        display: block;
        font-size: 13px;
        font-weight: 500;
        color: #212121;
    }
    #categoryMenu li a:hover {
        background: #f5f5f5;
        color: #2874f0;
    }
}
</style>

<script>
(function() {
    var toggle = document.getElementById('catMenuToggle');
    var menu = document.getElementById('categoryMenu');
    if (toggle && menu) {
        toggle.addEventListener('click', function() {
            var isOpen = menu.classList.toggle('cat-menu-open');
            toggle.classList.toggle('cat-open', isOpen);
        });
        document.addEventListener('click', function(e) {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.remove('cat-menu-open');
                toggle.classList.remove('cat-open');
            }
        });
    }
})();
</script>