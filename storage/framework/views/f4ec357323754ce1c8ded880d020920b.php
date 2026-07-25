<h3>Search Results for "<?php echo e($keyword); ?>"</h3>

<?php if($products->count()): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product">
            <h5><?php echo e($product->name); ?></h5>
            <p><?php echo e($product->author_name); ?></p>
            <p><?php echo e($product->category_name); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ebook\resources\views/search-results.blade.php ENDPATH**/ ?>