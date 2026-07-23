@extends('layouts.gaminglayout')

@section('content')

  <section class="g-hero" style="min-height:55vh;">
    <div class="g-hero-grid"></div>
    <img src="{{asset('public/assets/gaming_bg.png')}}" alt="" class="g-hero-bg-img" aria-hidden="true" />
    <div class="g-hero-vignette"></div>
    <div class="g-orb g-orb-1"></div>
    <div class="g-orb g-orb-2"></div>
    <div class="g-orb g-orb-3"></div>

    <div class="g-hero-content g-container" style="min-height:55vh;">
      <div class="g-hero-text">
        <div class="g-hero-tag"><i class="ri-gamepad-fill"></i> Gaming Zone — 2026</div>
        <h1 class="g-hero-title">
          <span class="line1">DOMINATE</span>
          <span class="line2">EVERY MATCH</span>
          <span class="line3">WITH PRO GEAR</span>
        </h1>
        <p class="g-hero-sub">200+ premium gaming products. Keyboards, mice, headsets, chairs, monitors and more — all in one place.</p>
        <div class="g-btn-group">
          <a href="#products" class="g-btn g-btn-primary"><i class="ri-flashlight-fill"></i> Shop Now</a>
          <a href="#" class="g-btn g-btn-ghost">View Deals</a>
        </div>
        <div class="g-hero-stats">
          <div class="g-stat"><span class="g-stat-val">200+</span><span class="g-stat-label">Products</span></div>
          <div class="g-stat"><span class="g-stat-val">50K+</span><span class="g-stat-label">Gamers</span></div>
          <div class="g-stat"><span class="g-stat-val">4.9★</span><span class="g-stat-label">Rating</span></div>
        </div>
      </div>
      <div class="g-hero-visual" style="display:flex;align-items:center;justify-content:center;">
        <div class="g-hero-img-container" style="max-width:460px;">
          <div class="g-hero-glow-ring"></div>
          <img src="{{asset('public/assets/gaming_neon.png')}}" alt="Gaming Gear" class="g-hero-img" />
          <div class="g-corner g-corner-tl"></div>
          <div class="g-corner g-corner-tr"></div>
          <div class="g-corner g-corner-bl"></div>
          <div class="g-corner g-corner-br"></div>
          <div class="g-float-badge g-float-badge-1">
            <div class="g-float-badge-label">Discount</div>
            <div class="g-float-badge-val">Up to 42%</div>
          </div>
          <div class="g-float-badge g-float-badge-2">
            <div class="g-float-badge-label">Free Shipping</div>
            <div class="g-float-badge-val">₹999+</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div style="background:var(--g-dark-2);border-bottom:1px solid var(--g-border);padding:1rem 0;">
    <div class="g-container">
      <div class="g-cat-tabs" id="catTabs">
        <button class="g-cat-tab active" data-cat="all"><i class="ri-apps-line"></i> All</button>
        @foreach($gamecategorieslist as $glist)
       <a href="{{url('gaming-products/'.$glist->id)}}"> <button class="g-cat-tab" data-cat="keyboards"><i class="ri-keyboard-line"></i> {{$glist->category_name}}</button></a>
        @endforeach
      </div>
    </div>
  </div>

  <main id="products">
    <div class="g-container">
      <div class="g-shop-layout">

        <aside class="g-sidebar">

          <div class="g-sidebar-card">
           

          <!-- <div class="g-sidebar-card">
            <div class="g-sidebar-title">// Price Range</div>
            <div class="g-price-range-row"><span>₹0</span><span id="gPriceDisplay">₹25,000</span></div>
            <input type="range" min="0" max="30000" value="25000" step="500" id="gPriceRange" class="g-range" />
            <button class="g-btn g-btn-ghost" style="width:100%;justify-content:center;padding:0.5rem;font-size:0.65rem;" onclick="gShowToast('PRICE FILTER APPLIED')">APPLY FILTER</button>
          </div> -->

          <div class="g-sidebar-card">
            <div class="g-sidebar-title">// Brands</div>
            <div class="g-check-list">
              <label class="g-check"><input type="checkbox" checked /><span>HyperX</span><span class="cnt">2</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Logitech</span><span class="cnt">1</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Razer</span><span class="cnt">1</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Corsair</span><span class="cnt">1</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Microsoft</span><span class="cnt">1</span></label>
              <label class="g-check"><input type="checkbox" /><span>SteelSeries</span><span class="cnt">0</span></label>
              <label class="g-check"><input type="checkbox" /><span>Green Soul</span><span class="cnt">1</span></label>
            </div>
          </div>

        

          <div class="g-sidebar-card">
            <div class="g-sidebar-title">// Stock Status</div>
            <div class="g-check-list">
              <label class="g-check"><input type="checkbox" checked /><span>In Stock</span></label>
              <label class="g-check"><input type="checkbox" /><span>Pre-Order</span></label>
            </div>
          </div>

        </aside>

        <div>
          

          <div class="g-filter-bar">
          
           
            <span class="g-filter-sep"></span>
            <span class="g-results-count" id="gResults">8 UNITS FOUND</span>
            <select class="g-sort" id="gSort">
              <option value="">SORT: RELEVANCE</option>
              <option value="price-asc">PRICE: LOW → HIGH</option>
              <option value="price-desc">PRICE: HIGH → LOW</option>
              <option value="rating">TOP RATED</option>
            </select>
            <div class="g-view-toggle">
              <button class="g-view-btn active" id="gGridBtn" title="Grid"><i class="ri-grid-line"></i></button>
              <button class="g-view-btn" id="gListBtn" title="List"><i class="ri-list-check"></i></button>
            </div>
          </div>

          <div class="g-product-grid" >

            @forelse($gamingItems as $p)

          <article class="g-product-card" data-id="{{$p->id}}">
          <div class="g-card-line"></div>
          <div class="g-card-img-wrap">
           
           
            <img src="{{ asset('public/assets/img/items/'.$p->image) }}" alt="{{$p->name}}" class="g-card-img" loading="lazy" />
         
            <div class="g-card-overlay">
              
             <a href="{{ url('gaming-product-detail/'.$p->slug) }}"> <button class="g-overlay-view" data-id="{{$p->id}}">Quick View </button> </a>
            </div>
          </div>
          <div class="g-card-info">
            <div class="g-card-brand">{{$p->author_name}}</div>
            <div class="g-card-name">{{$p->name}}</div>
          
            <div class="g-card-price-row">
              <div>
                <span class="g-price-main">{{$p->sr}}</span>
                <span class="g-price-original">{{$p->mrp}}</span>
              </div>
              <span class="g-price-save">-${save}%</span>
            </div>
          </div>
        </article>
           @empty
            <div class="pl-empty">
                <div style="font-size:48px;opacity:.2;margin-bottom:12px;">📦</div>
                <div style="font-size:16px;color:#878787;">No products found</div>
            </div>
            @endforelse

          </div>

         
        </div>

      </div>
    </div>
  </main>

  <div class="g-container" style="padding-bottom:4rem;">
    <div class="g-promo">
      <div class="g-promo-content">
        <span class="g-promo-tag">⚡ FLASH SALE — 48 HOURS ONLY</span>
        <h2 class="g-promo-title">GET UP TO <span class="g-promo-accent">40% OFF</span><br/>ON GAMING GEAR</h2>
        <p class="g-promo-text">Premium keyboards, mice, headsets and more. Don't miss it.</p>
        <div class="g-countdown">
          <div class="g-cd-box"><span class="g-cd-val" id="gH">12</span><span class="g-cd-label">HRS</span></div>
          <div class="g-cd-box"><span class="g-cd-val" id="gM">45</span><span class="g-cd-label">MIN</span></div>
          <div class="g-cd-box"><span class="g-cd-val" id="gS">30</span><span class="g-cd-label">SEC</span></div>
        </div>
        <a href="#products" class="g-btn g-btn-hot"><i class="ri-flashlight-fill"></i> GRAB THE DEAL</a>
      </div>
      <div class="g-promo-img">
        <img src="{{asset('public/assets/gaming_hero.png')}}" alt="Gaming Deal" />
      </div>
    </div>
  </div>

  <div class="g-toast" id="gToast"><i class="ri-terminal-box-line"></i><span id="gToastMsg">ITEM ADDED</span></div>
  <div class="modal-overlay" id="gQuickModal" style="position:fixed;inset:0;background:rgba(0,0,0,0.85);backdrop-filter:blur(12px);z-index:9998;display:flex;align-items:center;justify-content:center;padding:1rem;opacity:0;visibility:hidden;transition:all 0.3s;">
    <div id="gModalBox" style="background:#0d0d1f;border:1px solid rgba(0,245,255,0.25);border-radius:0;max-width:780px;width:100%;max-height:90vh;overflow-y:auto;position:relative;clip-path:polygon(0 0,calc(100% - 20px) 0,100% 20px,100% 100%,20px 100%,0 calc(100% - 20px));transform:scale(0.9);transition:transform 0.3s cubic-bezier(0.34,1.56,0.64,1);">
      <button id="gModalClose" style="position:absolute;top:1rem;right:1rem;z-index:10;width:34px;height:34px;background:rgba(255,0,0,0.1);border:1px solid rgba(255,23,68,0.3);clip-path:polygon(4px 0%,100% 0%,calc(100% - 4px) 100%,0% 100%);display:flex;align-items:center;justify-content:center;font-size:1.1rem;color:#ff1744;cursor:pointer;"><i class="ri-close-line"></i></button>
      <div id="gModalInner" style="padding:2rem;"></div>
    </div>
  </div>
  <button class="g-back-top" id="gBackTop"><i class="ri-arrow-up-line"></i></button>
@endsection


