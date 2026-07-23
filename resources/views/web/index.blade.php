@extends('layouts.weblayout')

@section('content')
  <section class="hero-section">
    <div class="hero-slider" id="heroSlider">

      @foreach($banner as $key => $b)
      <div class="hero-slide {{ $key == 0 ? 'active' : '' }}">
        <div class="hero-bg" style="background: #f7f7f7;">
          <div class="hero-particles"></div>
        </div>
        <div class="hero-content-wrap">
          <div class="hero-text">
            <div class="hero-tag">🔥 Special Offer</div>
            <h1 class="hero-title">{{ $b->banner_title ?? 'Level Up Your' }}<br /><span class="gradient-text">Gaming Setup</span></h1>
            <p class="hero-desc">Premium gear crafted for champions. Experience the difference with Pouch Gallery®</p>
            <div class="hero-cta-group">
              <a href="{{url('/gaming-products')}}" class="btn btn-primary">Shop Gaming <i class="ri-arrow-right-line"></i></a>
              <a href="#featured" class="btn btn-ghost">View Deals</a>
            </div>
            <div class="hero-stats">
              <div class="stat"><strong>50K+</strong><span>Happy Customers</span></div>
              <div class="stat-sep"></div>
              <div class="stat"><strong>1000+</strong><span>Products</span></div>
              <div class="stat-sep"></div>
              <div class="stat"><strong>4.9★</strong><span>Avg Rating</span></div>
            </div>
          </div>
          <div class="hero-image-wrap">
            <div class="hero-glow"></div>
            <img src="{{asset('public/uploads/banners/'.$b->banner)}}" alt="Banner image" class="hero-img" style="border-radius: 10px;" />
          </div>
        </div>
      </div>
      @endforeach

      <div class="hero-controls">
        @foreach($banner as $key => $b)
        <button class="hero-dot {{ $key == 0 ? 'active' : '' }}" data-slide="{{ $key }}" aria-label="Slide {{ $key+1 }}"></button>
        @endforeach
      </div>
      <button class="hero-arrow prev" id="heroPrev" aria-label="Previous slide"><i class="ri-arrow-left-s-line"></i></button>
      <button class="hero-arrow next" id="heroNext" aria-label="Next slide"><i class="ri-arrow-right-s-line"></i></button>
    </div>
  </section>

  <section class="trust-strip">
    <div class="container">
      <div class="trust-grid">
        <div class="trust-item">
          <div class="trust-icon"><i class="ri-truck-line"></i></div>
          <div>
            <div class="trust-title">Free Shipping</div>
            <div class="trust-desc">On orders above ₹999</div>
          </div>
        </div>
        <div class="trust-item">
          <div class="trust-icon"><i class="ri-shield-check-line"></i></div>
          <div>
            <div class="trust-title">100% Authentic</div>
            <div class="trust-desc">Genuine products guaranteed</div>
          </div>
        </div>
        <div class="trust-item">
          <div class="trust-icon"><i class="ri-exchange-line"></i></div>
          <div>
            <div class="trust-title">Easy Returns</div>
            <div class="trust-desc">7-day hassle-free returns</div>
          </div>
        </div>
        <div class="trust-item">
          <div class="trust-icon"><i class="ri-customer-service-2-line"></i></div>
          <div>
            <div class="trust-title">24/7 Support</div>
            <div class="trust-desc">We're always here to help</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="categories-section" >
    <div class="container">
      <div class="section-header">
        <div>
          <p class="section-sub">Browse by</p>
          <h2 class="section-title">Shop by Category</h2>
        </div>
        <a href="#" class="view-all-link">View All <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="category-grid">
        @foreach($catlimit as $cat)
        <a href="{{url('productlist/'.$cat->id)}}" class="cat-card cat-gaming reveal">
          <div class="cat-bg-glow"></div>
          <div class="cat-icon-wrap"><i class="ri-shopping-bag-3-line"></i></div>
          <div class="cat-info">
            <h3>{{$cat->category_name}}</h3>
            <span>Explore</span>
          </div>
          <div class="cat-hover-arrow"><i class="ri-arrow-right-line"></i></div>
        </a>
        @endforeach
      </div>
    </div>
  </section>

  <section class="products-section" >
    <div class="container">
      <div class="section-header">
        <div>
          <p class="section-sub">🔥 Hand-picked for you</p>
          <h2 class="section-title">Featured Products</h2>
        </div>
        <!-- <a href="{{url('/productlist')}}" class="view-all-link">View All <i class="ri-arrow-right-line"></i></a> -->
      </div>
      <div class="product-grid" >
        @foreach($fastmovingProducts as $p)

<article class="product-card" data-id="{{ $p->id }}" role="button" tabindex="0" aria-label="{{ $p->name }}">
   
    <div class="product-img-wrap">

       

        
      <img src="{{ asset('public/assets/img/items/'.$p->image) }}" alt="{{ $p->name }}" loading="lazy"> 

        <div class="product-overlay" aria-hidden="true">
            <!-- <button class="overlay-btn add-to-cart overlay-cart" data-id="{{ $p->id }}">
                <i class="ri-shopping-cart-line"></i> Add to Cart
            </button> -->

             <a href="{{url('product/'.$p->slug)}}"><button class="overlay-btn overlay-view" data-id="{{ $p->id }}">
                <i class="ri-eye-line"></i> Quick View
            </button></a>
        </div>
    </div>

    <div class="product-info">

        <div class="product-brand">
            {{ $p->author_name }}
        </div>

        <div class="product-name">
            {{ $p->name }}
        </div>

        <div class="product-rating">
            <span class="stars-display">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor(5))
                        <i class="ri-star-fill"></i>
                    @else
                        <i class="ri-star-line"></i>
                    @endif
                @endfor
            </span>

            <span class="rating-count">
                5 
            </span>
        </div>

        <div class="product-price-row">
            <div>
                <span class="price-main">
                    ₹{{ number_format($p->sr, 2) }}
                </span>

                <span class="price-original">
                    ₹{{ number_format($p->mrp, 2) }}
                </span>
            </div>

            <span class="price-save">
                Save ₹{{ number_format($p->mrp - $p->sr, 2) }}
            </span>
        </div>

    </div>
</article>

        @endforeach
      </div>
    </div>
  </section>

  <section class="promo-section">
    <div class="container">
      <div class="promo-banner reveal">
        <div class="promo-content">
          <span class="promo-tag">Limited Time Offer</span>
          <h2 class="promo-title">Get up to <span class="promo-accent">40% OFF</span><br />on Gaming Gear</h2>
          <p class="promo-text">Premium keyboards, mice, headsets and more. Sale ends in:</p>
          <div class="countdown" id="countdown">
            <div class="cd-box"><span id="cd-h">12</span><small>Hours</small></div>
            <div class="cd-box"><span id="cd-m">45</span><small>Mins</small></div>
            <div class="cd-box"><span id="cd-s">30</span><small>Secs</small></div>
          </div>
          <a href="{{url('/gaming-products')}}" class="btn btn-accent">Shop the Sale <i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="promo-img-wrap">
          <img src="{{asset('public/assets/gaming_hero.png')}}" alt="Gaming sale" class="promo-img" />
        </div>
      </div>
    </div>
  </section>

  <section class="products-section" >
    <div class="container">
      <div class="section-header">
        <div>
          <p class="section-sub">🆕 Just Dropped</p>
          <h2 class="section-title">New Arrivals</h2>
        </div>
        <a href="{{url('/gaming-products')}}" class="view-all-link">View All <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="product-grid" id="newArrivalsGrid">
        @foreach($fastmovingProducts as $p)
        <article class="product-card" data-id="{{ $p->id }}" role="button" tabindex="0" aria-label="{{ $p->name }}">
   
    <div class="product-img-wrap">

       

        
      <img src="{{ asset('public/assets/img/items/'.$p->image) }}" alt="{{ $p->name }}" loading="lazy"> 

        <div class="product-overlay" aria-hidden="true">
            <!-- <button class="overlay-btn add-to-cart overlay-cart" data-id="{{ $p->id }}">
                <i class="ri-shopping-cart-line"></i> Add to Cart
            </button> -->

             <a href="{{url('product/'.$p->slug)}}"><button class="overlay-btn overlay-view" data-id="{{ $p->id }}">
                <i class="ri-eye-line"></i> Quick View
            </button></a>
        </div>
    </div>

    <div class="product-info">

        <div class="product-brand">
            {{ $p->author_name }}
        </div>

        <div class="product-name">
            {{ $p->name }}
        </div>

        <div class="product-rating">
            <span class="stars-display">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor(5))
                        <i class="ri-star-fill"></i>
                    @else
                        <i class="ri-star-line"></i>
                    @endif
                @endfor
            </span>

            <span class="rating-count">
                5 
            </span>
        </div>

        <div class="product-price-row">
            <div>
                <span class="price-main">
                    ₹{{ number_format($p->sr, 2) }}
                </span>

                <span class="price-original">
                    ₹{{ number_format($p->mrp, 2) }}
                </span>
            </div>

            <span class="price-save">
                Save ₹{{ number_format($p->mrp - $p->sr, 2) }}
            </span>
        </div>

    </div>
</article>
        @endforeach
      </div>
    </div>
  </section>

  <section class="products-section bg-alt" >
    <div class="container">
      <div class="section-header">
        <div>
          <p class="section-sub">⭐ Customer Favourites</p>
          <h2 class="section-title">Best Sellers</h2>
        </div>
        <a href="{{url('/gaming-products')}}" class="view-all-link">View All <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="product-grid" id="bestSellersGrid">
        @foreach($fastmovingProducts as $p)
       <article class="product-card" data-id="{{ $p->id }}" role="button" tabindex="0" aria-label="{{ $p->name }}">
   
    <div class="product-img-wrap">

       

        
      <img src="{{ asset('public/assets/img/items/'.$p->image) }}" alt="{{ $p->name }}" loading="lazy"> 

        <div class="product-overlay" aria-hidden="true">
            <!-- <button class="overlay-btn add-to-cart overlay-cart" data-id="{{ $p->id }}">
                <i class="ri-shopping-cart-line"></i> Add to Cart
            </button> -->

             <a href="{{url('product/'.$p->slug)}}"><button class="overlay-btn overlay-view" data-id="{{ $p->id }}">
                <i class="ri-eye-line"></i> Quick View
            </button></a>
        </div>
    </div>

    <div class="product-info">

        <div class="product-brand">
            {{ $p->author_name }}
        </div>

        <div class="product-name">
            {{ $p->name }}
        </div>

        <div class="product-rating">
            <span class="stars-display">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor(5))
                        <i class="ri-star-fill"></i>
                    @else
                        <i class="ri-star-line"></i>
                    @endif
                @endfor
            </span>

            <span class="rating-count">
                5 
            </span>
        </div>

        <div class="product-price-row">
            <div>
                <span class="price-main">
                    ₹{{ number_format($p->sr, 2) }}
                </span>

                <span class="price-original">
                    ₹{{ number_format($p->mrp, 2) }}
                </span>
            </div>

            <span class="price-save">
                Save ₹{{ number_format($p->mrp - $p->sr, 2) }}
            </span>
        </div>

    </div>
</article>
        @endforeach
      </div>
    </div>
  </section>

  <section class="why-section">
    <div class="container">
      <div class="section-header center">
        <div>
          <p class="section-sub">Our Promise</p>
          <h2 class="section-title">📦 Why Shop With Us?</h2>
        </div>
      </div>
      <div class="why-grid">
        <div class="why-card reveal">
          <div class="why-icon"><i class="ri-award-line"></i></div>
          <h3>Premium Quality</h3>
          <p>Every product is carefully curated and tested to meet our high quality standards before listing.</p>
        </div>
        <div class="why-card reveal">
          <div class="why-icon"><i class="ri-price-tag-3-line"></i></div>
          <h3>Best Prices</h3>
          <p>We work directly with manufacturers and brands to bring you the most competitive prices in India.</p>
        </div>
        <div class="why-card reveal">
          <div class="why-icon"><i class="ri-truck-line"></i></div>
          <h3>Fast Delivery</h3>
          <p>Same-day dispatch on orders placed before 2 PM. Delivered pan-India within 2–5 business days.</p>
        </div>
        <div class="why-card reveal">
          <div class="why-icon"><i class="ri-shield-user-line"></i></div>
          <h3>Secure Payments</h3>
          <p>256-bit SSL encrypted checkout with multiple payment options including UPI, cards, and EMI.</p>
        </div>
        <div class="why-card reveal">
          <div class="why-icon"><i class="ri-loop-left-line"></i></div>
          <h3>Easy Returns</h3>
          <p>Not satisfied? Return within 7 days for a full refund, no questions asked.</p>
        </div>
        <div class="why-card reveal">
          <div class="why-icon"><i class="ri-star-line"></i></div>
          <h3>Loyalty Rewards</h3>
          <p>Earn Pouch Points on every purchase and redeem them for exclusive discounts on future orders.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="shipping-section">
    <div class="container">
      <div class="shipping-grid">
        <div class="shipping-info reveal">
          <h2>🚚 Shipping & Delivery</h2>
          <p class="shipping-desc">We partner with top logistics providers to ensure your order reaches safely and on time.</p>
          <div class="shipping-items">
            <div class="ship-item">
              <i class="ri-check-double-line"></i>
              <div>
                <strong>Standard Delivery (2–5 Days)</strong>
                <span>FREE on orders above ₹999</span>
              </div>
            </div>
            <div class="ship-item">
              <i class="ri-flashlight-line"></i>
              <div>
                <strong>Express Delivery (1–2 Days)</strong>
                <span>₹149 flat charge, same-day dispatch</span>
              </div>
            </div>
            <div class="ship-item">
              <i class="ri-map-pin-line"></i>
              <div>
                <strong>Pan-India Coverage</strong>
                <span>Delivering to 25,000+ pin codes</span>
              </div>
            </div>
            <div class="ship-item">
              <i class="ri-package-line"></i>
              <div>
                <strong>Secure Packaging</strong>
                <span>All products bubble-wrapped & sealed</span>
              </div>
            </div>
          </div>
          <a href="#" class="btn btn-outline">Track Your Order <i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="shipping-visual reveal">
          <div class="ship-steps">
            <div class="ship-step active">
              <div class="step-icon"><i class="ri-shopping-bag-line"></i></div>
              <div class="step-info"><strong>Order Placed</strong><span>Instantly confirmed</span></div>
            </div>
            <div class="step-line"></div>
            <div class="ship-step">
              <div class="step-icon"><i class="ri-tools-line"></i></div>
              <div class="step-info"><strong>Processing</strong><span>Same day</span></div>
            </div>
            <div class="step-line"></div>
            <div class="ship-step">
              <div class="step-icon"><i class="ri-truck-line"></i></div>
              <div class="step-info"><strong>Shipped</strong><span>Within 24 hrs</span></div>
            </div>
            <div class="step-line"></div>
            <div class="ship-step">
              <div class="step-icon"><i class="ri-home-smile-line"></i></div>
              <div class="step-info"><strong>Delivered</strong><span>2–5 days</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials-section" id="testimonials">
    <div class="container">
      <div class="section-header center">
        <div>
          <p class="section-sub">What Our Customers Say</p>
          <h2 class="section-title">💬 Customer Testimonials</h2>
        </div>
      </div>
      <div class="testimonials-grid">
        <div class="testimonial-card reveal">
          <div class="stars">★★★★★</div>
          <p>"The RGB keyboard I ordered was exactly as described. Build quality is phenomenal. Delivery was super fast – couldn't be happier!"</p>
          <div class="reviewer">
            <div class="reviewer-avatar">A</div>
            <div>
              <strong>Arjun Menon</strong>
              <span>Verified Buyer · Kerala</span>
            </div>
          </div>
        </div>
        <div class="testimonial-card reveal">
          <div class="stars">★★★★★</div>
          <p>"Bought a gaming mouse and headset combo. Both products are top-notch. Pouch Gallery has the best prices I've found online!"</p>
          <div class="reviewer">
            <div class="reviewer-avatar">P</div>
            <div>
              <strong>Priya S.</strong>
              <span>Verified Buyer · Tamil Nadu</span>
            </div>
          </div>
        </div>
        <div class="testimonial-card reveal">
          <div class="stars">★★★★☆</div>
          <p>"Great selection of products and very responsive customer service. The laptop bag I got is super sturdy. Highly recommended!"</p>
          <div class="reviewer">
            <div class="reviewer-avatar">R</div>
            <div>
              <strong>Rahul K.</strong>
              <span>Verified Buyer · Karnataka</span>
            </div>
          </div>
        </div>
        <div class="testimonial-card reveal">
          <div class="stars">★★★★★</div>
          <p>"Ordered the gaming chair and was blown away by the quality. Assembly was easy. Already recommended Pouch Gallery to all my friends."</p>
          <div class="reviewer">
            <div class="reviewer-avatar">S</div>
            <div>
              <strong>Sneha R.</strong>
              <span>Verified Buyer · Maharashtra</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="newsletter-section">
    <div class="container">
      <div class="newsletter-card reveal">
        <div class="nl-content">
          <div class="nl-icon"><i class="ri-mail-send-line"></i></div>
          <h2>Stay in the Loop</h2>
          <p>Subscribe for exclusive deals, new arrivals, and gaming tips.</p>
          <form class="nl-form" id="nlForm" onsubmit="return handleNewsletter(event)">
            <input type="email" placeholder="Enter your email address..." required id="nlEmail" />
            <button type="submit" class="btn btn-primary">Subscribe <i class="ri-send-plane-line"></i></button>
          </form>
          <p class="nl-note">No spam, ever. Unsubscribe anytime.</p>
        </div>
        <div class="nl-visual">
          <div class="nl-decoration">
            <div class="nl-orb orb1"></div>
            <div class="nl-orb orb2"></div>
            <div class="nl-orb orb3"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="gamingTransition" aria-hidden="true">
    <div class="gt-scanlines"></div>
    <div class="gt-grid"></div>
    <div class="gt-orb gt-orb-a"></div>
    <div class="gt-orb gt-orb-b"></div>
    <div class="gt-content">
      <div class="gt-logo-row">
        <img src="{{asset('public/assets/logo.png')}}" alt="" class="gt-logo" />
        <span class="gt-logo-text">POUCH GALLERY<sup>®</sup></span>
      </div>
      <div class="gt-title" id="gtTitle">ENTERING GAMING ZONE</div>
      <div class="gt-sub" id="gtSub">Initializing systems…</div>
      <div class="gt-bar-wrap">
        <div class="gt-bar" id="gtBar"></div>
      </div>
      <div class="gt-steps" id="gtSteps">
        <span class="gt-step" id="gtStep1">◈ LOADING ASSETS</span>
        <span class="gt-step" id="gtStep2">◈ RGB CALIBRATION</span>
        <span class="gt-step" id="gtStep3">◈ SYSTEM READY</span>
      </div>
      <div class="gt-pct" id="gtPct">0%</div>
    </div>
  </div>

  <style>
    /* ── Gaming Transition Overlay ── */
    #gamingTransition {
      position: fixed;
      inset: 0;
      background: #02020a;
      z-index: 99999;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      visibility: hidden;
      transition: opacity .25s ease;
      overflow: hidden;
    }
    #gamingTransition.active {
      opacity: 1;
      visibility: visible;
    }
    #gamingTransition.fade-out {
      opacity: 0;
      transition: opacity .4s ease;
    }

    /* Scanlines */
    .gt-scanlines {
      position: absolute;
      inset: 0;
      background: repeating-linear-gradient(
        0deg,
        transparent,
        transparent 2px,
        rgba(0,245,255,.025) 2px,
        rgba(0,245,255,.025) 4px
      );
      pointer-events: none;
      z-index: 1;
    }

    /* Grid background */
    .gt-grid {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(0,245,255,.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,245,255,.04) 1px, transparent 1px);
      background-size: 50px 50px;
      animation: gtGridPulse 2s ease-in-out infinite;
    }
    @keyframes gtGridPulse { 0%,100%{opacity:.5} 50%{opacity:1} }

    /* Neon orbs */
    .gt-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      animation: gtOrbFloat 6s ease-in-out infinite;
    }
    .gt-orb-a { width:400px;height:400px;background:rgba(0,245,255,.12);top:-80px;left:-80px; }
    .gt-orb-b { width:350px;height:350px;background:rgba(191,0,255,.14);bottom:-60px;right:-60px;animation-delay:-3s; }
    @keyframes gtOrbFloat {
      0%,100%{transform:translate(0,0)} 50%{transform:translate(20px,-20px)}
    }

    /* Content */
    .gt-content {
      position: relative;
      z-index: 10;
      text-align: center;
      width: 90%;
      max-width: 520px;
    }

    /* Logo row */
    .gt-logo-row {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: .75rem;
      margin-bottom: 2.5rem;
      opacity: 0;
      transform: translateY(-12px);
      animation: gtFadeUp .5s ease .1s forwards;
    }
    .gt-logo {
      height: 40px;
      width: 40px;
      object-fit: contain;
      filter: invert(1) drop-shadow(0 0 12px rgba(0,245,255,.8));
    }
    .gt-logo-text {
      font-family: 'Orbitron', 'Outfit', sans-serif;
      font-size: 1rem;
      font-weight: 800;
      letter-spacing: .08em;
      background: linear-gradient(135deg,#00f5ff,#bf00ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      filter: drop-shadow(0 0 8px rgba(0,245,255,.5));
    }
    .gt-logo-text sup { font-size:.5em;-webkit-text-fill-color:#334; }

    /* Big title with glitch */
    .gt-title {
      font-family: 'Orbitron', 'Outfit', sans-serif;
      font-size: clamp(1.4rem, 4vw, 2.2rem);
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: .12em;
      color: #00f5ff;
      text-shadow: 0 0 20px rgba(0,245,255,.7), 0 0 60px rgba(0,245,255,.3);
      margin-bottom: .75rem;
      opacity: 0;
      animation: gtFadeUp .5s ease .3s forwards, gtGlitch 4s ease 1s infinite;
      position: relative;
    }
    @keyframes gtFadeUp { to { opacity:1; transform:translateY(0); } from { opacity:0; transform:translateY(12px); } }
    @keyframes gtGlitch {
      0%,92%,100%  { text-shadow: 0 0 20px rgba(0,245,255,.7); transform: translate(0); }
      93%  { text-shadow: -2px 0 #ff1744, 2px 0 #00f5ff; transform: translateX(-2px); }
      94%  { text-shadow:  2px 0 #bf00ff, -2px 0 #00ff88; transform: translateX(2px); }
      95%  { text-shadow: 0 0 20px rgba(0,245,255,.7); transform: translate(0); }
      96%  { text-shadow: -3px 0 #ff1744; transform: translateX(-1px) skewX(-2deg); }
      97%  { text-shadow: 0 0 20px rgba(0,245,255,.7); transform: translate(0); }
    }

    .gt-sub {
      font-family: 'Rajdhani', 'Outfit', sans-serif;
      font-size: .9rem;
      font-weight: 600;
      letter-spacing: .2em;
      text-transform: uppercase;
      color: rgba(0,245,255,.5);
      margin-bottom: 2rem;
      opacity: 0;
      animation: gtFadeUp .5s ease .5s forwards;
    }

    /* Progress bar */
    .gt-bar-wrap {
      height: 3px;
      background: rgba(255,255,255,.06);
      border-radius: 0;
      margin-bottom: 1.25rem;
      overflow: hidden;
      position: relative;
      opacity: 0;
      animation: gtFadeUp .4s ease .6s forwards;
    }
    .gt-bar-wrap::before {
      content: '';
      position: absolute;
      inset: 0;
      border: 1px solid rgba(0,245,255,.15);
    }
    .gt-bar {
      height: 100%;
      width: 0%;
      background: linear-gradient(90deg,#00f5ff,#bf00ff,#00ff88);
      box-shadow: 0 0 12px rgba(0,245,255,.8), 0 0 30px rgba(0,245,255,.4);
      border-radius: 0;
      transition: width .08s linear;
    }

    /* Step indicators */
    .gt-steps {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin-bottom: 1rem;
      opacity: 0;
      animation: gtFadeUp .4s ease .7s forwards;
    }
    .gt-step {
      font-family: 'Orbitron', monospace;
      font-size: .58rem;
      font-weight: 700;
      letter-spacing: .12em;
      color: rgba(0,245,255,.2);
      text-transform: uppercase;
      transition: color .3s, text-shadow .3s;
    }
    .gt-step.done {
      color: #00ff88;
      text-shadow: 0 0 10px rgba(0,255,136,.6);
    }
    .gt-step.active {
      color: #00f5ff;
      text-shadow: 0 0 10px rgba(0,245,255,.8);
      animation: gtStepBlink .5s ease-in-out infinite;
    }
    @keyframes gtStepBlink { 0%,100%{opacity:1} 50%{opacity:.4} }

    /* Percentage */
    .gt-pct {
      font-family: 'Orbitron', monospace;
      font-size: 2.5rem;
      font-weight: 900;
      background: linear-gradient(135deg,#00f5ff,#bf00ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      filter: drop-shadow(0 0 12px rgba(0,245,255,.5));
      opacity: 0;
      animation: gtFadeUp .4s ease .8s forwards;
    }

    /* Corner decorators */
    .gt-content::before,
    .gt-content::after {
      content: '';
      position: absolute;
      width: 28px;
      height: 28px;
      border-color: rgba(0,245,255,.35);
      border-style: solid;
    }
    .gt-content::before { top:-16px;left:-16px;border-width:2px 0 0 2px; }
    .gt-content::after  { bottom:-16px;right:-16px;border-width:0 2px 2px 0; }
  </style>
  <script>
    /* ── Gaming Transition ── */
    (function () {
      const overlay  = document.getElementById('gamingTransition');
      const bar      = document.getElementById('gtBar');
      const pct      = document.getElementById('gtPct');
      const sub      = document.getElementById('gtSub');
      const step1    = document.getElementById('gtStep1');
      const step2    = document.getElementById('gtStep2');
      const step3    = document.getElementById('gtStep3');

      const subs = [
        'Loading assets…',
        'Calibrating RGB…',
        'System ready. ENGAGE.',
      ];

      function runTransition(dest) {
        overlay.classList.add('active');
        let progress = 0;
        step1.classList.add('active');

        const interval = setInterval(() => {
          progress += Math.random() * 4 + 2;
          if (progress > 100) progress = 100;

          bar.style.width = progress + '%';
          pct.textContent = Math.floor(progress) + '%';

          // Step milestones
          if (progress >= 30 && !step1.classList.contains('done')) {
            step1.classList.remove('active'); step1.classList.add('done');
            step2.classList.add('active');
            sub.textContent = subs[1];
          }
          if (progress >= 65 && !step2.classList.contains('done')) {
            step2.classList.remove('active'); step2.classList.add('done');
            step3.classList.add('active');
            sub.textContent = subs[2];
          }
          if (progress >= 100) {
            clearInterval(interval);
            step3.classList.remove('active'); step3.classList.add('done');
            pct.textContent = '100%';
            // Short pause then navigate
            setTimeout(() => {
              window.location.href = dest;
            }, 280);
          }
        }, 40);
      }

      // Intercept ALL links pointing to gaming-products or gaming-product-detail
      document.addEventListener('click', function (e) {
        const link = e.target.closest('a[href]');
        if (!link) return;
        const href = link.getAttribute('href');
        if (!href) return;
        // Match only gaming section links
        if (href.includes('gaming-product')) {
          e.preventDefault();
          runTransition(href);
        }
      });
    })();
  </script>

@endsection
