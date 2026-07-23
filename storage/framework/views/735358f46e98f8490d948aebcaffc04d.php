  <!-- <div class="announcement-bar" id="announcementBar">
    <div class="announcement-inner">
      <span>🎮 Free Shipping on Orders above ₹999</span>
      <span class="sep">|</span>
      <span>⚡ Use code <strong>POUCH10</strong> for 10% off</span>
      <span class="sep">|</span>
      <span>🏆 Official Dealer – 100% Authentic Products</span>
    </div>
    <button class="ann-close" id="annClose" aria-label="Close announcement"><i class="ri-close-line"></i></button>
  </div> -->

  <header class="site-header" id="siteHeader">
    <div class="header-inner">

      <a href="<?php echo e(url('/')); ?>" class="logo-link" aria-label="Pouch Gallery Home">
        <img src="<?php echo e(asset('public/uploads/profile/'.$app_profile->logo)); ?>" alt="Pouch Gallery Logo" class="logo-img" />
       
      </a>

      <div class="header-search" id="headerSearch">
        <i class="ri-search-line search-icon"></i>
        <input type="search" placeholder="Search products, brands..." id="searchInput" autocomplete="off" />
        <button class="search-btn" aria-label="Search">Search</button>
      </div>

      <div class="header-actions">
       
        

          <?php if(Auth::check()): ?>
          <a href="<?php echo e(url('userprofile')); ?>" class="hdr-btn" aria-label="Account">
          <i class="ri-user-line"></i>
        </a>
                  
                <?php else: ?>
                <a href="<?php echo e(url('userlogin')); ?>" class="hdr-btn" aria-label="Account">
          <i class="ri-user-line"></i>
        </a>
                 
                <?php endif; ?>

        <a href="<?php echo e(url('cart')); ?>" class="hdr-btn cart-btn" aria-label="Cart">
          <i class="ri-shopping-cart-line"></i>
          <span class="badge" id="carts"><?php echo e($cartCount); ?></span>
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
            <a href="<?php echo e(url('/')); ?>" class="nav-link active">Home</a>
          </li>
          <!-- <li class="nav-item has-dropdown">
            <a href="<?php echo e(url('/gaming-products')); ?>" class="nav-link">
              🎮 Gaming <i class="ri-arrow-down-s-line"></i>
            </a>
            <div class="mega-dropdown">
              <div class="mega-inner">
                <div class="mega-col">
                  <h4>Peripherals</h4>
                  <a href="<?php echo e(url('/gaming-products?cat=keyboards')); ?>">Mechanical Keyboards</a>
                  <a href="<?php echo e(url('/gaming-products?cat=mice')); ?>">Gaming Mice</a>
                  <a href="<?php echo e(url('/gaming-products?cat=headsets')); ?>">Headsets</a>
                  <a href="<?php echo e(url('/gaming-products?cat=mousepads')); ?>">Mousepads</a>
                  <a href="<?php echo e(url('/gaming-products?cat=controllers')); ?>">Controllers</a>
                </div>
                <div class="mega-col">
                  <h4>Gear</h4>
                  <a href="<?php echo e(url('/gaming-products?cat=chairs')); ?>">Gaming Chairs</a>
                  <a href="<?php echo e(url('/gaming-products?cat=monitors')); ?>">Monitors</a>
                  <a href="<?php echo e(url('/gaming-products?cat=webcams')); ?>">Webcams</a>
                  <a href="<?php echo e(url('/gaming-products?cat=cables')); ?>">Cables & Hubs</a>
                </div>
                <div class="mega-col mega-featured">
                  <h4>Featured Deal</h4>
                  <a href="<?php echo e(url('/gaming-product/1')); ?>" class="mega-feature-card">
                    <img src="<?php echo e(asset('public/assets/keyboard.png')); ?>" alt="RGB Keyboard" />
                    <div>
                      <strong>RGB Pro Keyboard</strong>
                      <span>₹3,499 <del>₹5,999</del></span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </li> -->
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="nav-item has-dropdown">
            
            <a href="<?php echo e(url('')); ?>" class="nav-link"><?php echo e($ty->name); ?><i class="ri-arrow-down-s-line"></i></a>
             <?php 
              $subcat=DB::table('categories')->where('main_id',$ty->id)->get();
             ?>
            <div class="dropdown">
              <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo e(url('gaming-products/'.$item->id)); ?>"><?php echo e($item->category_name); ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $catlimit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="nav-item">
            <a href="<?php echo e(url('productlist/'.$cat->id)); ?>" class="nav-link"><?php echo e($cat->category_name); ?></a>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </ul>
      </div>
    </nav>
  </header>
<?php /**PATH C:\xampp\htdocs\ebook\resources\views/layouts/webpartials/header.blade.php ENDPATH**/ ?>