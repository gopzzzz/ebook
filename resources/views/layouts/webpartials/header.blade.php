  <div class="top-announcement-ticker" role="region" aria-label="Store Announcements">
    <div class="ticker-track">
      {{-- Group 1 --}}
      <div class="ticker-item"><i class="ri-truck-line icon-green"></i> <span>FREE 24HR DELIVERY IN TRIVANDRUM</span></div>
      <span class="ticker-sep">|</span>
      <div class="ticker-item"><i class="ri-award-fill icon-gold"></i> <span>31+ YEARS EXPERIENCE</span></div>
      <span class="ticker-sep">|</span>
      <div class="ticker-item"><i class="ri-shield-check-fill icon-cyan"></i> <span>100% AUTHENTIC BRAND WARRANTY</span></div>
      <span class="ticker-sep">|</span>
      <div class="ticker-item"><i class="ri-flashlight-fill icon-yellow"></i> <span>SAME DAY DISPATCH ON GAMING GEAR</span></div>
      <span class="ticker-sep">|</span>
      <div class="ticker-item"><i class="ri-customer-service-2-fill icon-green"></i> <span>PREMIUM AFTER-SALES SUPPORT IN KERALA</span></div>
      <span class="ticker-sep">|</span>

      {{-- Group 2 (Duplicate for infinite seamless scrolling) --}}
      <div class="ticker-item"><i class="ri-truck-line icon-green"></i> <span>FREE 24HR DELIVERY IN TRIVANDRUM</span></div>
      <span class="ticker-sep">|</span>
      <div class="ticker-item"><i class="ri-award-fill icon-gold"></i> <span>31+ YEARS EXPERIENCE</span></div>
      <span class="ticker-sep">|</span>
      <div class="ticker-item"><i class="ri-shield-check-fill icon-cyan"></i> <span>100% AUTHENTIC BRAND WARRANTY</span></div>
      <span class="ticker-sep">|</span>
      <div class="ticker-item"><i class="ri-flashlight-fill icon-yellow"></i> <span>SAME DAY DISPATCH ON GAMING GEAR</span></div>
      <span class="ticker-sep">|</span>
      <div class="ticker-item"><i class="ri-customer-service-2-fill icon-green"></i> <span>PREMIUM AFTER-SALES SUPPORT IN KERALA</span></div>
      <span class="ticker-sep">|</span>
    </div>
  </div>

  <header class="site-header" id="siteHeader">
    <div class="header-inner">

      <a href="{{url('/')}}" class="logo-link" aria-label="Pouch Gallery Home">
        <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="Pouch Gallery Logo" class="logo-img" />
       
      </a>

  <div class="header-search" id="headerSearch">
    <i class="ri-search-line search-icon"></i>
    <input type="search"
           placeholder="Search products, brands..."
           id="searchInput"
           autocomplete="off">
    <button class="search-btn" id="searchBtn" aria-label="Search">
        Search
    </button>
</div>
      <div class="header-actions">
        <button class="hdr-btn mobile-search-toggle" id="mobileSearchBtn" aria-label="Toggle Search">
          <i class="ri-search-line"></i>
        </button>

          @if(Auth::check())
          <a href="{{url('userprofile')}}" class="hdr-btn" aria-label="Account">
          <i class="ri-user-line"></i>
        </a>
                  
                @else
                <a href="{{url('userlogin')}}" class="hdr-btn" aria-label="Account">
          <i class="ri-user-line"></i>
        </a>
                 
                @endif

        <a href="{{url('cart')}}" class="hdr-btn cart-btn" aria-label="Cart">
          <i class="ri-shopping-cart-line"></i>
          <span class="badge" id="carts">{{$cartCount}}</span>
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>

    <nav class="main-nav" id="mainNav">
      <div class="nav-inner">
        <ul class="nav-list">
          <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link active">Home</a>
          </li>
          <!-- <li class="nav-item has-dropdown">
            <a href="{{url('/gaming-products')}}" class="nav-link">
              🎮 Gaming <i class="ri-arrow-down-s-line"></i>
            </a>
            <div class="mega-dropdown">
              <div class="mega-inner">
                <div class="mega-col">
                  <h4>Peripherals</h4>
                  <a href="{{url('/gaming-products?cat=keyboards')}}">Mechanical Keyboards</a>
                  <a href="{{url('/gaming-products?cat=mice')}}">Gaming Mice</a>
                  <a href="{{url('/gaming-products?cat=headsets')}}">Headsets</a>
                  <a href="{{url('/gaming-products?cat=mousepads')}}">Mousepads</a>
                  <a href="{{url('/gaming-products?cat=controllers')}}">Controllers</a>
                </div>
                <div class="mega-col">
                  <h4>Gear</h4>
                  <a href="{{url('/gaming-products?cat=chairs')}}">Gaming Chairs</a>
                  <a href="{{url('/gaming-products?cat=monitors')}}">Monitors</a>
                  <a href="{{url('/gaming-products?cat=webcams')}}">Webcams</a>
                  <a href="{{url('/gaming-products?cat=cables')}}">Cables & Hubs</a>
                </div>
                <div class="mega-col mega-featured">
                  <h4>Featured Deal</h4>
                  <a href="{{url('/gaming-product/1')}}" class="mega-feature-card">
                    <img src="{{asset('public/assets/keyboard.png')}}" alt="RGB Keyboard" />
                    <div>
                      <strong>RGB Pro Keyboard</strong>
                      <span>₹3,499 <del>₹5,999</del></span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </li> -->
            @foreach($type as $ty)
          <li class="nav-item has-dropdown">
            
            <a href="{{url('')}}" class="nav-link btn-gaming-nav">{{$ty->name}} <i class="ri-arrow-down-s-line"></i></a>
             @php 
              $subcat=DB::table('categories')->where('main_id',$ty->id)->get();
             @endphp
            <div class="dropdown">
              @foreach($subcat as $item)
              <a href="{{url('gaming-products/'.$item->id)}}">{{$item->category_name}}</a>
              @endforeach
            </div>
          </li>
          @endforeach
          @foreach($catlimit as $cat)
          <li class="nav-item">
            <a href="{{url('productlist/'.$cat->id)}}" class="nav-link">{{$cat->category_name}}</a>
          </li>
          @endforeach
          <li class="nav-item">
            <a href="{{url('/#our-brands')}}" class="nav-link">Our Brands</a>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>
