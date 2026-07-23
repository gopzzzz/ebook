<?php $__env->startSection('content'); ?>

   <?php
            $inCart    = in_array($product->id, $cartProductIds);
            $getCart = collect($cartItems) ->where('product_id', $product->id) ->first();
            $brand     = !empty($product->author_name) ? $product->author_name : 'Brandson';
            $publisher = !empty($product->publisher_name) ? $product->publisher_name : '';
            $discPct   = ($product->mrp > 0 && $product->mrp > $product->sr)
                         ? round((($product->mrp - $product->sr) / $product->mrp) * 100) : 0;
            $size= $getCart?->size ?? '';
          
           
        ?>



  <div class="g-breadcrumb">
    <div class="g-container">
      <nav class="g-breadcrumb-inner">
        <a href="<?php echo e(url('/index')); ?>">HOME</a>
        <i class="ri-arrow-right-s-line"></i>
        <a href="<?php echo e(url('/gaming-products')); ?>">GAMING</a>
        <i class="ri-arrow-right-s-line"></i>
        <span id="gBreadcrumb"><?php echo e(Str::limit(strtoupper($product->name), 40)); ?></span>
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
            <img src="<?php echo e(asset('public/assets/img/items/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>" id="gMainImg" />
          </div>
          <div class="g-thumb-row">
            <button class="g-thumb-btn active"><img src="<?php echo e(asset('public/assets/keyboard.png')); ?>" alt="View 1" /></button>
            <button class="g-thumb-btn"><img src="<?php echo e(asset('public/assets/mouse.png')); ?>" alt="View 2" /></button>
            <button class="g-thumb-btn"><img src="<?php echo e(asset('public/assets/headset.png')); ?>" alt="View 3" /></button>
            <button class="g-thumb-btn"><img src="<?php echo e(asset('public/assets/mousepad.png')); ?>" alt="View 4" /></button>
          </div>
        </div>

        <div class="g-detail-info">

          <?php
            $discPct = ($product->mrp > 0 && $product->mrp > $product->sr) ? round((($product->mrp - $product->sr) / $product->mrp) * 100) : 0;
            $reviewsCount = rand(100, 3000);
          ?>

          <div style="display:flex;gap:0.5rem;margin-bottom:0.875rem;flex-wrap:wrap;">
            <?php if($discPct > 20): ?>
            <span class="g-badge-pill g-badge-hot">🔥 HOT DEAL</span>
            <?php elseif($discPct > 0): ?>
            <span class="g-badge-pill g-badge-discount">🔥 BEST SELLER</span>
            <?php else: ?>
            <span class="g-badge-pill g-badge-new">// NEW 2026</span>
            <?php endif; ?>
          </div>

          <div class="g-detail-eyebrow" id="gDetailBrand"><?php echo e(strtoupper($product->author_name ?? 'Brandson')); ?></div>
          <h1 class="g-detail-title" id="gDetailTitle"><?php echo e($product->name); ?></h1>

          <div class="g-detail-rating">
            <span class="g-stars" id="gDetailStars">★★★★½</span>
            <span id="gDetailReviews">4.5 · <?php echo e(number_format($reviewsCount)); ?> reviews</span>
            <span style="font-family:var(--g-font);font-size:0.6rem;color:var(--g-green);letter-spacing:0.08em;">✓ VERIFIED SELLER</span>
          </div>

          <div class="g-price-box">
            <span class="g-price-main" id="gDetailPrice">₹<?php echo e(number_format($product->sr, 2)); ?></span>
            <?php if($product->mrp > $product->sr): ?>
            <div class="g-price-row" style="margin-bottom:0.5rem;">
              <span class="g-price-orig" id="gDetailOriginal">₹<?php echo e(number_format($product->mrp, 2)); ?></span>
              <span class="g-price-save-tag" id="gDetailSave">SAVE <?php echo e($discPct); ?>%</span>
            </div>
            <?php endif; ?>
            <div class="g-emi">EMI from <strong>₹<?php echo e(round($product->sr / 6)); ?>/month</strong> · 0% interest · <a href="#" style="color:var(--g-cyan);font-family:var(--g-font);font-size:0.65rem;">SEE OFFERS</a></div>
          </div>

          <div class="g-stock">
            <?php if($product->stock == 0): ?>
              <div class="g-stock-dot" style="background:var(--g-red);box-shadow:0 0 10px var(--g-red);"></div>
              <span class="g-stock-text" style="color:var(--g-red);">OUT OF STOCK</span>
            <?php elseif($product->stock < 5): ?>
              <div class="g-stock-dot" style="background:var(--g-yellow);box-shadow:0 0 10px var(--g-yellow);"></div>
              <span class="g-stock-text" style="color:var(--g-yellow);">LOW STOCK</span>
              <span class="g-stock-low">— ONLY <?php echo e($product->stock); ?> UNITS LEFT</span>
            <?php else: ?>
              <div class="g-stock-dot"></div>
              <span class="g-stock-text">IN STOCK</span>
            <?php endif; ?>
          </div>

         
          <div>
            
           
          </div>

          <div>
           
            
          </div>

    

          <div class="g-detail-cta">
              <?php if($inCart): ?>
                       <a href="<?php echo e(url('cart')); ?>" class="g-btn g-btn-hot" style="flex:1;justify-content:center;text-decoration:none;">
              <i class="ri-flashlight-fill"></i> VIEW CART
            </a>
                        <?php else: ?>
                         <button class="g-btn g-btn-primary add-to-cart" data-id="<?php echo e($product->id); ?>" style="flex:1;justify-content:center;">
              <i class="ri-shopping-cart-line"></i> ADD TO CART
            </button>
                        <?php endif; ?>
           
           
            <!-- <button class="g-btn g-btn-ghost" id="gWishBtn" style="padding:0.875rem 1rem;">
              <i class="ri-heart-line"></i>
            </button> -->
          </div>

          
         

          <div class="g-trust-mini">
            <div class="g-trust-badge cyan"><i class="ri-truck-line"></i> FREE DELIVERY</div>
            <div class="g-trust-badge green"><i class="ri-exchange-line"></i> 7-DAY RETURNS</div>
            <div class="g-trust-badge yellow"><i class="ri-shield-check-line"></i> 2-YR WARRANTY</div>
            <div class="g-trust-badge purple"><i class="ri-secure-payment-line"></i> SECURE PAY</div>
          </div>

         
        </div>
      </div>

      <div class="g-tabs">
        <div class="g-tab-nav">
          <button class="g-tab-btn active" data-tab="description">// DESCRIPTION</button>
       
        </div>

        <div class="g-tab-panel active" id="g-tab-description">
          <div style="max-width:780px;">
            <div class="g-section-eyebrow" style="margin-bottom:0.75rem;">PRODUCT OVERVIEW</div>
            <h3 style="font-family:var(--g-font);font-size:1rem;font-weight:700;text-transform:uppercase;color:#e0e8ff;margin-bottom:1rem;letter-spacing:0.04em;">About <?php echo e($product->name); ?></h3>
            <div style="color:#667788;line-height:1.8;margin-bottom:2rem;font-family:var(--g-font-body);">
              <?php echo $product->description ?? 'Experience premium gaming with this incredible new product. Designed for precision and built for durability, it helps you reach peak performance in any match.'; ?>

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
        <a href="<?php echo e(url('/gaming-products')); ?>" class="g-view-all">VIEW ALL GAMING <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="g-product-grid"  style="grid-template-columns:repeat(4,1fr);">

       <?php $__currentLoopData = $fastmovingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <article class="g-product-card" data-id="<?php echo e($p->id); ?>">
          <div class="g-card-line"></div>
          <div class="g-card-img-wrap">
           
           
            <img src="<?php echo e(asset('public/assets/img/items/'.$p->image)); ?>" alt="<?php echo e($p->name); ?>" class="g-card-img" loading="lazy" />
         
            <div class="g-card-overlay">
              
             <a href="<?php echo e(url('gaming-product-detail/'.$p->slug)); ?>"> <button class="g-overlay-view" data-id="<?php echo e($p->id); ?>">Quick View </button> </a>
            </div>
          </div>
          <div class="g-card-info">
            <div class="g-card-brand"><?php echo e($p->author_name); ?></div>
            <div class="g-card-name"><?php echo e($p->name); ?></div>
          
            <div class="g-card-price-row">
              <div>
                <span class="g-price-main"><?php echo e($p->sr); ?></span>
                <span class="g-price-original"><?php echo e($p->mrp); ?></span>
              </div>
              <span class="g-price-save">-${save}%</span>
            </div>
          </div>
        </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </section>

  <div class="g-toast" id="gToast"><i class="ri-terminal-box-line"></i><span id="gToastMsg">// ITEM ADDED</span></div>
  <button class="g-back-top" id="gBackTop"><i class="ri-arrow-up-line"></i></button>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gaminglayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ebook\resources\views/web/gaming-product-detail.blade.php ENDPATH**/ ?>