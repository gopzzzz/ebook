<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>

<?php echo $__env->make('layouts.partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">


                <?php echo $__env->make('layouts.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                 <div class="layout-page">

                
                <?php echo $__env->make('layouts.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
                

          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
                
                <?php echo $__env->yieldContent('content'); ?> 

                      </div>

                
                
                <?php echo $__env->make('layouts.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>


   <?php echo $__env->make('layouts.partials.footer-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>



  </body>
</html>
<?php /**PATH C:\xampp\htdocs\ebook\resources\views/layouts/mainlayout.blade.php ENDPATH**/ ?>