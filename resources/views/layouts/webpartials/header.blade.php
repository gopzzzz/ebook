<div class="d-none d-lg-block">
    <div class="zuky-topbar">
        <div class="zuky-topbar-inner">
            <div class="zt-social">
                <a href="{{$app_profile->facebook_link}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="{{$app_profile->twitter_link}}"  target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="{{$app_profile->youtube_link}}"  target="_blank"><i class="fa-brands fa-youtube"></i></a>
                <a href="{{$app_profile->insta_link}}"    target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <div class="zt-promo">
                <span>🎀 Free shipping on orders above ₹499 &nbsp;|&nbsp; 🐰 New kawaii arrivals every week! &nbsp;|&nbsp; ✨ Use code ZUKY10 for 10% off your first order</span>
            </div>
            <div class="zt-right">
                @if(Auth::check())
                    <a href="{{url('userprofile')}}" class="zt-action-link"><i class="fa-regular fa-user"></i> {{ Auth::user()->name }}</a>
                @else
                    <a href="{{url('userlogin')}}" class="zt-action-link"><i class="fa-regular fa-user"></i> Sign In</a>
                @endif
                <a href="{{url('cart')}}" class="zt-action-link zt-cart-link">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span class="zt-cart-count" id="carts">{{ $cartCount }}</span>
                </a>
            </div>
        </div>
    </div>

    <header class="zuky-header" id="zukyHeader">
        <div class="zuky-header-inner">
            <a href="{{url('index')}}" class="zuky-logo-link">
                <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="Zuky Logo" class="zuky-logo-img">
            </a>

            <div class="zuky-search-wrap">
                <div class="zuky-search-box">
                    <i class="fa-solid fa-magnifying-glass zuky-search-icon"></i>
                    <form role="search" method="get" autocomplete="off" style="flex:1;">
                        <input class="zuky-search-input" placeholder="Search kawaii products, gifts..." type="search" id="search">
                    </form>
                </div>
                <div id="search-list" class="zuky-dropdown-box"></div>
            </div>

            <nav class="zuky-nav">
                <ul class="zuky-menu">
                    <li class="zuky-menu-item {{ Route::currentRouteName() == 'index' ? 'zuky-active' : '' }}">
                        <a href="{{url('index')}}">Home</a>
                    </li>
                    <li class="zuky-menu-item {{ Route::currentRouteName() == 'product-list' ? 'zuky-active' : '' }} zuky-has-drop">
                        <a href="{{url('product-list')}}">Products <i class="fa-solid fa-chevron-down" style="font-size:9px;margin-left:2px;"></i></a>
                        <ul class="zuky-dropdown">
                            @foreach($categorylist as $cat)
                            <li><a href="{{url('product-list/'.$cat->id)}}">{{$cat->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="zuky-menu-item {{ Route::currentRouteName() == 'aboutus' ? 'zuky-active' : '' }}">
                        <a href="{{url('aboutus')}}">About Us</a>
                    </li>
                    <li class="zuky-menu-item {{ Route::currentRouteName() == 'contactus' ? 'zuky-active' : '' }}">
                        <a href="{{url('contactus')}}">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="zuky-cat-bar">
            <div class="zuky-cat-bar-inner">
                <ul class="zuky-cat-list">
                    <li><a href="{{url('product-list')}}" class="zuky-cat-pill active">🌟 All Products</a></li>
                    @foreach($categorylist as $cat)
                    <li><a href="{{url('product-list/'.$cat->id)}}" class="zuky-cat-pill">{{$cat->category_name}}</a></li>
                    @endforeach
                    <li><a href="{{url('product-list')}}" class="zuky-cat-pill zuky-cat-sale">🔥 Sale</a></li>
                    <li><a href="{{url('product-list')}}" class="zuky-cat-pill zuky-cat-new">✨ New Arrivals</a></li>
                </ul>
            </div>
        </div>
    </header>
</div>

<div class="d-block d-lg-none mob-header-wrap">
    <div class="mob-topbar">
        <a href="{{url('index')}}" class="mob-logo-link">
            <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo" class="mob-logo-img">
        </a>
        <div class="mob-action-icons">
            <a href="{{url('product-list')}}" class="mob-icon" title="Search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <a href="{{url('cart')}}" class="mob-icon" title="Cart">
                <i class="fa-solid fa-bag-shopping"></i>
                @if($cartCount > 0)
                <span class="mob-badge">{{ $cartCount }}</span>
                @endif
            </a>
            @if(Auth::check())
            <a href="{{url('userprofile')}}" class="mob-icon" title="Profile">
                <i class="fa-solid fa-user"></i>
            </a>
            @endif
            <button class="mob-icon mob-hamburger" id="mobMenuBtn" style="background:none;border:none;padding:0;cursor:pointer;">
                <i class="fa-solid fa-bars" style="font-size:18px;"></i>
            </button>
        </div>
    </div>

    <div class="mob-cat-bar">
        <ul class="mob-cat-list" id="mobCatList">
            <li><a href="{{url('product-list')}}" class="mob-cat-link active">🌟 All</a></li>
            @foreach($categorylist as $cat)
            <li><a href="{{url('product-list/'.$cat->id)}}" class="mob-cat-link">{{$cat->category_name}}</a></li>
            @endforeach
            <li><a href="{{url('product-list')}}" class="mob-cat-link" style="color:#e91e8c;">🔥 Sale</a></li>
        </ul>
    </div>

    <div class="mob-drawer-overlay" id="mobDrawerOverlay"></div>
    <div class="mob-drawer" id="mobDrawer">
        <div class="mob-drawer-header">
            <img src="{{asset('public/uploads/profile/'.$app_profile->logo)}}" alt="logo" style="height:36px;">
            <button class="mob-drawer-close" id="mobDrawerClose"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <nav class="mob-drawer-nav">
            <a href="{{url('index')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'index' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-house"></i> Home
            </a>
            <a href="{{url('product-list')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'product-list' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-store"></i> Products
            </a>
            <a href="{{url('aboutus')}}" class="mob-drawer-link {{ Route::currentRouteName() == 'aboutus' ? 'mob-drawer-active' : '' }}">
                <i class="fa-solid fa-circle-info"></i> About Us
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
                <i class="fa-solid fa-bag-shopping"></i> My Cart
                @if($cartCount > 0)<span class="mob-drawer-badge">{{ $cartCount }}</span>@endif
            </a>
            @else
            <a href="{{url('userlogin')}}" class="mob-drawer-link">
                <i class="fa-solid fa-right-to-bracket"></i> Sign In
            </a>
            @endif
        </nav>
        <div class="mob-drawer-footer">
            <div class="mob-drawer-social">
                <a href="{{$app_profile->facebook_link}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="{{$app_profile->insta_link}}"    target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="{{$app_profile->youtube_link}}"  target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --zuky-pink:        #e91e8c;
    --zuky-pink-light:  #ff6eb4;
    --zuky-pink-pale:   #fce4ec;
    --zuky-pink-pastel: #fff0f8;
    --zuky-mint:        #4db6ac;
    --zuky-teal:        #00897b;
    --zuky-purple:      #ab47bc;
    --zuky-yellow:      #ffca28;
    --zuky-dark:        #1a1a2e;
    --zuky-text:        #3d3d3d;
    --zuky-gray:        #757575;
    --zuky-border:      #f0d6e8;
}

.zuky-topbar {
    background: linear-gradient(90deg, #e91e8c 0%, #ab47bc 50%, #4db6ac 100%);
    padding: 6px 0;
}
.zuky-topbar-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 24px;
    gap: 16px;
}
.zt-social {
    display: flex;
    gap: 14px;
    flex-shrink: 0;
}
.zt-social a {
    color: #fff;
    font-size: 13px;
    opacity: 0.85;
    transition: opacity .2s, transform .2s;
    text-decoration: none;
}
.zt-social a:hover { opacity: 1; transform: scale(1.2); color: #fff; }
.zt-promo {
    flex: 1;
    text-align: center;
    font-size: 11.5px;
    font-weight: 600;
    color: #fff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.zt-right {
    display: flex;
    gap: 18px;
    align-items: center;
    flex-shrink: 0;
}
.zt-action-link {
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
    white-space: nowrap;
    transition: opacity .2s;
}
.zt-action-link:hover { opacity: 0.8; color: #fff; }
.zt-cart-link { position: relative; }
.zt-cart-count {
    position: absolute;
    top: -8px;
    right: -10px;
    background: #fff;
    color: var(--zuky-pink);
    font-size: 9px;
    font-weight: 800;
    border-radius: 50%;
    min-width: 17px;
    height: 17px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}

.zuky-header {
    position: sticky;
    top: 0;
    z-index: 1200;
    background: #fff;
    box-shadow: 0 2px 16px rgba(233,30,140,0.08);
    border-bottom: 3px solid var(--zuky-pink-pale);
}
.zuky-header-inner {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    justify-content: space-between;
    gap: 20px;
    padding: 10px 24px;
}
.zuky-logo-link {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    text-decoration: none;
}
.zuky-logo-img {
    height: 75px;
    max-width: 200px;
    width: auto;
    object-fit: contain;
    transition: transform .3s;
}
.zuky-logo-img:hover { transform: scale(1.04); }

.zuky-search-wrap {
    flex: 0 1 320px; /* Don't grow past 320px, allow shrink */
    position: relative;
    min-width: 150px;
}
.zuky-search-box {
    display: flex;
    align-items: center;
    background: var(--zuky-pink-pastel);
    border: 2px solid var(--zuky-border);
    border-radius: 50px;
    padding: 0 16px;
    height: 42px;
    transition: border-color .2s, box-shadow .2s;
    min-width: 0;
}
.zuky-search-box:focus-within {
    border-color: var(--zuky-pink);
    box-shadow: 0 0 0 3px rgba(233,30,140,0.12);
}
.zuky-search-icon {
    color: var(--zuky-pink);
    font-size: 14px;
    margin-right: 10px;
    flex-shrink: 0;
}
.zuky-search-input {
    border: none;
    background: transparent;
    outline: none;
    width: 100%;
    min-width: 0;
    font-size: 13px;
    color: var(--zuky-text);
    font-family: inherit;
    padding: 0;
    line-height: 1;
}
.zuky-search-input::placeholder { color: #bbb; }
.zuky-dropdown-box {
    position: absolute;
    top: calc(100% + 8px);
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid var(--zuky-border);
    border-radius: 14px;
    box-shadow: 0 8px 30px rgba(233,30,140,0.12);
    max-height: 300px;
    overflow-y: auto;
    display: none;
    z-index: 9999;
}
.dropdown-item {
    padding: 11px 18px;
    cursor: pointer;
    color: var(--zuky-text);
    font-size: 13px;
    transition: background .15s;
    border-radius: 10px;
}
.dropdown-item:hover { background: var(--zuky-pink-pastel); color: var(--zuky-pink); }

.zuky-nav { margin-left: auto; flex-shrink: 0; }
.zuky-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 2px;
    align-items: center;
}
.zuky-menu-item { position: relative; }
.zuky-menu-item > a {
    display: block;
    padding: 10px 16px;
    font-size: 14px;
    font-weight: 600;
    color: var(--zuky-text);
    text-decoration: none;
    border-radius: 50px;
    white-space: nowrap;
    transition: background .2s, color .2s;
}
.zuky-menu-item:hover > a,
.zuky-menu-item.zuky-active > a {
    color: var(--zuky-pink);
    background: var(--zuky-pink-pastel);
}
.zuky-menu-item.zuky-active > a { font-weight: 700; }

.zuky-dropdown {
    display: none;
    position: absolute;
    top: calc(100% + 6px);
    left: 0;
    min-width: 200px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 12px 40px rgba(233,30,140,0.14);
    border: 1px solid var(--zuky-border);
    list-style: none;
    padding: 8px;
    margin: 0;
    z-index: 9999;
    animation: ztFadeDown .2s ease;
}
@keyframes ztFadeDown {
    from { opacity: 0; transform: translateY(-8px); }
    to   { opacity: 1; transform: translateY(0); }
}
.zuky-has-drop:hover .zuky-dropdown { display: block; }
.zuky-dropdown li a {
    display: block;
    padding: 9px 14px;
    color: var(--zuky-text);
    font-size: 13px;
    font-weight: 500;
    border-radius: 10px;
    text-decoration: none;
    transition: background .15s, color .15s;
}
.zuky-dropdown li a:hover { background: var(--zuky-pink-pastel); color: var(--zuky-pink); }

.zuky-cat-bar {
    background: linear-gradient(90deg, var(--zuky-pink-pastel) 0%, #f3e5f5 50%, #e0f2f1 100%);
    border-top: 1px solid var(--zuky-border);
}
.zuky-cat-bar-inner {
    padding: 0 24px;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
}
.zuky-cat-bar-inner::-webkit-scrollbar { display: none; }
.zuky-cat-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 4px;
    width: max-content;
    align-items: center;
}
.zuky-cat-pill {
    display: block;
    padding: 7px 16px;
    font-size: 12.5px;
    font-weight: 600;
    color: #666;
    text-decoration: none;
    border-radius: 50px;
    border: 1.5px solid transparent;
    white-space: nowrap;
    transition: all .22s;
    margin: 6px 0;
}
.zuky-cat-pill:hover,
.zuky-cat-pill.active {
    background: var(--zuky-pink);
    color: #fff;
    border-color: var(--zuky-pink);
    box-shadow: 0 4px 14px rgba(233,30,140,0.3);
}
.zuky-cat-sale { color: #e53935; }
.zuky-cat-sale:hover { background: #e53935 !important; border-color: #e53935 !important; color: #fff !important; }
.zuky-cat-new { color: var(--zuky-purple); }
.zuky-cat-new:hover { background: var(--zuky-purple) !important; border-color: var(--zuky-purple) !important; color: #fff !important; }

.mob-header-wrap {
    position: sticky;
    top: 0;
    z-index: 1050;
    background: #fff;
    box-shadow: 0 2px 12px rgba(233,30,140,0.10);
    border-bottom: 2px solid var(--zuky-pink-pale);
}
.mob-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 14px;
}
.mob-logo-link { display: flex; align-items: center; }
.mob-logo-img { height: 44px; width: auto; object-fit: contain; }
.mob-action-icons { display: flex; align-items: center; gap: 16px; }
.mob-icon {
    position: relative;
    color: var(--zuky-pink);
    font-size: 17px;
    text-decoration: none;
    display: flex;
    align-items: center;
    transition: transform .2s;
}
.mob-icon:hover { transform: scale(1.12); color: var(--zuky-pink); }
.mob-badge {
    position: absolute;
    top: -6px;
    right: -8px;
    background: var(--zuky-pink);
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
    background: linear-gradient(90deg, var(--zuky-pink-pastel), #f3e5f5);
    border-bottom: 1px solid var(--zuky-border);
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
    padding: 8px 13px;
    font-size: 12px;
    font-weight: 600;
    color: #666;
    white-space: nowrap;
    text-decoration: none;
    border-bottom: 2.5px solid transparent;
    transition: color .2s, border-color .2s;
}
.mob-cat-link:hover, .mob-cat-link.active {
    color: var(--zuky-pink);
    border-bottom-color: var(--zuky-pink);
}
.mob-drawer-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 2000; }
.mob-drawer-overlay.open { display: block; }
.mob-drawer {
    position: fixed;
    top: 0;
    right: -290px;
    width: 275px;
    height: 100%;
    background: #fff;
    z-index: 2100;
    transition: right .28s cubic-bezier(.4,0,.2,1);
    display: flex;
    flex-direction: column;
    box-shadow: -6px 0 30px rgba(233,30,140,0.15);
}
.mob-drawer.open { right: 0; }
.mob-drawer-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 16px;
    background: linear-gradient(90deg, var(--zuky-pink-pastel), #f3e5f5);
    border-bottom: 2px solid var(--zuky-border);
}
.mob-drawer-close { background: none; border: none; font-size: 18px; color: var(--zuky-pink); cursor: pointer; padding: 4px 6px; }
.mob-drawer-nav { display: flex; flex-direction: column; padding: 8px 0; overflow-y: auto; flex: 1; }
.mob-drawer-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 20px;
    font-size: 14px;
    font-weight: 500;
    color: var(--zuky-text);
    text-decoration: none;
    border-left: 3px solid transparent;
    transition: background .15s, border-color .15s, color .15s;
}
.mob-drawer-link i { width: 18px; text-align: center; color: var(--zuky-gray); font-size: 14px; }
.mob-drawer-link:hover { background: var(--zuky-pink-pastel); color: var(--zuky-pink); border-left-color: var(--zuky-pink); }
.mob-drawer-link:hover i { color: var(--zuky-pink); }
.mob-drawer-active { border-left-color: var(--zuky-pink); background: var(--zuky-pink-pastel); color: var(--zuky-pink); font-weight: 700; }
.mob-drawer-active i { color: var(--zuky-pink); }
.mob-drawer-divider { height: 1px; background: var(--zuky-border); margin: 6px 0; }
.mob-drawer-badge { margin-left: auto; background: var(--zuky-pink); color: #fff; font-size: 10px; font-weight: 700; border-radius: 10px; padding: 1px 7px; }
.mob-drawer-footer { padding: 14px 20px; border-top: 1px solid var(--zuky-border); }
.mob-drawer-social { display: flex; gap: 16px; }
.mob-drawer-social a { color: var(--zuky-pink); font-size: 18px; transition: transform .2s; text-decoration: none; }
.mob-drawer-social a:hover { transform: scale(1.2); }
</style>

<script>
(function(){
    var btn      = document.getElementById('mobMenuBtn');
    var drawer   = document.getElementById('mobDrawer');
    var overlay  = document.getElementById('mobDrawerOverlay');
    var closeBtn = document.getElementById('mobDrawerClose');
    function openDrawer()  { drawer.classList.add('open'); overlay.classList.add('open'); document.body.style.overflow = 'hidden'; }
    function closeDrawer() { drawer.classList.remove('open'); overlay.classList.remove('open'); document.body.style.overflow = ''; }
    if (btn)      btn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay)  overlay.addEventListener('click', closeDrawer);

    document.querySelectorAll('.mob-cat-link').forEach(function(link){
        link.addEventListener('click', function(){
            document.querySelectorAll('.mob-cat-link').forEach(function(l){ l.classList.remove('active'); });
            link.classList.add('active');
        });
    });

    document.querySelectorAll('.zuky-cat-pill').forEach(function(pill){
        pill.addEventListener('click', function(){
            document.querySelectorAll('.zuky-cat-pill').forEach(function(p){ p.classList.remove('active'); });
            pill.classList.add('active');
        });
    });

    var header = document.getElementById('zukyHeader');
    if (header) {
        window.addEventListener('scroll', function(){
            header.style.boxShadow = window.scrollY > 50
                ? '0 4px 32px rgba(233,30,140,0.18)'
                : '0 2px 16px rgba(233,30,140,0.08)';
        });
    }
})();
</script>