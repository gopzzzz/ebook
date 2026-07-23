<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('layouts.webpartials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<body>

    <div id="header-wrap">
        <?php echo $__env->make('layouts.webpartials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layouts.webpartials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('layouts.webpartials.footerscript', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\ebook\resources\views/layouts/weblayout.blade.php ENDPATH**/ ?>