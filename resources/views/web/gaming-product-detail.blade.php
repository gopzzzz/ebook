<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gaming Product — Pouch Gallery®</title>
  <meta name="description" content="Buy premium gaming peripherals at Pouch Gallery® — authentic products, fast shipping, and best prices." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <link rel="icon" type="image/png" href="{{asset('public/assets/logo.png')}}" />
  <link rel="apple-touch-icon" href="{{asset('public/assets/logo.png')}}" />

  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('public/gaming.css')}}" />
  <style>
    /* ── Page Entrance Wipe ── */
    #gEntranceWipe {
      position: fixed;
      inset: 0;
      z-index: 99999;
      pointer-events: none;
      overflow: hidden;
    }
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
    }
  </style>
  <style>
    .g-container { max-width: 1400px; margin: 0 auto; padding: 0 2rem; }

    /* Breadcrumb */
    .g-breadcrumb {
      background: var(--g-dark-2);
      border-bottom: 1px solid var(--g-border);
      padding: 0.75rem 0;
    }
    .g-breadcrumb-inner {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-family: var(--g-font);
      font-size: 0.65rem;
      letter-spacing: 0.08em;
      color: #445566;
    }
    .g-breadcrumb-inner a { color: #445566; text-decoration: none; transition: color 0.2s; }
    .g-breadcrumb-inner a:hover { color: var(--g-cyan); }
    .g-breadcrumb-inner i { font-size: 0.7rem; }
    .g-breadcrumb-inner span { color: var(--g-cyan); }

    /* Coupon */
    .g-coupon {
      background: rgba(0,255,136,0.04);
      border: 1px dashed rgba(0,255,136,0.25);
      padding: 0.875rem 1rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 1.25rem;
      font-family: var(--g-font-body);
      font-size: 0.85rem;
      color: #667788;
      clip-path: polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 8px 100%, 0 calc(100% - 8px));
    }
    .g-coupon i { color: var(--g-green); font-size: 1.2rem; flex-shrink: 0; }
    .g-coupon-code {
      margin-left: auto;
      font-family: var(--g-font);
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      color: var(--g-green);
      border: 1px solid rgba(0,255,136,0.3);
      padding: 0.25rem 0.75rem;
      clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
      background: rgba(0,255,136,0.06);
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.35rem;
      transition: background 0.2s;
    }
    .g-coupon-code:hover { background: rgba(0,255,136,0.12); }

    /* Pincode */
    .g-pincode {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      background: var(--g-dark-3);
      border: 1px solid var(--g-border);
      padding: 0.75rem 1rem;
      margin-bottom: 1.5rem;
      clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 6px 100%, 0 calc(100% - 6px));
    }
    .g-pincode i { color: var(--g-cyan); opacity: 0.7; }
    .g-pincode input {
      flex: 1;
      background: none;
      border: none;
      outline: none;
      color: #e0e8ff;
      font-family: var(--g-font);
      font-size: 0.75rem;
      letter-spacing: 0.1em;
    }
    .g-pincode input::placeholder { color: #334455; }
    .g-pincode button {
      font-family: var(--g-font);
      font-size: 0.6rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      color: var(--g-cyan);
      border: 1px solid var(--g-border-hot);
      padding: 0.3rem 0.7rem;
      background: rgba(0,245,255,0.06);
      cursor: pointer;
      clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
      transition: background 0.2s;
    }
    .g-pincode button:hover { background: rgba(0,245,255,0.15); }

    /* Share */
    .g-share { display: flex; align-items: center; gap: 0.6rem; padding-top: 1.25rem; border-top: 1px solid var(--g-border); }
    .g-share-label { font-family: var(--g-font); font-size: 0.62rem; letter-spacing: 0.12em; color: #445566; }
    .g-share-btn {
      width: 32px; height: 32px;
      background: var(--g-dark-3);
      border: 1px solid var(--g-border);
      display: flex; align-items: center; justify-content: center;
      color: #445566;
      font-size: 0.95rem;
      cursor: pointer;
      clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
      transition: all 0.2s;
    }
    .g-share-btn:hover { border-color: var(--g-cyan); color: var(--g-cyan); background: rgba(0,245,255,0.06); }

    /* Rating overview box */
    .g-rating-overview {
      display: grid;
      grid-template-columns: 160px 1fr;
      gap: 2rem;
      align-items: center;
      margin-bottom: 2rem;
    }
    .g-rating-big {
      background: var(--g-dark-3);
      border: 1px solid var(--g-border);
      padding: 1.5rem;
      text-align: center;
      clip-path: polygon(0 0, calc(100%-10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100%-10px));
    }
    .g-rating-number {
      font-family: var(--g-font);
      font-size: 3rem;
      font-weight: 900;
      background: var(--g-grad-main);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .g-rating-stars-big { color: var(--g-yellow); font-size: 1.1rem; }
    .g-rating-total { font-family: var(--g-font); font-size: 0.6rem; color: #445566; letter-spacing: 0.1em; }
    .g-bar-row { display: flex; align-items: center; gap: 0.75rem; font-family: var(--g-font); font-size: 0.6rem; margin-bottom: 0.4rem; }
    .g-bar-row span:first-child { width: 36px; text-align: right; color: var(--g-cyan); opacity: 0.7; }
    .g-bar-track { flex: 1; height: 4px; background: rgba(255,255,255,0.04); border-radius: 0; overflow: hidden; }
    .g-bar-fill { height: 100%; background: linear-gradient(90deg, var(--g-cyan), var(--g-purple)); }
    .g-bar-row span:last-child { width: 28px; color: #445566; }

    /* Related section */
    .g-related { background: var(--g-dark-2); border-top: 1px solid var(--g-border); padding: 4rem 0; }
  </style>
</head>
<body class="gaming-page">

  <div class="g-announcement" id="gAnnouncement">
    <div class="g-announcement-inner">
      <span class="g-ann-item">🎮 <strong>FREE SHIPPING</strong> orders above ₹999</span>
      <span class="g-ann-item">⚡ Code <strong>POUCH10</strong> → 10% off</span>
      <span class="g-ann-item">🏆 <strong>2-YEAR WARRANTY</strong> on all gaming gear</span>
    </div>
    <button class="g-ann-close" id="gAnnClose"><i class="ri-close-line"></i></button>
  </div>

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
        <a href="{{url('/')}}" class="g-action-btn" title="Main Store"><i class="ri-store-line"></i></a>
        <a href="#" class="g-action-btn"><i class="ri-heart-line"></i><span class="g-badge" id="gWishlistCount">0</span></a>
        <a href="#" class="g-action-btn"><i class="ri-user-line"></i></a>
        <a href="#" class="g-action-btn"><i class="ri-shopping-cart-line"></i><span class="g-badge" id="gCartCount">0</span></a>
        <button class="g-mobile-menu-btn" id="gMenuBtn"><span></span><span></span><span></span></button>
      </div>
    </div>
    <nav class="g-nav" id="gNav">
      <div class="g-nav-inner g-container">
        <a href="{{url('/')}}" class="g-nav-link home-link"><i class="ri-arrow-left-line"></i> Main Store</a>
        <a href="{{url('/gaming-products')}}" class="g-nav-link active"><i class="ri-gamepad-line"></i> Gaming Zone</a>
        <a href="gaming-products.html?cat=keyboards" class="g-nav-link">⌨ Keyboards</a>
        <a href="gaming-products.html?cat=mice" class="g-nav-link">🖱 Mice</a>
        <a href="gaming-products.html?cat=headsets" class="g-nav-link">🎧 Headsets</a>
        <a href="gaming-products.html?cat=chairs" class="g-nav-link">🪑 Chairs</a>
        <a href="gaming-products.html?cat=monitors" class="g-nav-link">🖥 Monitors</a>
        <a href="gaming-products.html?cat=controllers" class="g-nav-link">🎮 Controllers</a>
      </div>
    </nav>
  </header>

  <div class="g-breadcrumb">
    <div class="g-container">
      <nav class="g-breadcrumb-inner">
        <a href="{{url('/')}}">HOME</a>
        <i class="ri-arrow-right-s-line"></i>
        <a href="{{url('/gaming-products')}}">GAMING</a>
        <i class="ri-arrow-right-s-line"></i>
        <span id="gBreadcrumb">PRODUCT</span>
      </nav>
    </div>
  </div>

  <main>
    <div class="g-container">
      <div class="g-detail-grid">

        <div class="g-gallery">
          <div class="g-main-img" id="gMainImgBox">
            <div class="g-corner gc-tl" style="position:absolute;top:0;left:0;width:20px;height:20px;border-top:2px solid var(--g-cyan);border-left:2px solid var(--g-cyan);"></div>
            <div class="g-corner gc-tr" style="position:absolute;top:0;right:0;width:20px;height:20px;border-top:2px solid var(--g-cyan);border-right:2px solid var(--g-cyan);"></div>
            <div class="g-corner gc-bl" style="position:absolute;bottom:0;left:0;width:20px;height:20px;border-bottom:2px solid var(--g-cyan);border-left:2px solid var(--g-cyan);"></div>
            <div class="g-corner gc-br" style="position:absolute;bottom:0;right:0;width:20px;height:20px;border-bottom:2px solid var(--g-cyan);border-right:2px solid var(--g-cyan);"></div>
            <img src="{{asset('public/assets/keyboard.png')}}" alt="Product" id="gMainImg" />
          </div>
          <div class="g-thumb-row">
            <button class="g-thumb-btn active"><img src="{{asset('public/assets/keyboard.png')}}" alt="View 1" /></button>
            <button class="g-thumb-btn"><img src="{{asset('public/assets/mouse.png')}}" alt="View 2" /></button>
            <button class="g-thumb-btn"><img src="{{asset('public/assets/headset.png')}}" alt="View 3" /></button>
            <button class="g-thumb-btn"><img src="{{asset('public/assets/mousepad.png')}}" alt="View 4" /></button>
          </div>
        </div>

        <div class="g-detail-info">

          <div style="display:flex;gap:0.5rem;margin-bottom:0.875rem;flex-wrap:wrap;">
            <span class="g-badge-pill g-badge-hot">🔥 BEST SELLER</span>
            <span class="g-badge-pill g-badge-new">// NEW 2026</span>
          </div>

          <div class="g-detail-eyebrow" id="gDetailBrand">HYPERX</div>
          <h1 class="g-detail-title" id="gDetailTitle">HyperX Alloy Origins RGB Mechanical Keyboard</h1>

          <div class="g-detail-rating">
            <span class="g-stars" id="gDetailStars">★★★★★</span>
            <span id="gDetailReviews">4.8 · 1,243 reviews</span>
            <span style="font-family:var(--g-font);font-size:0.6rem;color:var(--g-green);letter-spacing:0.08em;">✓ VERIFIED SELLER</span>
          </div>

          <div class="g-price-box">
            <span class="g-price-main" id="gDetailPrice">₹3,499</span>
            <div class="g-price-row" style="margin-bottom:0.5rem;">
              <span class="g-price-orig" id="gDetailOriginal">₹5,999</span>
              <span class="g-price-save-tag" id="gDetailSave">SAVE 42%</span>
            </div>
            <div class="g-emi">EMI from <strong>₹583/month</strong> · 0% interest · <a href="#" style="color:var(--g-cyan);font-family:var(--g-font);font-size:0.65rem;">SEE OFFERS</a></div>
          </div>

          <div class="g-stock">
            <div class="g-stock-dot"></div>
            <span class="g-stock-text">IN STOCK</span>
            <span class="g-stock-low">— ONLY 7 UNITS LEFT</span>
          </div>

          <div class="g-coupon">
            <i class="ri-coupon-3-line"></i>
            <div>
              <div style="color:#c0ccee;font-weight:600;font-size:0.875rem;">Exclusive Discount</div>
              <div style="font-size:0.78rem;">Apply coupon for extra 10% off</div>
            </div>
            <div class="g-coupon-code" id="gCouponCode" onclick="copyCoupon(this)">
              <i class="ri-file-copy-line"></i> POUCH10
            </div>
          </div>

          <div>
            <div class="g-var-label">COLOR: <span id="gColorVal">BLACK</span></div>
            <div class="g-var-row">
              <button class="g-var-btn active" onclick="setGColor(this,'BLACK')">⬛ BLACK</button>
              <button class="g-var-btn" onclick="setGColor(this,'WHITE')">⬜ WHITE</button>
              <button class="g-var-btn" onclick="setGColor(this,'RED')">🔴 RED</button>
            </div>
          </div>

          <div>
            <div class="g-var-label">SWITCH TYPE:</div>
            <div class="g-var-row">
              <button class="g-var-btn active">RED // LINEAR</button>
              <button class="g-var-btn">AQUA // TACTILE</button>
              <button class="g-var-btn">BLUE // CLICKY</button>
            </div>
          </div>

          <div class="g-qty-row">
            <span class="g-qty-label">QTY:</span>
            <div class="g-qty-ctrl">
              <button class="g-qty-btn" id="gQtyMinus"><i class="ri-subtract-line"></i></button>
              <span class="g-qty-val" id="gQtyVal">1</span>
              <button class="g-qty-btn" id="gQtyPlus"><i class="ri-add-line"></i></button>
            </div>
          </div>

          <div class="g-detail-cta">
            <button class="g-btn g-btn-primary" id="gAddCart" style="flex:1;justify-content:center;">
              <i class="ri-shopping-cart-line"></i> ADD TO CART
            </button>
            <button class="g-btn g-btn-hot" style="flex:1;justify-content:center;">
              <i class="ri-flashlight-fill"></i> BUY NOW
            </button>
            <button class="g-btn g-btn-ghost" id="gWishBtn" style="padding:0.875rem 1rem;">
              <i class="ri-heart-line"></i>
            </button>
          </div>

          <div class="g-pincode">
            <i class="ri-map-pin-line"></i>
            <input type="text" placeholder="ENTER PINCODE TO CHECK DELIVERY..." maxlength="6" id="gPincodeInput" />
            <button onclick="checkGPincode()">CHECK</button>
          </div>

          <div class="g-features" style="margin-bottom:1.5rem;">
            <div class="g-var-label" style="margin-bottom:0.75rem;">// KEY FEATURES:</div>
            <ul>
              <li><i class="ri-check-double-line"></i> HyperX Red Mechanical Switches</li>
              <li><i class="ri-check-double-line"></i> Per-key RGB — 16.8M color combinations</li>
              <li><i class="ri-check-double-line"></i> 100% Anti-ghosting, full N-Key rollover</li>
              <li><i class="ri-check-double-line"></i> Aircraft-grade aluminum body</li>
              <li><i class="ri-check-double-line"></i> Detachable USB-C cable (1.8m)</li>
              <li><i class="ri-check-double-line"></i> HyperX NGENUITY software support</li>
            </ul>
          </div>

          <div class="g-trust-mini">
            <div class="g-trust-badge cyan"><i class="ri-truck-line"></i> FREE DELIVERY</div>
            <div class="g-trust-badge green"><i class="ri-exchange-line"></i> 7-DAY RETURNS</div>
            <div class="g-trust-badge yellow"><i class="ri-shield-check-line"></i> 2-YR WARRANTY</div>
            <div class="g-trust-badge purple"><i class="ri-secure-payment-line"></i> SECURE PAY</div>
          </div>

          <div class="g-share">
            <span class="g-share-label">SHARE:</span>
            <button class="g-share-btn"><i class="ri-whatsapp-line"></i></button>
            <button class="g-share-btn"><i class="ri-facebook-line"></i></button>
            <button class="g-share-btn"><i class="ri-twitter-x-line"></i></button>
            <button class="g-share-btn" onclick="navigator.clipboard.writeText(window.location.href).then(()=>gShowToast('// LINK COPIED'))"><i class="ri-link"></i></button>
          </div>
        </div>
      </div>

      <div class="g-tabs">
        <div class="g-tab-nav">
          <button class="g-tab-btn active" data-tab="description">// DESCRIPTION</button>
          <button class="g-tab-btn" data-tab="specs">// SPECS</button>
          <button class="g-tab-btn" data-tab="reviews">// REVIEWS (1,243)</button>
          <button class="g-tab-btn" data-tab="warranty">// WARRANTY</button>
        </div>

        <div class="g-tab-panel active" id="g-tab-description">
          <div style="max-width:780px;">
            <div class="g-section-eyebrow" style="margin-bottom:0.75rem;">PRODUCT OVERVIEW</div>
            <h3 style="font-family:var(--g-font);font-size:1rem;font-weight:700;text-transform:uppercase;color:#e0e8ff;margin-bottom:1rem;letter-spacing:0.04em;">About the HyperX Alloy Origins RGB</h3>
            <p style="color:#667788;line-height:1.8;margin-bottom:1rem;font-family:var(--g-font-body);">
              The HyperX Alloy Origins is a compact gaming keyboard with a full-size layout and a solid aircraft-grade aluminum body. This powerful performer is ready to take your game to the next level with ultra-reliable HyperX mechanical switches, dynamic dual-function keys, and HyperX NGENUITY software.
            </p>
            <p style="color:#667788;line-height:1.8;margin-bottom:2rem;font-family:var(--g-font-body);">
              Experience per-key RGB lighting with stunning visual effects, 100% anti-ghosting with full N-key rollover for superior accuracy in even the most demanding game sessions.
            </p>
            <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:1rem;">
              <div style="background:var(--g-dark-3);border:1px solid var(--g-border);padding:1.25rem;clip-path:polygon(0 0,calc(100%-8px) 0,100% 8px,100% 100%,8px 100%,0 calc(100%-8px));position:relative;">
                <div style="position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,var(--g-cyan),transparent);"></div>
                <div style="font-size:1.5rem;margin-bottom:0.5rem;">⚡</div>
                <div style="font-family:var(--g-font);font-size:0.78rem;font-weight:700;color:#e0e8ff;margin-bottom:0.3rem;">ULTRA-FAST RESPONSE</div>
                <p style="font-size:0.8rem;color:#556677;font-family:var(--g-font-body);">1ms polling rate for instant actuation and zero input lag</p>
              </div>
              <div style="background:var(--g-dark-3);border:1px solid var(--g-border);padding:1.25rem;clip-path:polygon(0 0,calc(100%-8px) 0,100% 8px,100% 100%,8px 100%,0 calc(100%-8px));position:relative;">
                <div style="position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,var(--g-purple),transparent);"></div>
                <div style="font-size:1.5rem;margin-bottom:0.5rem;">🎨</div>
                <div style="font-family:var(--g-font);font-size:0.78rem;font-weight:700;color:#e0e8ff;margin-bottom:0.3rem;">PER-KEY RGB</div>
                <p style="font-size:0.8rem;color:#556677;font-family:var(--g-font-body);">16.8M color combinations with reactive and dynamic effects</p>
              </div>
              <div style="background:var(--g-dark-3);border:1px solid var(--g-border);padding:1.25rem;clip-path:polygon(0 0,calc(100%-8px) 0,100% 8px,100% 100%,8px 100%,0 calc(100%-8px));position:relative;">
                <div style="position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,var(--g-green),transparent);"></div>
                <div style="font-size:1.5rem;margin-bottom:0.5rem;">🛡️</div>
                <div style="font-family:var(--g-font);font-size:0.78rem;font-weight:700;color:#e0e8ff;margin-bottom:0.3rem;">BUILT TO LAST</div>
                <p style="font-size:0.8rem;color:#556677;font-family:var(--g-font-body);">80 million keystroke lifespan on HyperX mechanical switches</p>
              </div>
              <div style="background:var(--g-dark-3);border:1px solid var(--g-border);padding:1.25rem;clip-path:polygon(0 0,calc(100%-8px) 0,100% 8px,100% 100%,8px 100%,0 calc(100%-8px));position:relative;">
                <div style="position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,var(--g-orange),transparent);"></div>
                <div style="font-size:1.5rem;margin-bottom:0.5rem;">💾</div>
                <div style="font-family:var(--g-font);font-size:0.78rem;font-weight:700;color:#e0e8ff;margin-bottom:0.3rem;">ONBOARD MEMORY</div>
                <p style="font-size:0.8rem;color:#556677;font-family:var(--g-font-body);">3 onboard profiles to store configurations anywhere</p>
              </div>
            </div>
          </div>
        </div>

        <div class="g-tab-panel" id="g-tab-specs">
          <table class="g-spec-table">
            <tr><td>Switch Type</td><td>HyperX Red / Aqua / Blue</td></tr>
            <tr><td>Form Factor</td><td>Full-size 100%</td></tr>
            <tr><td>Anti-Ghosting</td><td>100% N-Key Rollover</td></tr>
            <tr><td>Backlight</td><td>Per-key RGB (16.8M colors)</td></tr>
            <tr><td>Polling Rate</td><td>1000 Hz (1ms response)</td></tr>
            <tr><td>Actuation Force</td><td>45g (Red/Aqua) · 50g (Blue)</td></tr>
            <tr><td>Actuation Point</td><td>1.8mm (Red/Aqua) · 2.1mm (Blue)</td></tr>
            <tr><td>Total Travel</td><td>4.0mm</td></tr>
            <tr><td>Lifespan</td><td>80 million keystrokes</td></tr>
            <tr><td>Connectivity</td><td>Detachable USB-C → USB-A (1.8m)</td></tr>
            <tr><td>Onboard Memory</td><td>3 profiles</td></tr>
            <tr><td>Dimensions</td><td>443.5 × 132 × 34.9 mm</td></tr>
            <tr><td>Weight</td><td>1053g</td></tr>
            <tr><td>OS Compatibility</td><td>Windows 10/11, macOS</td></tr>
            <tr><td>Software</td><td>HyperX NGENUITY</td></tr>
            <tr><td>Warranty</td><td>2 Years</td></tr>
          </table>
        </div>

        <div class="g-tab-panel" id="g-tab-reviews">
          <div class="g-rating-overview">
            <div class="g-rating-big">
              <div class="g-rating-number">4.8</div>
              <div class="g-rating-stars-big">★★★★★</div>
              <div class="g-rating-total">1,243 REVIEWS</div>
            </div>
            <div>
              <div class="g-bar-row"><span>5 ★</span><div class="g-bar-track"><div class="g-bar-fill" style="width:78%"></div></div><span>78%</span></div>
              <div class="g-bar-row"><span>4 ★</span><div class="g-bar-track"><div class="g-bar-fill" style="width:15%"></div></div><span>15%</span></div>
              <div class="g-bar-row"><span>3 ★</span><div class="g-bar-track"><div class="g-bar-fill" style="width:4%"></div></div><span>4%</span></div>
              <div class="g-bar-row"><span>2 ★</span><div class="g-bar-track"><div class="g-bar-fill" style="width:2%"></div></div><span>2%</span></div>
              <div class="g-bar-row"><span>1 ★</span><div class="g-bar-track"><div class="g-bar-fill" style="width:1%"></div></div><span>1%</span></div>
            </div>
          </div>

          <div class="g-review-item">
            <div class="g-review-hd">
              <div class="g-review-av">A</div>
              <div class="g-review-meta"><strong>ARJUN MENON</strong><span>Black / HyperX Red · Jul 2026</span></div>
              <div class="g-review-stars">★★★★★</div>
            </div>
            <p class="g-review-text">"Absolutely incredible keyboard. The aluminum body feels premium, the HyperX Red switches are buttery smooth, and the RGB is stunning. A game-changer from my old membrane keyboard. Worth every rupee!"</p>
            <span class="g-verified"><i class="ri-check-double-line"></i> VERIFIED PURCHASE</span>
          </div>

          <div class="g-review-item">
            <div class="g-review-hd">
              <div class="g-review-av">P</div>
              <div class="g-review-meta"><strong>PRIYA SHARMA</strong><span>White / HyperX Aqua · Jun 2026</span></div>
              <div class="g-review-stars">★★★★★</div>
            </div>
            <p class="g-review-text">"Perfect for both gaming and work. Tactile Aqua switches are satisfying without being loud. Fast shipping from Pouch Gallery and well packaged. NGENUITY software is very easy to use."</p>
            <span class="g-verified"><i class="ri-check-double-line"></i> VERIFIED PURCHASE</span>
          </div>

          <div class="g-review-item">
            <div class="g-review-hd">
              <div class="g-review-av">R</div>
              <div class="g-review-meta"><strong>RAHUL KUMAR</strong><span>Black / HyperX Blue · May 2026</span></div>
              <div class="g-review-stars">★★★★☆</div>
            </div>
            <p class="g-review-text">"Great keyboard. Clicky Blue switches take getting used to but feel amazing. Build quality is solid and the RGB gorgeous. Minus one star — the cable isn't braided. Minor gripe for an otherwise excellent product."</p>
            <span class="g-verified"><i class="ri-check-double-line"></i> VERIFIED PURCHASE</span>
          </div>
          <button class="g-btn g-btn-ghost" style="margin-top:1rem;">LOAD MORE <i class="ri-arrow-down-line"></i></button>
        </div>

        <div class="g-tab-panel" id="g-tab-warranty">
          <div style="max-width:640px;">
            <div style="background:rgba(0,255,136,0.04);border:1px solid rgba(0,255,136,0.2);padding:1.5rem;clip-path:polygon(0 0,calc(100%-10px) 0,100% 10px,100% 100%,10px 100%,0 calc(100%-10px));margin-bottom:1.5rem;position:relative;">
              <div style="position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,var(--g-green),transparent);"></div>
              <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
                <i class="ri-shield-check-line" style="font-size:1.4rem;color:var(--g-green);"></i>
                <span style="font-family:var(--g-font);font-size:0.8rem;font-weight:700;letter-spacing:0.06em;color:#e0e8ff;">2-YEAR MANUFACTURER WARRANTY</span>
              </div>
              <p style="font-family:var(--g-font-body);font-size:0.875rem;color:#667788;line-height:1.7;">HyperX provides a 2-year warranty covering manufacturing defects and hardware failures under normal use.</p>
            </div>
            <div style="font-family:var(--g-font);font-size:0.68rem;letter-spacing:0.1em;color:var(--g-green);margin-bottom:0.75rem;">// COVERAGE INCLUDES:</div>
            <ul style="display:flex;flex-direction:column;gap:0.5rem;margin-bottom:1.5rem;">
              <li style="display:flex;gap:0.6rem;font-family:var(--g-font-body);font-size:0.875rem;color:#667788;"><i class="ri-check-line" style="color:var(--g-green);flex-shrink:0;"></i>Manufacturing defects in materials and workmanship</li>
              <li style="display:flex;gap:0.6rem;font-family:var(--g-font-body);font-size:0.875rem;color:#667788;"><i class="ri-check-line" style="color:var(--g-green);flex-shrink:0;"></i>Switch failure under normal use conditions</li>
              <li style="display:flex;gap:0.6rem;font-family:var(--g-font-body);font-size:0.875rem;color:#667788;"><i class="ri-check-line" style="color:var(--g-green);flex-shrink:0;"></i>RGB LED failure and connectivity issues</li>
            </ul>
            <div style="font-family:var(--g-font);font-size:0.68rem;letter-spacing:0.1em;color:var(--g-red);margin-bottom:0.75rem;">// NOT COVERED:</div>
            <ul style="display:flex;flex-direction:column;gap:0.5rem;">
              <li style="display:flex;gap:0.6rem;font-family:var(--g-font-body);font-size:0.875rem;color:#667788;"><i class="ri-close-line" style="color:var(--g-red);flex-shrink:0;"></i>Physical damage, drops, or liquid spills</li>
              <li style="display:flex;gap:0.6rem;font-family:var(--g-font-body);font-size:0.875rem;color:#667788;"><i class="ri-close-line" style="color:var(--g-red);flex-shrink:0;"></i>Cosmetic damage such as scratches</li>
              <li style="display:flex;gap:0.6rem;font-family:var(--g-font-body);font-size:0.875rem;color:#667788;"><i class="ri-close-line" style="color:var(--g-red);flex-shrink:0;"></i>Damage from unauthorized modification or repair</li>
            </ul>
          </div>
        </div>
      </div>    </div>  </main>

  <section class="g-related">
    <div class="g-container">
      <div class="g-section-header">
        <div>
          <div class="g-section-eyebrow">RECOMMENDED FOR YOU</div>
          <h2 class="g-section-title">RELATED <span>PRODUCTS</span></h2>
        </div>
        <a href="{{url('/gaming-products')}}" class="g-view-all">VIEW ALL GAMING <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="g-product-grid" id="gRelatedGrid" style="grid-template-columns:repeat(4,1fr);"></div>
    </div>
  </section>

  <div class="g-toast" id="gToast"><i class="ri-terminal-box-line"></i><span id="gToastMsg">// ITEM ADDED</span></div>
  <button class="g-back-top" id="gBackTop"><i class="ri-arrow-up-line"></i></button>

  <script>
    const PRODUCTS = [
      { id:1, name:'HyperX Alloy Origins RGB Mechanical Keyboard', brand:'HyperX', category:'keyboards', price:3499, original:5999, image:'{{asset('public/assets/keyboard.png')}}', rating:4.8, reviews:1243, badge:'discount' },
      { id:2, name:'Logitech G502 Hero Gaming Mouse', brand:'Logitech', category:'mice', price:2799, original:4999, image:'{{asset('public/assets/mouse.png')}}', rating:4.9, reviews:2890, badge:'bestseller' },
      { id:3, name:'HyperX Cloud II Gaming Headset 7.1', brand:'HyperX', category:'headsets', price:4999, original:7499, image:'{{asset('public/assets/headset.png')}}', rating:4.7, reviews:1876, badge:'hot' },
      { id:4, name:'Green Soul Gaming Chair Alpha Series', brand:'Green Soul', category:'chairs', price:12999, original:18999, image:'{{asset('public/assets/chair.png')}}', rating:4.6, reviews:543, badge:'discount' },
      { id:5, name:'27" Curved Gaming Monitor 165Hz', brand:'LG', category:'monitors', price:18999, original:27999, image:'{{asset('public/assets/monitor.png')}}', rating:4.8, reviews:723, badge:'new' },
      { id:6, name:'Xbox Wireless Controller Carbon Black', brand:'Microsoft', category:'controllers', price:5499, original:7999, image:'{{asset('public/assets/controller.png')}}', rating:4.9, reviews:3210, badge:'discount' },
      { id:7, name:'Corsair MM350 Pro Extended Mousepad', brand:'Corsair', category:'mousepads', price:1499, original:2499, image:'{{asset('public/assets/mousepad.png')}}', rating:4.7, reviews:912, badge:'new' },
      { id:8, name:'Razer DeathAdder V3 Gaming Mouse', brand:'Razer', category:'mice', price:5999, original:8999, image:'{{asset('public/assets/mouse.png')}}', rating:4.9, reviews:1432, badge:'hot' },
    ];
    let gCart = JSON.parse(localStorage.getItem('pg_cart') || '[]');
    let gWishlist = JSON.parse(localStorage.getItem('pg_wishlist') || '[]');
    const fmt = n => '₹' + n.toLocaleString('en-IN');
    const disc = (p,o) => Math.round(((o-p)/o)*100);
    const stars = r => { let s=''; for(let i=0;i<5;i++) s+=i<Math.floor(r)?'★':i===Math.floor(r)&&r%1>=0.5?'½':'☆'; return s; };

    function gShowToast(msg) {
      const t=document.getElementById('gToast');
      document.getElementById('gToastMsg').textContent=msg;
      t.classList.add('show');
      setTimeout(()=>t.classList.remove('show'),2500);
    }
    function gSaveCart(){localStorage.setItem('pg_cart',JSON.stringify(gCart));document.getElementById('gCartCount').textContent=gCart.reduce((a,i)=>a+i.qty,0);}
    function gSaveWishlist(){localStorage.setItem('pg_wishlist',JSON.stringify(gWishlist));document.getElementById('gWishlistCount').textContent=gWishlist.length;}
    function gAddCart(id,qty=1){const ex=gCart.find(i=>i.id===id);if(ex)ex.qty+=qty;else gCart.push({id,qty});gSaveCart();}

    function createGCard(p){
      const save=disc(p.price,p.original);
      const badge={discount:`<span class="g-badge-pill g-badge-discount">-${save}%</span>`,new:`<span class="g-badge-pill g-badge-new">// NEW</span>`,hot:`<span class="g-badge-pill g-badge-hot">🔥 HOT</span>`,bestseller:`<span class="g-badge-pill g-badge-best">★ BEST</span>`}[p.badge]||'';
      return `<article class="g-product-card" data-id="${p.id}" style="cursor:pointer;" onclick="window.location='gaming-product-detail.html?id=${p.id}'">
        <div class="g-card-line"></div>
        <div class="g-card-img-wrap">
          <div class="g-card-badges">${badge}</div>
          <img src="${p.image}" alt="${p.name}" class="g-card-img" loading="lazy" />
          <div class="g-card-overlay">
            <button class="g-overlay-cart" onclick="event.stopPropagation();gAddCart(${p.id});gShowToast('// ITEM ADDED TO CART');"><i class="ri-shopping-cart-line"></i> ADD TO CART</button>
          </div>
        </div>
        <div class="g-card-info">
          <div class="g-card-brand">${p.brand}</div>
          <div class="g-card-name">${p.name}</div>
          <div class="g-card-rating"><span class="g-stars">${stars(p.rating)}</span><span class="g-rating-count">${p.rating} (${p.reviews.toLocaleString()})</span></div>
          <div class="g-card-price-row"><div><span class="g-price-main">${fmt(p.price)}</span><span class="g-price-original">${fmt(p.original)}</span></div><span class="g-price-save">-${save}%</span></div>
        </div>
      </article>`;
    }

    document.addEventListener('DOMContentLoaded', () => {
      const params = new URLSearchParams(window.location.search);
      const id = +params.get('id') || 1;
      const p = PRODUCTS.find(x=>x.id===id) || PRODUCTS[0];

      // Populate product info
      document.getElementById('gMainImg').src = p.image;
      document.getElementById('gDetailBrand').textContent = p.brand.toUpperCase();
      document.getElementById('gDetailTitle').textContent = p.name;
      document.getElementById('gDetailPrice').textContent = fmt(p.price);
      document.getElementById('gDetailOriginal').textContent = fmt(p.original);
      document.getElementById('gDetailSave').textContent = `SAVE ${disc(p.price,p.original)}%`;
      document.getElementById('gDetailStars').textContent = stars(p.rating);
      document.getElementById('gDetailReviews').textContent = `${p.rating} · ${p.reviews.toLocaleString()} reviews`;
      document.getElementById('gBreadcrumb').textContent = p.name.toUpperCase().slice(0,30)+'…';

      // Badges
      document.getElementById('gCartCount').textContent = gCart.reduce((a,i)=>a+i.qty,0);
      document.getElementById('gWishlistCount').textContent = gWishlist.length;

      // Qty
      let qty=1;
      document.getElementById('gQtyMinus').addEventListener('click',()=>{if(qty>1){qty--;document.getElementById('gQtyVal').textContent=qty;}});
      document.getElementById('gQtyPlus').addEventListener('click',()=>{qty++;document.getElementById('gQtyVal').textContent=qty;});

      // Add to cart
      document.getElementById('gAddCart').addEventListener('click',()=>{gAddCart(p.id,qty);gShowToast(`// ${qty} ITEM(S) ADDED TO CART`);});

      // Wishlist
      const wb=document.getElementById('gWishBtn');
      wb.addEventListener('click',()=>{
        const idx=gWishlist.indexOf(p.id);
        if(idx===-1){gWishlist.push(p.id);wb.innerHTML='<i class="ri-heart-fill"></i>';wb.style.color='var(--g-red)';gShowToast('// ADDED TO WISHLIST');}
        else{gWishlist.splice(idx,1);wb.innerHTML='<i class="ri-heart-line"></i>';wb.style.color='';gShowToast('// REMOVED FROM WISHLIST');}
        gSaveWishlist();
      });

      // Thumbnails
      document.querySelectorAll('.g-thumb-btn').forEach(btn=>{
        btn.addEventListener('click',()=>{
          document.querySelectorAll('.g-thumb-btn').forEach(b=>b.classList.remove('active'));
          btn.classList.add('active');
          document.getElementById('gMainImg').src=btn.querySelector('img').src;
        });
      });

      // Tabs
      document.querySelectorAll('.g-tab-btn').forEach(btn=>{
        btn.addEventListener('click',()=>{
          document.querySelectorAll('.g-tab-btn').forEach(b=>b.classList.remove('active'));
          document.querySelectorAll('.g-tab-panel').forEach(x=>x.classList.remove('active'));
          btn.classList.add('active');
          const panel=document.getElementById('g-tab-'+btn.dataset.tab);
          if(panel) panel.classList.add('active');
        });
      });

      // Variants
      document.querySelectorAll('.g-var-btn').forEach(btn=>{
        btn.addEventListener('click',()=>{
          btn.closest('.g-var-row').querySelectorAll('.g-var-btn').forEach(b=>b.classList.remove('active'));
          btn.classList.add('active');
        });
      });

      // Related products
      const related = PRODUCTS.filter(x=>x.id!==p.id).slice(0,4);
      document.getElementById('gRelatedGrid').innerHTML = related.map(createGCard).join('');

      // Back top
      const bt=document.getElementById('gBackTop');
      window.addEventListener('scroll',()=>{bt?.classList.toggle('visible',window.scrollY>200);},{passive:true});
      bt?.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));

      // Announcement close
      document.getElementById('gAnnClose')?.addEventListener('click',()=>{document.getElementById('gAnnouncement').style.display='none';});

      // Mobile menu
      const mb=document.getElementById('gMenuBtn');
      const nv=document.getElementById('gNav');
      mb?.addEventListener('click',()=>{mb.classList.toggle('active');nv.classList.toggle('open');});
    });

    function setGColor(btn,val){
      document.querySelectorAll('.g-var-btn[onclick*="setGColor"]').forEach(b=>b.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById('gColorVal').textContent=val;
    }
    function checkGPincode(){
      const v=document.getElementById('gPincodeInput').value;
      if(v.length===6) gShowToast('// DELIVERY AVAILABLE TO '+v+' IN 2-3 DAYS');
      else gShowToast('// INVALID PINCODE — ENTER 6 DIGITS');
    }
    function copyCoupon(el){
      navigator.clipboard.writeText('POUCH10').then(()=>{
        el.innerHTML='<i class="ri-check-line"></i> COPIED!';
        setTimeout(()=>{el.innerHTML='<i class="ri-file-copy-line"></i> POUCH10';},2000);
      });
    }
  </script>

  <div id="gEntranceWipe"></div>
  <script>
    (function () {
      const wipe = document.getElementById('gEntranceWipe');
      if (!wipe) return;
      let startTime = null;
      const DURATION = 520;
      function animateSweep(ts) {
        if (!startTime) startTime = ts;
        const pct = Math.min(100, ((ts - startTime) / DURATION) * 100);
        wipe.style.setProperty('--wipe-y', pct + '%');
        if (pct < 100) { requestAnimationFrame(animateSweep); }
        else {
          wipe.style.transition = 'opacity .35s ease';
          wipe.style.opacity = '0';
          setTimeout(() => { wipe.style.display = 'none'; }, 380);
        }
      }
      setTimeout(() => requestAnimationFrame(animateSweep), 80);
    })();
  </script>
</body>
</html>


