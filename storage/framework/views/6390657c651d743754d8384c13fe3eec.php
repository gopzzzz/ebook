<?php $__env->startSection('content'); ?>

<style>
.pd-page { background: #f1f3f6; padding: 0 0 48px; }

.pd-breadcrumb { background: #fff; border-bottom: 1px solid #e8e8e8; padding: 11px 0; }
.pd-breadcrumb-inner {
    max-width: 1280px; margin: 0 auto; padding: 0 16px;
    font-size: 13px; color: #777; display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
}
.pd-breadcrumb-inner a { color: #555; text-decoration: none; }
.pd-breadcrumb-inner a:hover { color: #2874f0; }

.pd-wrap { max-width: 1280px; margin: 0 auto; padding: 20px 16px 0; }

.pd-main {
    display: grid; grid-template-columns: 420px 1fr;
    gap: 16px; align-items: start; margin-bottom: 16px;
}

/* Image Panel */
.pd-img-panel {
    background: #fff; border: 1px solid #ddd; border-radius: 3px;
    overflow: hidden; position: sticky; top: 16px;
}
.pd-img-main-wrap {
    display: flex; align-items: center; justify-content: center;
    padding: 30px; min-height: 360px; overflow: hidden;
}
.pd-img-main {
    max-width: 100%; max-height: 360px;
    object-fit: contain; display: block;
    transition: transform 0.35s ease;
}
.pd-img-main-wrap:hover .pd-img-main { transform: scale(1.06); }

.pd-img-btn-row { display: flex; }
.pd-atc-btn, .pd-bn-btn {
    flex: 1; padding: 14px 10px; border: none;
    font-size: 14px; font-weight: 700; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    gap: 7px; transition: background 0.2s;
}
.pd-atc-btn { background: #ff9f00; color: #fff; }
.pd-atc-btn:hover { background: #e08e00; }
.pd-bn-btn { background: #fb641b; color: #fff; }
.pd-bn-btn:hover { background: #e05a16; }

/* Info Panel */
.pd-info-panel { display: flex; flex-direction: column; gap: 12px; }

.pd-info-main {
    background: #fff; border: 1px solid #ddd;
    border-radius: 3px; padding: 24px;
}

.pd-brand { font-size: 13px; font-weight: 700; color: #2874f0; text-transform: uppercase; margin-bottom: 5px; display: block; }
.pd-name { font-size: 22px; font-weight: 500; color: #212121; line-height: 1.35; margin-bottom: 6px; }
.pd-publisher { font-size: 13px; color: #878787; margin-bottom: 12px; }

.pd-rating-row { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; padding-bottom: 14px; border-bottom: 1px solid #f0f0f0; }
.pd-rating-chip {
    display: inline-flex; align-items: center; gap: 4px;
    background: #388e3c; color: #fff; font-size: 13px; font-weight: 700; padding: 3px 9px; border-radius: 3px;
}
.pd-rating-chip i { font-size: 10px; }
.pd-rating-count, .pd-verified-tag { font-size: 13px; color: #878787; }
.pd-rating-divider { color: #ddd; }

.pd-stock-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 13px; font-weight: 600; color: #388e3c; margin-bottom: 14px; }
.pd-stock-badge i { font-size: 12px; }

.pd-price-section { margin-bottom: 18px; padding-bottom: 18px; border-bottom: 1px solid #f0f0f0; }
.pd-price-lbl { font-size: 13px; color: #878787; margin-bottom: 5px; }
.pd-price-row { display: flex; align-items: baseline; gap: 12px; flex-wrap: wrap; }
.pd-sp { font-size: 28px; font-weight: 700; color: #212121; }
.pd-mrp { font-size: 16px; color: #878787; text-decoration: line-through; }
.pd-off { font-size: 16px; font-weight: 700; color: #388e3c; }
.pd-emi-txt { font-size: 13px; color: #212121; margin-top: 5px; }
.pd-emi-txt a { color: #2874f0; font-weight: 600; text-decoration: none; }

/* Color selector */
.pd-sel-section { margin-bottom: 18px; }
.pd-sel-label {
    font-size: 14px; font-weight: 700; color: #212121;
    margin-bottom: 10px; display: flex; align-items: center; justify-content: space-between;
}
.pd-sel-label span { font-weight: 400; color: #878787; font-size: 13px; }
.pd-size-chart { font-size: 12px; color: #2874f0; font-weight: 600; text-decoration: none; }

.pd-colors { display: flex; gap: 10px; flex-wrap: wrap; }
.pd-color-item { display: flex; flex-direction: column; align-items: center; cursor: pointer; }
.pd-color-circle {
    width: 34px; height: 34px; border-radius: 50%;
    border: 2px solid transparent; transition: all 0.15s;
}
.pd-color-item:hover .pd-color-circle { transform: scale(1.08); }
.pd-color-item.selected .pd-color-circle { outline: 2px solid #2874f0; outline-offset: 2px; }
.pd-color-name { font-size: 11px; color: #555; margin-top: 3px; }

/* Size selector */
.pd-sizes { display: flex; gap: 8px; flex-wrap: wrap; }
.pd-size-btn {
    width: 50px; height: 50px; border-radius: 50%;
    border: 1px solid #c2c2c2; background: #fff;
    font-size: 13px; font-weight: 600; color: #212121;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    transition: all 0.15s;
}
.pd-size-btn:hover { border-color: #2874f0; color: #2874f0; }
.pd-size-btn.selected { border-color: #2874f0; background: #e8f0fe; color: #2874f0; font-weight: 700; }

/* Seller section */
.pd-seller-row { padding-bottom: 16px; border-bottom: 1px solid #f0f0f0; margin-bottom: 16px; }
.pd-seller-lbl { font-size: 12px; color: #878787; margin-bottom: 3px; }
.pd-seller-name { font-size: 14px; font-weight: 700; color: #2874f0; }
.pd-seller-tag {
    display: inline-block; font-size: 11px; font-weight: 600;
    background: #e8f5e9; color: #388e3c; padding: 2px 7px; border-radius: 2px; margin-left: 6px;
}

.pd-trust-row { display: flex; gap: 16px; flex-wrap: wrap; }
.pd-trust-item { display: flex; align-items: center; gap: 5px; font-size: 13px; color: #555; }

/* Offers Panel */
.pd-offers-panel { background: #fff; border: 1px solid #ddd; border-radius: 3px; padding: 20px 22px; }
.pd-offers-title { font-size: 15px; font-weight: 700; color: #212121; margin-bottom: 14px; }
.pd-offer-item { display: flex; align-items: flex-start; gap: 10px; font-size: 13px; color: #212121; margin-bottom: 12px; line-height: 1.5; }
.pd-offer-item:last-child { margin-bottom: 0; }
.pd-offer-ic { width: 20px; height: 20px; background: #e8f5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px; }
.pd-offer-ic i { font-size: 9px; color: #388e3c; }
.pd-offer-type { font-weight: 700; }

/* Delivery Panel */
.pd-del-panel { background: #fff; border: 1px solid #ddd; border-radius: 3px; padding: 20px 22px; }
.pd-del-title { font-size: 15px; font-weight: 700; color: #212121; margin-bottom: 14px; }
.pd-pin-row { display: flex; gap: 8px; margin-bottom: 12px; }
.pd-pin-input { flex: 1; padding: 9px 12px; border: 1px solid #c2c2c2; border-radius: 3px; font-size: 14px; color: #212121; outline: none; }
.pd-pin-input:focus { border-color: #2874f0; }
.pd-pin-btn { padding: 9px 18px; background: #fff; border: 1px solid #2874f0; color: #2874f0; border-radius: 3px; font-size: 13px; font-weight: 700; cursor: pointer; }
.pd-pin-btn:hover { background: #e8f0fe; }
.pd-del-info { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #212121; margin-bottom: 8px; }
.pd-del-info i { color: #388e3c; }

/* Description */
.pd-desc-panel { background: #fff; border: 1px solid #ddd; border-radius: 3px; overflow: hidden; margin-bottom: 16px; }
.pd-desc-head { padding: 14px 22px; background: #fafafa; border-bottom: 1px solid #f0f0f0; }
.pd-desc-head-title { font-size: 13px; font-weight: 700; color: #212121; text-transform: uppercase; letter-spacing: 0.3px; }
.pd-desc-body { padding: 20px 22px; font-size: 14px; color: #444; line-height: 1.8; }

/* Related Products */
.pd-related-panel { background: #fff; border: 1px solid #ddd; border-radius: 3px; overflow: hidden; }
.pd-related-head { padding: 14px 22px; background: #fafafa; border-bottom: 1px solid #f0f0f0; }
.pd-related-title { font-size: 13px; font-weight: 700; color: #212121; text-transform: uppercase; }
.pd-related-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 1px; background: #f0f0f0; }
.pd-related-item { background: #fff; padding: 16px; display: flex; flex-direction: column; align-items: center; text-align: center; text-decoration: none; transition: background 0.15s; }
.pd-related-item:hover { background: #f9f9f9; }
.pd-related-item img { width: 100%; aspect-ratio: 3/4; object-fit: cover; margin-bottom: 8px; }
.pd-related-item-name { font-size: 12px; color: #212121; line-height: 1.4; margin-bottom: 4px; }
.pd-related-item-price { font-size: 13px; font-weight: 700; color: #212121; }

@media (max-width: 980px) {
    .pd-main { grid-template-columns: 1fr; }
    .pd-img-panel { position: static; }
    .pd-related-grid { grid-template-columns: repeat(2,1fr); }
}
@media (max-width: 540px) {
    .pd-name { font-size: 18px; }
    .pd-sp { font-size: 22px; }
    .pd-info-main { padding: 16px; }
    .pd-img-main-wrap { padding: 20px; min-height: 260px; }
}
.pd-size-btn.disabled-size {
    opacity: 0.5;
    cursor: not-allowed;
    position: relative;
}

.pd-size-btn.disabled-size::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 10%;
    width: 80%;
    height: 2px;
    background: red;
    transform: rotate(-20deg);
}
</style>



<div class="pd-breadcrumb">
    <div class="pd-breadcrumb-inner">
        <a href="<?php echo e(url('index')); ?>">Home</a>
        <span>›</span>
        <a href="<?php echo e(url('product-list')); ?>">Products</a>
        <span>›</span>
        <span style="color:#212121;font-weight:500;"><?php echo e(Str::limit($product->name, 40)); ?></span>
    </div>
</div>

<div class="pd-page">
    <div class="pd-wrap">
        <?php
            $inCart    = in_array($product->id, $cartProductIds);
            $getCart = collect($cartItems) ->where('product_id', $product->id) ->first();
            $brand     = !empty($product->author_name) ? $product->author_name : 'Brandson';
            $publisher = !empty($product->publisher_name) ? $product->publisher_name : '';
            $discPct   = ($product->mrp > 0 && $product->mrp > $product->sr)
                         ? round((($product->mrp - $product->sr) / $product->mrp) * 100) : 0;
            $size= $getCart?->size ?? '';
          
           
        ?>

        <div class="pd-main">

            
            <div class="pd-img-panel">
                <div class="pd-img-main-wrap">
                    <img src="<?php echo e(asset('public/assets/img/items/'.$product->image)); ?>"
                         alt="<?php echo e($product->name); ?>" class="pd-img-main">
                </div>
                <div class="pd-img-btn-row">
                     <?php if($inCart): ?>
                        <?php if($product->stock != 0): ?>
                     <button type="button" class="pd-bn-btn pd-buynow-btn" data-id="<?php echo e($product->id); ?>">
                       <a href="<?php echo e(url('cart')); ?>"> <span class="pd-bn-text"><i class="fa-solid fa-bolt"></i>GO TO CART</span></a>
                       
                    </button>
                      
                        <?php endif; ?>
                      <?php else: ?>

                       <?php if($product->stock != 0): ?>
                  
                     <button type="button" class="pd-atc-btn add-to-cart" data-id="<?php echo e($product->id); ?>" data-action="cart">
                        <span class="btn-text"><i class="fa-solid fa-cart-plus"></i> ADD TO CART</span>
                        <!-- <span class="btn-loader d-none"><i class="fa fa-spinner fa-spin"></i> Loading...</span> -->
                    </button>
                     <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="pd-info-panel">
                <div class="pd-info-main">

                    <span class="pd-brand"><?php echo e($brand); ?></span>
                    <h1 class="pd-name"><?php echo e($product->name); ?></h1>

                    <?php if($publisher): ?>
                    <div class="pd-publisher"><?php echo e($publisher); ?></div>
                    <?php endif; ?>

                    <div class="pd-rating-row">
                        <div class="pd-rating-chip">4.1 <i class="fa-solid fa-star"></i></div>
                        <span class="pd-rating-count">1,248 Ratings</span>
                        <span class="pd-rating-divider">|</span>
                        <span class="pd-verified-tag">256 Reviews</span>
                    </div>

                    <?php if($product->stock == 0): ?>
    <div class="pd-stock-badge text-danger">
        <i class="fa-solid fa-circle-xmark"></i> Out of Stock
    </div>
<?php elseif($product->stock < 5): ?>
    <div class="pd-stock-badge text-warning">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Low Stock (Only <?php echo e($product->stock); ?> left)
    </div>
<?php else: ?>
    <div class="pd-stock-badge text-success">
        <i class="fa-solid fa-circle-check"></i>
        In Stock 
    </div>
<?php endif; ?>

                    <div class="pd-price-section">
                        <div class="pd-price-lbl">Special Price</div>
                        <div class="pd-price-row">
                           
                            <span class="pd-sp">₹<?php echo e(number_format($product->sr, 2)); ?></span>
                            <?php if($product->mrp > $product->sr): ?>
                            <span class="pd-mrp">₹<?php echo e(number_format($product->mrp, 2)); ?></span>
                            <?php if($discPct > 0): ?>
                            <span class="pd-off"><?php echo e($discPct); ?>% off</span>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php
    $hasSize = $varient_types->contains(function($item){
        return stripos($item->varient_name, 'size') !== false;
    });
?>
                    <input type="hidden" id="has_size" value="<?php echo e($hasSize ? 1 : 0); ?>">
                    <input type="hidden" id="sizeselection" value="<?php echo e($size ?? 0); ?>"> 
                    <input type="hidden" id="color" value="<?php echo e($size ?? 0); ?>">

                    <?php $__currentLoopData = $varient_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $varients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php
        $attributeIds = explode(',', $varients->attribute_id);
    ?>

    <?php if(stripos($varients->varient_name, 'color') !== false): ?>

        <div class="pd-sel-section">
            <div class="pd-sel-label">
                <?php echo e(ucfirst($varients->varient_name)); ?>

            </div>

            <div class="pd-colors" id="pdColors">

                <?php $__currentLoopData = $attributeIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $attributeId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                        $attr = DB::table('product_attributes')
                            ->where('id', $attributeId)
                            ->first();
                    ?>

                    <?php if($attr): ?>

                    
                        <div class="pd-color-item <?php echo e($i == 0 ? 'selected' : ''); ?>"
                             onclick="pdSelectColor(this,'<?php echo e($attr->name); ?>')">

                            <div class="pd-color-circle"
                                 style="background:<?php echo e($attr->value); ?>;">
                            </div>

                            <div class="pd-color-name">
                                <?php echo e($attr->name); ?>

                            </div>

                        </div>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>

    <?php else: ?>

        <div class="pd-sel-section">

            <div class="pd-sel-label">
                <?php echo e(ucfirst($varients->varient_name)); ?>

                <span id="pdVariant<?php echo e($varients->id); ?>">:</span>
            </div>

            
          
            
           
           
           

            <?php
    $allattributes = DB::table('product_attributes')
        ->where('varient_id', 2)
        ->get();

    $availableIds = collect($attributeIds)->map(fn($id) => (int) $id)->toArray();
?>

<div class="pd-sizes">
    

    <?php $__currentLoopData = $allattributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
            $isAvailable = in_array($attr->id, $availableIds);
        ?>

       <button
    class="pd-size-btn <?php echo e($isAvailable ? '' : 'disabled-size'); ?> <?php echo e((isset($size) && $size == $attr->value) ? 'selected' : ''); ?>"
    type="button"
    data-id="<?php echo e($attr->value); ?>"
    <?php echo e($isAvailable ? "onclick=pdSelectSize(this,'{$attr->value}')" : 'disabled'); ?>

>
    <?php echo e($attr->value); ?>

</button>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

        </div>

    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    

                    
                    

                    
                    <div class="pd-seller-row">
                        <div class="pd-seller-lbl">Sold by</div>
                        <div>
                            <span class="pd-seller-name"><?php echo e($brand); ?></span>
                            <span class="pd-seller-tag">✓ Trusted</span>
                        </div>
                    </div>

                    <div class="pd-trust-row">
                        <div class="pd-trust-item"><i class="fa-solid fa-arrow-rotate-left" style="color:#2874f0;"></i> 7 Days Return</div>
                    </div>
                </div>

                

                


            </div>
        </div>

        
        <div class="pd-desc-panel">
            <div class="pd-desc-head">
                <div class="pd-desc-head-title">Product Description</div>
            </div>
            <div class="pd-desc-body"><?php echo e($product->description); ?></div>
        </div>

        
        <?php if(isset($fastmovingProducts) && count($fastmovingProducts)): ?>
        <div class="pd-related-panel">
            <div class="pd-related-head">
                <div class="pd-related-title">You May Also Like</div>
            </div>
             <div class="product-grid" >
        <?php $__currentLoopData = $fastmovingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<article class="product-card" data-id="<?php echo e($p->id); ?>" role="button" tabindex="0" aria-label="<?php echo e($p->name); ?>">
   
    <div class="product-img-wrap">

       

        
      <img src="<?php echo e(asset('public/assets/img/items/'.$p->image)); ?>" alt="<?php echo e($p->name); ?>" loading="lazy"> 

        <div class="product-overlay" aria-hidden="true">
            <!-- <button class="overlay-btn add-to-cart overlay-cart" data-id="<?php echo e($p->id); ?>">
                <i class="ri-shopping-cart-line"></i> Add to Cart
            </button> -->

             <a href="<?php echo e(url('product/'.$p->slug)); ?>"><button class="overlay-btn overlay-view" data-id="<?php echo e($p->id); ?>">
                <i class="ri-eye-line"></i> Quick View
            </button></a>
        </div>
    </div>

    <div class="product-info">

        <div class="product-brand">
            <?php echo e($p->author_name); ?>

        </div>

        <div class="product-name">
            <?php echo e($p->name); ?>

        </div>

        <div class="product-rating">
            <span class="stars-display">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php if($i <= floor(5)): ?>
                        <i class="ri-star-fill"></i>
                    <?php else: ?>
                        <i class="ri-star-line"></i>
                    <?php endif; ?>
                <?php endfor; ?>
            </span>

            <span class="rating-count">
                5 
            </span>
        </div>

        <div class="product-price-row">
            <div>
                <span class="price-main">
                    ₹<?php echo e(number_format($p->sr, 2)); ?>

                </span>

                <span class="price-original">
                    ₹<?php echo e(number_format($p->mrp, 2)); ?>

                </span>
            </div>

            <span class="price-save">
                Save ₹<?php echo e(number_format($p->mrp - $p->sr, 2)); ?>

            </span>
        </div>

    </div>
</article>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<script>
function pdSelectColor(el, name) {
    document.querySelectorAll('.pd-color-item').forEach(function(c){ c.classList.remove('selected'); });
    el.classList.add('selected');
    document.getElementById('pdColorVal').textContent = ': ' + name;
}
function pdSelectSize(el, size) {
    document.querySelectorAll('.pd-size-btn').forEach(function(b){ b.classList.remove('selected'); });
    el.classList.add('selected');
    document.getElementById('pdSizeVal').textContent = ': ' + size;
}
function pdCheckPin() {
    var pin = document.getElementById('pdPinInput').value.trim();
    if(pin.length === 6 && /^\d{6}$/.test(pin)){
        alert('Great! Free delivery available at pincode ' + pin + ' within 2-3 business days.');
    } else {
        alert('Please enter a valid 6-digit pincode.');
    }
}

// Buy Now: add to cart then redirect to shipping
$(document).ready(function(){
    $('.pd-buynow-btn').on('click', function(){
        var btn = $(this);
        var id  = btn.data('id');
        if(!id) return;

        btn.find('.pd-bn-text').addClass('d-none');
        btn.find('.pd-bn-loader').removeClass('d-none');
        btn.prop('disabled', true);

        $.ajax({
            type: 'POST',
            url: '<?php echo e(route("add-to-cart")); ?>',
            data: { _token: '<?php echo e(csrf_token()); ?>', id: id },
            success: function(res){
                if(res.status == 0){
                    $('#carts').text(res.count);
                    window.location.href = '<?php echo e(url("shipping_details")); ?>';
                } else if(res.status == 1){
                    window.location.href = '<?php echo e(url("userlogin")); ?>';
                }
            },
            error: function(){
                alert('Something went wrong. Please try again.');
                btn.find('.pd-bn-text').removeClass('d-none');
                btn.find('.pd-bn-loader').addClass('d-none');
                btn.prop('disabled', false);
            }
        });
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.weblayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ebook\resources\views/web/product.blade.php ENDPATH**/ ?>