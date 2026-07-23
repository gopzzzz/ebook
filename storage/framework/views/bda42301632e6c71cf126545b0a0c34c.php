<header class="g-header" id="gHeader">
    <div class="g-header-inner g-container">
      <a href="<?php echo e(url('/')); ?>" class="g-logo">
        <img src="<?php echo e(asset('public/uploads/profile/'.$app_profile->logo)); ?>" alt="Pouch Gallery" class="g-logo-img" />
       
      </a>
    
      <div class="g-actions">
        <a href="<?php echo e(url('/index')); ?>" class="g-action-btn" title="Back to Store"><i class="ri-store-line"></i></a>
        
          <?php if(Auth::check()): ?>
           <a href="<?php echo e(url('userprofile')); ?>" class="g-action-btn"><i class="ri-user-line"></i></a>
          
                  
                <?php else: ?>
                <a href="<?php echo e(url('userlogin')); ?>" class="g-action-btn"><i class="ri-user-line"></i></a>
              
                 
                <?php endif; ?>
       
        <a href="<?php echo e(url('cart')); ?>" class="g-action-btn"><i class="ri-shopping-cart-line"></i><span class="g-badge" id="carts"><?php echo e($cartCount); ?></span></a>
        <button class="g-mobile-menu-btn" id="gMenuBtn"><span></span><span></span><span></span></button>
      </div>
    </div>
    
    <nav class="g-nav" id="gNav">
      <div class="g-nav-inner g-container">
        <a href="<?php echo e(url('/index')); ?>" class="g-nav-link home-link"><i class="ri-arrow-left-line"></i> Main Store</a>
         <?php $__currentLoopData = $gamecategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(url('gaming-products/'.$gcat->id)); ?>" class="g-nav-link "><i class="ri-gamepad-line"></i> <?php echo e($gcat->category_name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
      </div>
    </nav>
  </header><?php /**PATH C:\xampp\htdocs\ebook\resources\views/layouts/gamingpartials/header.blade.php ENDPATH**/ ?>