<header class="g-header" id="gHeader">
    <div class="g-header-inner g-container">
      <a href="{{url('/')}}" class="g-logo">
        <img src="{{asset('public/assets/logo.png')}}" alt="Pouch Gallery" class="g-logo-img" />
        <span class="g-logo-text">POUCH GALLERY<sup>®</sup></span>
      </a>
      <div class="g-search">
        <i class="ri-search-line"></i>
        <input type="text" placeholder="SEARCH GAMING GEAR..." id="gSearchInput" />
        <button class="g-search-btn">SCAN</button>
      </div>
      <div class="g-actions">
        <a href="{{url('/')}}" class="g-action-btn" title="Back to Store"><i class="ri-store-line"></i></a>
        <a href="#" class="g-action-btn" id="gWishlistBtn"><i class="ri-heart-line"></i><span class="g-badge" id="gWishlistCount">0</span></a>
        <a href="#" class="g-action-btn"><i class="ri-user-line"></i></a>
        <a href="#" class="g-action-btn"><i class="ri-shopping-cart-line"></i><span class="g-badge" id="gCartCount">0</span></a>
        <button class="g-mobile-menu-btn" id="gMenuBtn"><span></span><span></span><span></span></button>
      </div>
    </div>
    
    <nav class="g-nav" id="gNav">
      <div class="g-nav-inner g-container">
        <a href="{{url('/index')}}" class="g-nav-link home-link"><i class="ri-arrow-left-line"></i> Main Store</a>
        <a href="{{url('/gaming-products')}}" class="g-nav-link active"><i class="ri-gamepad-line"></i> All Gaming</a>
        <a href="gaming-products.html?cat=keyboards" class="g-nav-link" data-cat="keyboards">⌨ Keyboards</a>
        <a href="gaming-products.html?cat=mice" class="g-nav-link" data-cat="mice">🖱 Mice</a>
        <a href="gaming-products.html?cat=headsets" class="g-nav-link" data-cat="headsets">🎧 Headsets</a>
        <a href="gaming-products.html?cat=chairs" class="g-nav-link" data-cat="chairs">🪑 Chairs</a>
        <a href="gaming-products.html?cat=monitors" class="g-nav-link" data-cat="monitors">🖥 Monitors</a>
        <a href="gaming-products.html?cat=controllers" class="g-nav-link" data-cat="controllers">🎮 Controllers</a>
        <a href="gaming-products.html?cat=mousepads" class="g-nav-link" data-cat="mousepads">⬛ Mousepads</a>
        <a href="#" class="g-nav-link" style="margin-left:auto;"><span class="g-nav-hot">SALE</span> Hot Deals</a>
      </div>
    </nav>
  </header>