<!DOCTYPE html>
<html lang="en">
     <?php echo $__env->make('layouts.gamingpartials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<body class="gaming-page">

 <?php echo $__env->make('layouts.gamingpartials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  
 <?php echo $__env->yieldContent('content'); ?> 

   <?php echo $__env->make('layouts.gamingpartials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html>



<?php /**PATH C:\xampp\htdocs\ebook\resources\views/layouts/gaminglayout.blade.php ENDPATH**/ ?>