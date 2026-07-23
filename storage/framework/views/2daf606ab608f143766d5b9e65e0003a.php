<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gaming Zone — Pouch Gallery®</title>
  <meta name="description" content="Ultimate gaming peripherals – keyboards, mice, headsets, chairs, monitors and more. Shop Pouch Gallery's Gaming Zone for the best gear at the best prices." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <link rel="icon" type="image/png" href="<?php echo e(asset('public/assets/logo.png')); ?>" />
  <link rel="apple-touch-icon" href="<?php echo e(asset('public/assets/logo.png')); ?>" />

  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo e(asset('public/gaming.css')); ?>" />
  <style>
    /* ── Page Entrance Wipe ── */
    #gEntranceWipe {
      position: fixed;
      inset: 0;
      z-index: 99999;
      pointer-events: none;
      overflow: hidden;
    }
    /* The neon sweep bar */
    #gEntranceWipe::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 100%;
      background: linear-gradient(
        180deg,
        #02020a 0%,
        #02020a calc(var(--wipe-y, 0%) - 3px),
        #00f5ff calc(var(--wipe-y, 0%) - 1px),
        rgba(0,245,255,.5) var(--wipe-y, 0%),
        transparent calc(var(--wipe-y, 0%) + 2px)
      );
      filter: drop-shadow(0 0 8px #00f5ff);
      transition: none;
    }
  </style>

  <style>
    /* Layout */
    .g-container { max-width: 1400px; margin: 0 auto; padding: 0 2rem; }
    .g-shop-layout { display: grid; grid-template-columns: 240px 1fr; gap: 2rem; padding: 2rem 0 5rem; }
    @media (max-width: 900px) { .g-shop-layout { grid-template-columns: 1fr; } }
    .g-sidebar { position: sticky; top: 100px; align-self: start; }
    @media (max-width: 900px) { .g-sidebar { display: none; } }

    /* Pagination */
    .g-pagination { display: flex; justify-content: center; gap: 0.5rem; margin-top: 3rem; }
    .g-page-btn {
      width: 38px; height: 38px;
      background: var(--g-dark-3);
      border: 1px solid var(--g-border);
      color: #556677;
      font-family: var(--g-font);
      font-size: 0.72rem;
      font-weight: 700;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
      transition: all 0.2s;
    }
    .g-page-btn.active, .g-page-btn:hover {
      background: rgba(0,245,255,0.1);
      border-color: var(--g-cyan);
      color: var(--g-cyan);
      box-shadow: var(--g-glow-cyan);
    }

    /* Active filter tags */
    .g-active-filters { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem; }
    .g-active-tag {
      display: flex; align-items: center; gap: 0.4rem;
      font-family: var(--g-font); font-size: 0.62rem; letter-spacing: 0.08em;
      color: var(--g-cyan);
      border: 1px solid var(--g-border-hot);
      padding: 0.25rem 0.7rem;
      clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
      background: rgba(0,245,255,0.05);
    }
    .g-active-tag button { color: #556677; font-size: 1rem; line-height: 1; cursor: pointer; background: none; border: none; transition: color 0.2s; }
    .g-active-tag button:hover { color: var(--g-red); }

    /* Toolbar row */
    .g-toolbar { display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.25rem; }
    .g-toolbar-right { display: flex; align-items: center; gap: 0.75rem; }
  </style>
</head>
<body class="gaming-page">

  <div class="g-announcement" id="gAnnouncement">
    <div class="g-announcement-inner">
      <span class="g-ann-item">🎮 <strong>FREE SHIPPING</strong> on orders above ₹999</span>
      <span class="g-ann-item">⚡ Code: <strong>POUCH10</strong> → 10% off</span>
      <span class="g-ann-item">🏆 <strong>100% AUTHENTIC</strong> Gaming Gear</span>
    </div>
    <button class="g-ann-close" id="gAnnClose"><i class="ri-close-line"></i></button>
  </div>

  <header class="g-header" id="gHeader">
    <div class="g-header-inner g-container">
      <a href="<?php echo e(url('/')); ?>" class="g-logo">
        <img src="<?php echo e(asset('public/assets/logo.png')); ?>" alt="Pouch Gallery" class="g-logo-img" />
        <span class="g-logo-text">POUCH GALLERY<sup>®</sup></span>
      </a>
      <div class="g-search">
        <i class="ri-search-line"></i>
        <input type="text" placeholder="SEARCH GAMING GEAR..." id="gSearchInput" />
        <button class="g-search-btn">SCAN</button>
      </div>
      <div class="g-actions">
        <a href="<?php echo e(url('/')); ?>" class="g-action-btn" title="Back to Store"><i class="ri-store-line"></i></a>
        <a href="#" class="g-action-btn" id="gWishlistBtn"><i class="ri-heart-line"></i><span class="g-badge" id="gWishlistCount">0</span></a>
        <a href="#" class="g-action-btn"><i class="ri-user-line"></i></a>
        <a href="#" class="g-action-btn"><i class="ri-shopping-cart-line"></i><span class="g-badge" id="gCartCount">0</span></a>
        <button class="g-mobile-menu-btn" id="gMenuBtn"><span></span><span></span><span></span></button>
      </div>
    </div>

    <nav class="g-nav" id="gNav">
      <div class="g-nav-inner g-container">
        <a href="<?php echo e(url('/')); ?>" class="g-nav-link home-link"><i class="ri-arrow-left-line"></i> Main Store</a>
        <a href="<?php echo e(url('/gaming-products')); ?>" class="g-nav-link active"><i class="ri-gamepad-line"></i> All Gaming</a>
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

  <section class="g-hero" style="min-height:55vh;">
    <div class="g-hero-grid"></div>
    <img src="<?php echo e(asset('public/assets/gaming_bg.png')); ?>" alt="" class="g-hero-bg-img" aria-hidden="true" />
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
          <img src="<?php echo e(asset('public/assets/gaming_neon.png')); ?>" alt="Gaming Gear" class="g-hero-img" />
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
        <button class="g-cat-tab" data-cat="keyboards"><i class="ri-keyboard-line"></i> Keyboards</button>
        <button class="g-cat-tab" data-cat="mice"><i class="ri-mouse-line"></i> Mice</button>
        <button class="g-cat-tab" data-cat="headsets"><i class="ri-headphone-line"></i> Headsets</button>
        <button class="g-cat-tab" data-cat="chairs"><i class="ri-armchair-line"></i> Chairs</button>
        <button class="g-cat-tab" data-cat="monitors"><i class="ri-computer-line"></i> Monitors</button>
        <button class="g-cat-tab" data-cat="controllers"><i class="ri-gamepad-line"></i> Controllers</button>
        <button class="g-cat-tab" data-cat="mousepads"><i class="ri-layout-grid-line"></i> Mousepads</button>
      </div>
    </div>
  </div>

  <main id="products">
    <div class="g-container">
      <div class="g-shop-layout">

        <aside class="g-sidebar">

          <div class="g-sidebar-card">
            <div class="g-sidebar-title">// Categories</div>
            <div class="g-check-list">
              <label class="g-check"><input type="checkbox" checked /><span>Keyboards</span><span class="cnt">2</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Gaming Mice</span><span class="cnt">2</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Headsets</span><span class="cnt">1</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Chairs</span><span class="cnt">1</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Monitors</span><span class="cnt">1</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Controllers</span><span class="cnt">1</span></label>
              <label class="g-check"><input type="checkbox" checked /><span>Mousepads</span><span class="cnt">1</span></label>
            </div>
          </div>

          <div class="g-sidebar-card">
            <div class="g-sidebar-title">// Price Range</div>
            <div class="g-price-range-row"><span>₹0</span><span id="gPriceDisplay">₹25,000</span></div>
            <input type="range" min="0" max="30000" value="25000" step="500" id="gPriceRange" class="g-range" />
            <button class="g-btn g-btn-ghost" style="width:100%;justify-content:center;padding:0.5rem;font-size:0.65rem;" onclick="gShowToast('PRICE FILTER APPLIED')">APPLY FILTER</button>
          </div>

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
            <div class="g-sidebar-title">// Rating</div>
            <button class="g-rating-btn active"><span class="g-stars">★★★★★</span> 4.5+</button>
            <button class="g-rating-btn"><span class="g-stars">★★★★☆</span> 4.0+</button>
            <button class="g-rating-btn"><span class="g-stars">★★★☆☆</span> 3.0+</button>
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
          <div class="g-active-filters">
            <span class="g-active-tag">GAMING <button>×</button></span>
            <span class="g-active-tag">IN STOCK <button>×</button></span>
          </div>

          <div class="g-filter-bar">
            <span class="g-filter-label">// Filter:</span>
            <div style="display:flex;gap:0.4rem;flex-wrap:wrap;" id="filterBtnGroup">
              <button class="g-cat-tab active" data-cat="all" style="padding:0.35rem 0.75rem;font-size:0.6rem;">ALL</button>
              <button class="g-cat-tab" data-cat="keyboards" style="padding:0.35rem 0.75rem;font-size:0.6rem;">KEYBOARDS</button>
              <button class="g-cat-tab" data-cat="mice" style="padding:0.35rem 0.75rem;font-size:0.6rem;">MICE</button>
              <button class="g-cat-tab" data-cat="headsets" style="padding:0.35rem 0.75rem;font-size:0.6rem;">HEADSETS</button>
              <button class="g-cat-tab" data-cat="chairs" style="padding:0.35rem 0.75rem;font-size:0.6rem;">CHAIRS</button>
              <button class="g-cat-tab" data-cat="monitors" style="padding:0.35rem 0.75rem;font-size:0.6rem;">MONITORS</button>
            </div>
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

          <div class="g-product-grid" id="gProductGrid">
          </div>

          <div class="g-pagination">
            <button class="g-page-btn" disabled><i class="ri-arrow-left-s-line"></i></button>
            <button class="g-page-btn active">01</button>
            <button class="g-page-btn">02</button>
            <button class="g-page-btn">03</button>
            <button class="g-page-btn"><i class="ri-arrow-right-s-line"></i></button>
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
        <img src="<?php echo e(asset('public/assets/gaming_hero.png')); ?>" alt="Gaming Deal" />
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

  <script>
    <?php
      $jsProducts = $gamingItems->map(function($p) {
        $save = ($p->mrp > 0 && $p->mrp > $p->sr) ? round((($p->mrp - $p->sr) / $p->mrp) * 100) : 0;
        return [
          'id' => $p->id,
          'name' => $p->name,
          'brand' => !empty($p->author_name) ? $p->author_name : 'Brandson',
          'category' => 'all', // Map properly if possible, default to 'all'
          'price' => (float)$p->sr,
          'original' => (float)$p->mrp,
          'image' => asset('public/assets/img/items/'.$p->image),
          'rating' => 4.5,
          'reviews' => rand(100, 3000),
          'badge' => $save > 20 ? 'hot' : ($save > 0 ? 'discount' : 'new'),
          'slug' => $p->slug
        ];
      });
    ?>
    const PRODUCTS = <?php echo json_encode($jsProducts); ?>;

    let gCart = JSON.parse(localStorage.getItem('pg_cart') || '[]');
    let gWishlist = JSON.parse(localStorage.getItem('pg_wishlist') || '[]');
    const fmt = n => '₹' + n.toLocaleString('en-IN');
    const disc = (p,o) => Math.round(((o-p)/o)*100);
    const stars = r => { let s=''; for(let i=0;i<5;i++) s+=i<Math.floor(r)?'★':(i===Math.floor(r)&&r%1>=0.5)?'½':'☆'; return s; };

    function gSaveCart() {
      localStorage.setItem('pg_cart', JSON.stringify(gCart));
      document.getElementById('gCartCount').textContent = gCart.reduce((a,i)=>a+i.qty,0);
    }
    function gSaveWishlist() {
      localStorage.setItem('pg_wishlist', JSON.stringify(gWishlist));
      document.getElementById('gWishlistCount').textContent = gWishlist.length;
    }
    function gShowToast(msg) {
      const t = document.getElementById('gToast');
      document.getElementById('gToastMsg').textContent = msg;
      t.classList.add('show');
      setTimeout(()=>t.classList.remove('show'),2500);
    }
    function gAddCart(id) {
      const ex = gCart.find(i=>i.id===id);
      if(ex) ex.qty++; else gCart.push({id,qty:1});
      gSaveCart();
      gShowToast('// ITEM ADDED TO CART');
    }
    function gToggleWishlist(id,btn) {
      const idx = gWishlist.indexOf(id);
      if(idx===-1){
        gWishlist.push(id);
        btn.classList.add('active');
        btn.innerHTML='<i class="ri-heart-fill"></i>';
        gShowToast('// ADDED TO WISHLIST');
      } else {
        gWishlist.splice(idx,1);
        btn.classList.remove('active');
        btn.innerHTML='<i class="ri-heart-line"></i>';
        gShowToast('// REMOVED FROM WISHLIST');
      }
      gSaveWishlist();
    }

    function createGCard(p) {
      const isWished = gWishlist.includes(p.id);
      const save = disc(p.price, p.original);
      const badgeHTML = {
        discount: `<span class="g-badge-pill g-badge-discount">-${save}%</span>`,
        new:      `<span class="g-badge-pill g-badge-new">// NEW</span>`,
        hot:      `<span class="g-badge-pill g-badge-hot">🔥 HOT</span>`,
        bestseller:`<span class="g-badge-pill g-badge-best">★ BEST</span>`,
      }[p.badge] || '';

      return `
        <article class="g-product-card" data-id="${p.id}">
          <div class="g-card-line"></div>
          <div class="g-card-img-wrap">
            <div class="g-card-badges">${badgeHTML}</div>
            <button class="g-wishlist-btn ${isWished?'active':''}" data-id="${p.id}">
              <i class="${isWished?'ri-heart-fill':'ri-heart-line'}"></i>
            </button>
            <img src="${p.image}" alt="${p.name}" class="g-card-img" loading="lazy" />
            <div class="g-card-overlay">
              <button class="g-overlay-cart" data-id="${p.id}"><i class="ri-shopping-cart-line"></i> ADD TO CART</button>
              <button class="g-overlay-view" data-id="${p.id}"><i class="ri-eye-line"></i></button>
            </div>
          </div>
          <div class="g-card-info">
            <div class="g-card-brand">${p.brand}</div>
            <div class="g-card-name">${p.name}</div>
            <div class="g-card-rating">
              <span class="g-stars">${stars(p.rating)}</span>
              <span class="g-rating-count">${p.rating} (${p.reviews.toLocaleString()})</span>
            </div>
            <div class="g-card-price-row">
              <div>
                <span class="g-price-main">${fmt(p.price)}</span>
                <span class="g-price-original">${fmt(p.original)}</span>
              </div>
              <span class="g-price-save">-${save}%</span>
            </div>
          </div>
        </article>`;
    }

    function renderGrid(list) {
      const grid = document.getElementById('gProductGrid');
      grid.innerHTML = list.map(createGCard).join('');
      const cnt = document.getElementById('gResults');
      if(cnt) cnt.textContent = list.length + ' UNITS FOUND';

      // Events
      grid.querySelectorAll('.g-overlay-cart').forEach(b=>b.addEventListener('click',e=>{e.stopPropagation();gAddCart(+b.dataset.id);}));
      grid.querySelectorAll('.g-wishlist-btn').forEach(b=>b.addEventListener('click',e=>{e.stopPropagation();gToggleWishlist(+b.dataset.id,b);}));
      grid.querySelectorAll('.g-overlay-view').forEach(b=>b.addEventListener('click',e=>{e.stopPropagation();openModal(+b.dataset.id);}));
      grid.querySelectorAll('.g-product-card').forEach(c=>{
        c.addEventListener('click',()=>{ window.location.href='<?php echo e(url("gaming-product")); ?>/'+c.dataset.id; });
      });
    }

    function filterAndRender(cat) {
      let list = cat&&cat!=='all' ? PRODUCTS.filter(p=>p.category===cat) : [...PRODUCTS];
      const sort = document.getElementById('gSort')?.value;
      if(sort==='price-asc') list.sort((a,b)=>a.price-b.price);
      if(sort==='price-desc') list.sort((a,b)=>b.price-a.price);
      if(sort==='rating') list.sort((a,b)=>b.rating-a.rating);
      renderGrid(list);
    }

    function openModal(id) {
      const p = PRODUCTS.find(x=>x.id===id);
      if(!p) return;
      const modal = document.getElementById('gQuickModal');
      const box = document.getElementById('gModalBox');
      document.getElementById('gModalInner').innerHTML = `
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
          <div style="background:var(--g-dark-2);border:1px solid var(--g-border);display:flex;align-items:center;justify-content:center;aspect-ratio:1;clip-path:polygon(0 0,calc(100%-12px) 0,100% 12px,100% 100%,12px 100%,0 calc(100%-12px));">
            <img src="${p.image}" alt="${p.name}" style="width:78%;object-fit:contain;filter:drop-shadow(0 0 20px rgba(0,245,255,0.3));" />
          </div>
          <div style="padding:0.5rem 0;">
            <div class="g-card-brand" style="margin-bottom:0.4rem;">${p.brand}</div>
            <div style="font-family:var(--g-font);font-size:1rem;font-weight:800;text-transform:uppercase;color:#e0e8ff;margin-bottom:0.75rem;line-height:1.3;">${p.name}</div>
            <div class="g-card-rating" style="margin-bottom:1rem;"><span class="g-stars">${stars(p.rating)}</span><span class="g-rating-count">${p.rating} (${p.reviews.toLocaleString()})</span></div>
            <div class="g-price-main" style="font-size:1.6rem;">${fmt(p.price)}</div>
            <div style="display:flex;gap:0.5rem;align-items:center;margin-bottom:1.25rem;">
              <span class="g-price-original">${fmt(p.original)}</span>
              <span class="g-price-save-tag">-${disc(p.price,p.original)}%</span>
            </div>
            <div style="display:flex;gap:0.6rem;flex-wrap:wrap;">
              <button class="g-btn g-btn-primary" onclick="gAddCart(${p.id});gShowToast('// ITEM ADDED');" style="flex:1;justify-content:center;"><i class="ri-shopping-cart-line"></i> ADD TO CART</button>
              <a href="gaming-product-detail.html?id=${p.id}" class="g-btn g-btn-ghost">DETAILS</a>
            </div>
          </div>
        </div>`;
      modal.style.opacity='1';modal.style.visibility='visible';
      box.style.transform='scale(1)';
    }

    // Countdown
    function initCountdown() {
      const end = Date.now() + 12*3600000 + 45*60000 + 30000;
      function tick(){
        const d=Math.max(0,end-Date.now());
        document.getElementById('gH').textContent=String(Math.floor(d/3600000)).padStart(2,'0');
        document.getElementById('gM').textContent=String(Math.floor((d%3600000)/60000)).padStart(2,'0');
        document.getElementById('gS').textContent=String(Math.floor((d%60000)/1000)).padStart(2,'0');
      }
      tick(); setInterval(tick,1000);
    }

    // Filter tabs
    let activeCat = 'all';
    function initTabs() {
      document.querySelectorAll('[data-cat]').forEach(btn => {
        btn.addEventListener('click', () => {
          activeCat = btn.dataset.cat;
          document.querySelectorAll('[data-cat]').forEach(b=>b.classList.remove('active'));
          document.querySelectorAll(`[data-cat="${activeCat}"]`).forEach(b=>b.classList.add('active'));
          filterAndRender(activeCat);
        });
      });
    }

    // Sort
    document.addEventListener('DOMContentLoaded', () => {
      document.getElementById('gSort')?.addEventListener('change', ()=>filterAndRender(activeCat));
      document.getElementById('gGridBtn')?.addEventListener('click',()=>{
        document.getElementById('gProductGrid').style.gridTemplateColumns='repeat(3,1fr)';
        document.getElementById('gGridBtn').classList.add('active');
        document.getElementById('gListBtn').classList.remove('active');
      });
      document.getElementById('gListBtn')?.addEventListener('click',()=>{
        document.getElementById('gProductGrid').style.gridTemplateColumns='1fr';
        document.getElementById('gListBtn').classList.add('active');
        document.getElementById('gGridBtn').classList.remove('active');
      });

      // Modal close
      document.getElementById('gModalClose').addEventListener('click',()=>{
        const m=document.getElementById('gQuickModal');
        m.style.opacity='0'; m.style.visibility='hidden';
        document.getElementById('gModalBox').style.transform='scale(0.9)';
      });
      document.getElementById('gQuickModal').addEventListener('click',e=>{
        if(e.target===document.getElementById('gQuickModal')){
          e.target.style.opacity='0'; e.target.style.visibility='hidden';
          document.getElementById('gModalBox').style.transform='scale(0.9)';
        }
      });

      // Rating btns
      document.querySelectorAll('.g-rating-btn').forEach(b=>b.addEventListener('click',()=>{
        document.querySelectorAll('.g-rating-btn').forEach(x=>x.classList.remove('active'));
        b.classList.add('active');
      }));

      // Pagination
      document.querySelectorAll('.g-page-btn').forEach(b=>b.addEventListener('click',()=>{
        if(b.disabled) return;
        document.querySelectorAll('.g-page-btn').forEach(x=>x.classList.remove('active'));
        b.classList.add('active');
        window.scrollTo({top:0,behavior:'smooth'});
      }));

      // Price range
      const pr = document.getElementById('gPriceRange');
      const pd = document.getElementById('gPriceDisplay');
      pr?.addEventListener('input',()=>{ pd.textContent='₹'+parseInt(pr.value).toLocaleString('en-IN'); });

      // Announcement close
      document.getElementById('gAnnClose')?.addEventListener('click',()=>{ document.getElementById('gAnnouncement').style.display='none'; });

      // Mobile menu
      const menuBtn = document.getElementById('gMenuBtn');
      const nav = document.getElementById('gNav');
      menuBtn?.addEventListener('click',()=>{ menuBtn.classList.toggle('active'); nav.classList.toggle('open'); });

      // Back top
      const backTop = document.getElementById('gBackTop');
      window.addEventListener('scroll',()=>{ backTop?.classList.toggle('visible',window.scrollY>200); },{passive:true});
      backTop?.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));

      // Init badges
      document.getElementById('gCartCount').textContent = gCart.reduce((a,i)=>a+i.qty,0);
      document.getElementById('gWishlistCount').textContent = gWishlist.length;

      initCountdown();
      initTabs();
      filterAndRender('all');

      // Check URL params
      const params = new URLSearchParams(window.location.search);
      const urlCat = params.get('cat');
      if(urlCat) {
        activeCat = urlCat;
        document.querySelectorAll(`[data-cat="${urlCat}"]`).forEach(b=>b.classList.add('active'));
        document.querySelectorAll('[data-cat]:not([data-cat="' + urlCat + '"])').forEach(b=>b.classList.remove('active'));
        filterAndRender(urlCat);
      }
    });
  </script>

  <div id="gEntranceWipe"></div>

  <script>
    /* ── Entrance wipe animation ── */
    (function () {
      const wipe = document.getElementById('gEntranceWipe');
      if (!wipe) return;

      let pct = 0;
      let startTime = null;
      const DURATION = 520; // ms for sweep down

      function animateSweep(ts) {
        if (!startTime) startTime = ts;
        const elapsed = ts - startTime;
        pct = Math.min(100, (elapsed / DURATION) * 100);
        wipe.style.setProperty('--wipe-y', pct + '%');

        if (pct < 100) {
          requestAnimationFrame(animateSweep);
        } else {
          // Sweep done → fade out the whole overlay
          wipe.style.transition = 'opacity .35s ease';
          wipe.style.opacity = '0';
          setTimeout(() => { wipe.style.display = 'none'; }, 380);
        }
      }

      // Small delay so the browser paints the page first
      setTimeout(() => requestAnimationFrame(animateSweep), 80);
    })();
  </script>

  <!-- Custom Box Pointer Cursor -->
  <div class="g-cursor" id="gCursor"></div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if(window.innerWidth < 768) return; // Disable on mobile
      const cursor = document.getElementById('gCursor');
      document.addEventListener('mousemove', e => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
      });
      // Add hover effect dynamically including for future elements
      document.body.addEventListener('mouseover', e => {
        if(e.target.closest('a, button, input, select, .g-product-card, .g-cat-card')) {
          cursor.classList.add('hover');
        } else {
          cursor.classList.remove('hover');
        }
      });
    });
  </script>
</body>
</html>



<?php /**PATH C:\xampp\htdocs\ebook\resources\views/web/gaming-products.blade.php ENDPATH**/ ?>