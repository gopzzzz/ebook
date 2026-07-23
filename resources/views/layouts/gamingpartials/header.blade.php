<header class="g-header" id="gHeader">
    <div class="g-header-inner g-container">
      <a href="{{url('/')}}" class="g-logo">
        <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="Pouch Gallery" class="g-logo-img" />
       
      </a>
    
      <div class="g-actions">
        <a href="{{url('/index')}}" class="g-action-btn" title="Back to Store"><i class="ri-store-line"></i></a>
        
          @if(Auth::check())
           <a href="{{url('userprofile')}}" class="g-action-btn"><i class="ri-user-line"></i></a>
          
                  
                @else
                <a href="{{url('userlogin')}}" class="g-action-btn"><i class="ri-user-line"></i></a>
              
                 
                @endif
       
        <a href="{{url('cart')}}" class="g-action-btn"><i class="ri-shopping-cart-line"></i><span class="g-badge" id="carts">{{$cartCount}}</span></a>
        <button class="g-mobile-menu-btn" id="gMenuBtn"><span></span><span></span><span></span></button>
      </div>
    </div>
    
    <nav class="g-nav" id="gNav">
      <div class="g-nav-inner g-container">
        <a href="{{url('/index')}}" class="g-nav-link home-link"><i class="ri-arrow-left-line"></i> Main Store</a>
         @foreach($gamecategories as $gcat)
        <a href="{{url('gaming-products/'.$gcat->id)}}" class="g-nav-link "><i class="ri-gamepad-line"></i> {{$gcat->category_name}}</a>
        @endforeach
     
      </div>
    </nav>
  </header>