<div class="d-none d-md-block">
    <div class="top-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="social-links">
                        <ul>
                            <li><a href="{{$app_profile->facebook_link}}" target="_blank"><i class="icon icon-facebook"></i></a></li>
                            <li><a href="{{$app_profile->twitter_link}}" target="_blank"><i class="icon icon-twitter"></i></a></li>
                            <li><a href="{{$app_profile->youtube_link}}" target="_blank"><i class="icon icon-youtube-play"></i></a></li>
                            <li><a href="{{$app_profile->insta_link}}" target="_blank"><i class="icon icon-behance-square"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-element">
                        @if(Auth::check())
                        <a href="{{url('userprofile')}}"><i class="icon icon-user"></i><span> {{ Auth::user()->name }}</span></a>
<<<<<<< HEAD
                        @endif
                            <a href="{{url('cart')}}" class="cart for-buy"><i class="icon icon-clipboard"></i><span  id="carts" >:{{ $cartCount }}</span></a>
                        
                       
                        
                      
                      
=======
                        <a href="{{url('cart')}}" class="cart for-buy"><i class="icon icon-clipboard"></i><span id="carts">:{{ $cartCount }}</span></a>
                        @else
                        <a href="{{url('userlogin')}}" class="user-account for-buy"><span>Sign In</span></a>
                        @endif
>>>>>>> 521198415b418be242a5aa36920cd3ed7f96de1b
                        <div class="action-menu">
                            <div class="search-bar">
                                <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                    <i class="icon icon-search"></i>
                                </a>
                                <div class="search-wrapper">
                                    <form role="search" method="get" class="search-box" autocomplete="off">
                                        <input class="search-input" placeholder="Search products..." type="search" id="search">
                                    </form>
                                    <div id="search-list" class="dropdown-box"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="main-logo">
                        <a href="{{url('index')}}"><img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-10">
                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><a href="{{url('index')}}">Home</a></li>
<<<<<<< HEAD
                                <!-- <li class="menu-item {{ Route::currentRouteName() == 'product-list' ? 'active' : '' }}"><a href="{{url('product-list')}}" class="nav-link">Products</a></li> -->
=======
                                <li class="menu-item {{ Route::currentRouteName() == 'product-list' ? 'active' : '' }}"><a href="{{url('product-list')}}" class="nav-link">Products</a></li>
>>>>>>> 521198415b418be242a5aa36920cd3ed7f96de1b
                                <li class="menu-item {{ Route::currentRouteName() == 'aboutus' ? 'active' : '' }}"><a href="{{url('aboutus')}}" class="nav-link">About Us</a></li>
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

<<<<<<< HEAD
    <!--<div class="category-bar">-->
    <!--    <div class="container-fluid">-->
    <!--        <ul class="category-menu">-->
    <!--            <li><a href="{{url('product-list/1')}}">Men</a></li>-->
               
    <!--            <li><a href="{{url('product-list/3')}}">Kids</a></li>-->
                
    <!--              @foreach($categorylist as $cat)-->
    <!--            <li><a href="#">{{$cat->category_name}}</a></li>-->
    <!--            @endforeach-->

    <!--        </ul>-->
    <!--    </div>-->
    <!--</div>-->
</div>

<div class="d-block d-md-none mob-header-wrap">
    <div class="mob-topbar">
        <a href="{{url('index')}}" class="mob-logo-link">
            <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo" class="mob-logo-img">
        </a>
        <div class="mob-action-icons">
            <a href="{{url('product-list')}}" class="mob-icon" title="Products">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            
            <a href="{{url('cart')}}" class="mob-icon" title="Cart">
                <i class="fa-solid fa-cart-shopping"></i>
                @if($cartCount > 0)
                <span class="mob-badge" >{{ $cartCount }}</span>
                @endif
            </a>
            @if(Auth::check())
            <a href="{{url('userprofile')}}"  class="mob-icon" title="Profile">
                <i class="fa-solid fa-user"></i>
            </a>
           @endif

             
            <!-- <span class="mob-badge" id="mobilecart" >1</span> -->
            <!-- <a href="{{url('userlogin')}}" class="mob-icon" title="Sign In">
                <i class="fa-solid fa-user"></i>
            </a> -->
            
            <button class="mob-icon mob-hamburger" id="mobMenuBtn" title="Menu" style="background:none;border:none;padding:0;cursor:pointer;">
                <i class="fa-solid fa-bars" style="font-size:18px;color:#212121;"></i>
            </button>
=======
    <div class="category-bar">
        <div class="container-fluid">
            <ul class="category-menu">
                <li><a href="#">Men</a></li>
                <li><a href="#">Women</a></li>
                <li><a href="#">Kids</a></li>
                <li><a href="#">T-Shirts</a></li>
                <li><a href="#">Shirts</a></li>
                <li><a href="#">Jeans</a></li>
                <li><a href="#">Jackets</a></li>
                <li><a href="#">Footwear</a></li>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#" style="color:#e53935;">Sale 🔥</a></li>
            </ul>
>>>>>>> 521198415b418be242a5aa36920cd3ed7f96de1b
        </div>
    </div>

     <div class="mob-cat-bar">
        <ul class="mob-cat-list" id="mobCatList">
            <li><a href="{{url('product-list/1')}}" class="mob-cat-link active">Men</a></li>
           
            <li><a href="{{url('product-list/3')}}" class="mob-cat-link">Kids</a></li>
             @foreach($categorylist as $cat)
            <li><a href="#" class="mob-cat-link">{{$cat->category_name}}</a></li>
             @endforeach
           
        </ul> 
    </div> 

    <div class="mob-drawer-overlay" id="mobDrawerOverlay"></div>
    <div class="mob-drawer" id="mobDrawer">
        <div class="mob-drawer-header">
            <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo" style="height:28px;">
            <button class="mob-drawer-close" id="mobDrawerClose">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <nav class="mob-drawer-nav">
            <a href="{{url('index')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'index' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-house"></i> Home
            </a>
            <a href="{{url('product-list')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'product-list' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-shirt"></i> Products
            </a>
            <a href="{{url('aboutus')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'aboutus' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-circle-info"></i> About Us
            </a>
            <a href="{{url('team')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'team' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-users"></i> Team
            </a>
            <a href="{{url('contactus')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'contactus' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-envelope"></i> Contact Us
            </a>
            <div class="mob-drawer-divider"></div>
            @if(Auth::check())
            <a href="{{url('userprofile')}}" class="mob-drawer-link">
                <i class="fa-solid fa-user"></i> My Profile
            </a>
            <a href="{{url('cart')}}" class="mob-drawer-link">
                <i class="fa-solid fa-cart-shopping"></i> My Cart
                @if($cartCount > 0)<span class="mob-drawer-badge">{{ $cartCount }}</span>@endif
            </a>
            @else
            <a href="{{url('userlogin')}}" class="mob-drawer-link">
                <i class="fa-solid fa-right-to-bracket"></i> Sign In
            </a>
            @endif
        </nav>
    </div>
</div>

<div class="d-block d-md-none mob-header-wrap">
    <div class="mob-topbar">
        <a href="{{url('index')}}" class="mob-logo-link">
            <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo" class="mob-logo-img">
        </a>
        <div class="mob-action-icons">
            <a href="{{url('product-list')}}" class="mob-icon" title="Products">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            @if(Auth::check())
            <a href="{{url('cart')}}" class="mob-icon" title="Cart">
                <i class="fa-solid fa-cart-shopping"></i>
                @if($cartCount > 0)
                <span class="mob-badge">{{ $cartCount }}</span>
                @endif
            </a>
            <a href="{{url('userprofile')}}" class="mob-icon" title="Profile">
                <i class="fa-solid fa-user"></i>
            </a>
            @else
            <a href="{{url('userlogin')}}" class="mob-icon" title="Sign In">
                <i class="fa-solid fa-user"></i>
            </a>
            @endif
            <button class="mob-icon mob-hamburger" id="mobMenuBtn" title="Menu" style="background:none;border:none;padding:0;cursor:pointer;">
                <i class="fa-solid fa-bars" style="font-size:18px;color:#212121;"></i>
            </button>
        </div>
    </div>

    <div class="mob-cat-bar">
        <ul class="mob-cat-list" id="mobCatList">
            <li><a href="#" class="mob-cat-link active">Men</a></li>
            <li><a href="#" class="mob-cat-link">Women</a></li>
            <li><a href="#" class="mob-cat-link">Kids</a></li>
            <li><a href="#" class="mob-cat-link">T-Shirts</a></li>
            <li><a href="#" class="mob-cat-link">Shirts</a></li>
            <li><a href="#" class="mob-cat-link">Jeans</a></li>
            <li><a href="#" class="mob-cat-link">Jackets</a></li>
            <li><a href="#" class="mob-cat-link">Footwear</a></li>
            <li><a href="#" class="mob-cat-link">Accessories</a></li>
            <li><a href="#" class="mob-cat-link">New Arrivals</a></li>
            <li><a href="#" class="mob-cat-link mob-sale">Sale 🔥</a></li>
        </ul>
    </div>

    <div class="mob-drawer-overlay" id="mobDrawerOverlay"></div>
    <div class="mob-drawer" id="mobDrawer">
        <div class="mob-drawer-header">
            <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo" style="height:28px;">
            <button class="mob-drawer-close" id="mobDrawerClose">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <nav class="mob-drawer-nav">
            <a href="{{url('index')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'index' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-house"></i> Home
            </a>
            <a href="{{url('product-list')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'product-list' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-shirt"></i> Products
            </a>
            <a href="{{url('aboutus')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'aboutus' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-circle-info"></i> About Us
            </a>
            <a href="{{url('team')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'team' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-users"></i> Team
            </a>
            <a href="{{url('contactus')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'contactus' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-envelope"></i> Contact Us
            </a>
            <div class="mob-drawer-divider"></div>
            @if(Auth::check())
            <a href="{{url('userprofile')}}" class="mob-drawer-link">
                <i class="fa-solid fa-user"></i> My Profile
            </a>
            <a href="{{url('cart')}}" class="mob-drawer-link">
                <i class="fa-solid fa-cart-shopping"></i> My Cart
                @if($cartCount > 0)<span class="mob-drawer-badge">{{ $cartCount }}</span>@endif
            </a>
            @else
            <a href="{{url('userlogin')}}" class="mob-drawer-link">
                <i class="fa-solid fa-right-to-bracket"></i> Sign In
            </a>
            @endif
        </nav>
    </div>
</div>

<style>
.mob-header-wrap {
    position: sticky;
    top: 0;
    z-index: 1050;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.mob-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 14px;
    border-bottom: 1px solid #f0f0f0;
}
.mob-logo-link { display: flex; align-items: center; }
.mob-logo-img { height: 46px; width: auto; object-fit: contain; }
.mob-action-icons {
    display: flex;
    align-items: center;
    gap: 18px;
}
.mob-icon {
    position: relative;
    color: #212121;
    font-size: 17px;
    text-decoration: none;
    display: flex;
    align-items: center;
}
.mob-badge {
    position: absolute;
    top: -6px;
    right: -8px;
    background: #ff9f00;
    color: #fff;
    font-size: 9px;
    font-weight: 700;
    border-radius: 50%;
    min-width: 15px;
    height: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}
.mob-cat-bar {
    background: #fff;
    border-bottom: 1px solid #eee;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
}
.mob-cat-bar::-webkit-scrollbar { display: none; }
.mob-cat-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0 6px;
    gap: 0;
    width: max-content;
}
.mob-cat-link {
    display: block;
    padding: 9px 12px;
    font-size: 12px;
    font-weight: 600;
    color: #555;
    white-space: nowrap;
    text-decoration: none;
    border-bottom: 2px solid transparent;
    transition: color .2s, border-color .2s;
}
.mob-cat-link:hover,
.mob-cat-link.active {
    color: #2874f0;
    border-bottom-color: #2874f0;
}
.mob-sale { color: #e53935 !important; }
.mob-drawer-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    z-index: 2000;
}
.mob-drawer-overlay.open { display: block; }
.mob-drawer {
    position: fixed;
    top: 0;
    right: -280px;
    width: 270px;
    height: 100%;
    background: #fff;
    z-index: 2100;
    transition: right 0.28s ease;
    display: flex;
    flex-direction: column;
    box-shadow: -4px 0 20px rgba(0,0,0,0.15);
}
.mob-drawer.open { right: 0; }
.mob-drawer-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 16px;
    border-bottom: 1px solid #f0f0f0;
    background: #f8f8f8;
}
.mob-drawer-close {
    background: none;
    border: none;
    font-size: 18px;
    color: #555;
    cursor: pointer;
    padding: 4px 6px;
}
.mob-drawer-nav {
    display: flex;
    flex-direction: column;
    padding: 8px 0;
    overflow-y: auto;
    flex: 1;
}
.mob-drawer-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 20px;
    font-size: 14px;
    font-weight: 500;
    color: #212121;
    text-decoration: none;
    border-left: 3px solid transparent;
    transition: background 0.15s, border-color 0.15s;
}
.mob-drawer-link i { width: 18px; text-align: center; color: #666; font-size: 14px; }
.mob-drawer-link:hover { background: #f5f5f5; color: #2874f0; }
.mob-drawer-link:hover i { color: #2874f0; }
.mob-drawer-active {
    border-left-color: #2874f0;
    background: #f0f4ff;
    color: #2874f0;
    font-weight: 600;
}
.mob-drawer-active i { color: #2874f0; }
.mob-drawer-divider {
    height: 1px;
    background: #f0f0f0;
    margin: 6px 0;
}
.mob-drawer-badge {
    margin-left: auto;
    background: #ff9f00;
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    border-radius: 10px;
    padding: 1px 7px;
}
</style>

<script>
(function(){
    var catLinks = document.querySelectorAll('.mob-cat-link');
    catLinks.forEach(function(link){
        link.addEventListener('click', function(){
            catLinks.forEach(function(l){ l.classList.remove('active'); });
            link.classList.add('active');
        });
    });

    var btn      = document.getElementById('mobMenuBtn');
    var drawer   = document.getElementById('mobDrawer');
    var overlay  = document.getElementById('mobDrawerOverlay');
    var closeBtn = document.getElementById('mobDrawerClose');

    function openDrawer()  { drawer.classList.add('open'); overlay.classList.add('open'); }
    function closeDrawer() { drawer.classList.remove('open'); overlay.classList.remove('open'); }

    if (btn)      btn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay)  overlay.addEventListener('click', closeDrawer);
})();
</script>