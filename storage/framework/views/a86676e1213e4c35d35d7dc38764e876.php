<?php $__env->startSection('content'); ?>

<style>
/* keep all old classes */
.shipping-wrapper{max-width:1200px;margin:50px auto;padding:0 15px;}
.shipping-header{margin-bottom:40px;}
.shipping-title{font-size:32px;font-weight:800;color:#1a1a1a;margin:0 0 20px 0;}
.checkout-grid{display:grid;grid-template-columns:1fr 1fr;gap:40px;}
.shipping-section{background:#fff;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.08);border:1px solid #f0f0f0;padding:30px;}
.section-title{font-size:18px;font-weight:700;color:#1a1a1a;margin-bottom:25px;}
.address-list{display:flex;flex-direction:column;gap:12px;margin-bottom:25px;}
.address-option{background:#f9f9f9;border:2px solid #e5e5e5;border-radius:6px;padding:16px;cursor:pointer;transition:all 0.3s ease;display:flex;align-items:flex-start;gap:12px;}
.address-option:hover{border-color:#F59E0B;background:#fffbf0;}
.address-option input[type="radio"]{margin-top:2px;cursor:pointer;width:18px;height:18px;}
.address-text{flex:1;color:#333;font-size:14px;line-height:1.6;}
.address-text strong{display:block;color:#1a1a1a;font-weight:600;margin-bottom:4px;}
.address-location{color:#666;margin-bottom:4px;}
.address-phone{color:#999;font-size:13px;}
.add-address-btn{width:100%;background:#fff;color:#F59E0B;padding:11px 16px;border:2px solid #F59E0B;border-radius:6px;font-weight:600;cursor:pointer;transition:all 0.3s ease;font-size:14px;}
.add-address-btn:hover{background:#F59E0B;color:#fff;}
.order-items{display:flex;flex-direction:column;gap:12px;margin-bottom:25px;}
.order-item{display:flex;gap:16px;align-items:flex-start;padding:16px;background:#f9f9f9;border-radius:6px;border:1px solid #e5e5e5;}
.order-item-image{width:100px;height:100px;flex-shrink:0;background:#e5e5e5;border-radius:4px;overflow:hidden;}
.order-item-image img{width:100%;height:100%;object-fit:cover;}
.order-item-content{flex:1;display:flex;flex-direction:column;justify-content:center;}
.order-item-name{font-size:14px;font-weight:600;color:#1a1a1a;margin-bottom:8px;}
.order-item-qty{font-size:13px;color:#666;margin-bottom:8px;}
.order-item-price{font-size:16px;font-weight:700;color:#1a1a1a;}
.delivery-timeline{background:#f0f5ff;border-left:3px solid #0066cc;padding:16px;border-radius:6px;margin-bottom:15px;}
.delivery-title{font-size:13px;font-weight:700;color:#0066cc;margin-bottom:8px;}
.delivery-date{font-size:14px;color:#1a1a1a;font-weight:600;}
.delivery-subtitle{font-size:12px;color:#666;margin-top:4px;}
.order-summary{background:#f8f9fa;border:1px solid #e0e7ff;border-radius:8px;padding:25px;margin-top:25px;}
.summary-header{font-size:14px;font-weight:700;color:#1a1a1a;margin-bottom:15px;}
.summary-row{display:flex;justify-content:space-between;font-size:13px;color:#333;margin-bottom:10px;line-height:1.6;}
.summary-value{font-weight:600;}
.summary-divider{border-top:1px solid #e0e7ff;margin:12px 0;}
.summary-total-row{display:flex;justify-content:space-between;font-size:16px;font-weight:700;color:#1a1a1a;margin-top:12px;}
.checkout-btn-primary{width:100%;background:#fb641b;color:#fff;padding:14px 16px;border:none;border-radius:3px;font-weight:700;cursor:pointer;margin-top:20px;transition:background 0.2s;font-size:15px;}
.checkout-btn-primary:hover{background:#e05a16;}
.checkout-btn-primary:disabled{background:#ccc;cursor:not-allowed;}
.secure-badge{display:flex;align-items:center;gap:6px;font-size:12px;color:#2e7d32;margin-top:15px;justify-content:center;padding-top:15px;border-top:1px solid #e8e8e8;}
.modal-content{border-radius:8px;border:none;box-shadow:0 5px 15px rgba(0,0,0,0.2);}
.modal-header{background:#f9f9f9;border-bottom:1px solid #e5e5e5;border-radius:8px 8px 0 0;padding:20px;}
.modal-header h5{font-size:18px;font-weight:700;color:#1a1a1a;margin:0;}
.modal-body{padding:24px 20px;}
.modal-body input,.modal-body textarea{width:100%;padding:11px;border:1px solid #e5e5e5;border-radius:6px;font-size:14px;font-family:inherit;color:#333;background:#fafafa;margin-bottom:12px;}
.modal-body input:focus,.modal-body textarea:focus{outline:none;border-color:#F59E0B;background:#fff;box-shadow:0 0 0 3px rgba(245,158,11,0.1);}
.modal-body textarea{resize:vertical;min-height:100px;}
.modal-footer{border-top:1px solid #e5e5e5;padding:16px 20px;display:flex;gap:12px;justify-content:flex-end;}
.btn-secondary,.btn-primary{padding:10px 20px;border-radius:6px;font-weight:600;cursor:pointer;border:none;font-size:14px;transition:all 0.3s ease;}
.btn-secondary{background:#e5e5e5;color:#333;}
.btn-secondary:hover{background:#d9d9d9;}
.btn-primary{background:#F59E0B;color:#fff;}
.btn-primary:hover{background:#e59000;}
.empty-state{text-align:center;padding:40px 20px;color:#999;}
@media(max-width:768px){.checkout-grid{grid-template-columns:1fr;gap:25px;}.shipping-title{font-size:24px;}.shipping-section{padding:20px;}}

/* ── NEW PROFESSIONAL SHIPPING STYLES ── */
.ns-page { background:#f1f3f6; padding:0 0 48px; }
.ns-breadcrumb {
    background:#fff;
    border-bottom:1px solid #e8e8e8;
    padding:12px 0;
    margin-bottom:0;
}
.ns-breadcrumb-inner {
    max-width:1200px; margin:0 auto; padding:0 16px;
    font-size:13px; color:#777;
    display:flex; align-items:center; gap:6px;
}
.ns-breadcrumb-inner a { color:#555; text-decoration:none; }
.ns-breadcrumb-inner a:hover { color:#fb641b; }

.ns-steps-bar {
    background:#fff;
    border-bottom:1px solid #e8e8e8;
    padding:14px 0;
}
.ns-steps-inner {
    max-width:1200px; margin:0 auto; padding:0 16px;
    display:flex; align-items:center; gap:0;
}
.ns-step {
    display:flex; align-items:center; gap:8px;
    font-size:13px; font-weight:500; color:#bbb;
    padding:0 24px 0 0;
}
.ns-step.done { color:#388e3c; }
.ns-step.active { color:#fb641b; font-weight:700; }
.ns-step-num {
    width:22px; height:22px; border-radius:50%;
    border:2px solid currentColor;
    display:flex; align-items:center; justify-content:center;
    font-size:11px; font-weight:800; flex-shrink:0;
}
.ns-step.done .ns-step-num { background:#388e3c; border-color:#388e3c; color:#fff; }
.ns-step.active .ns-step-num { background:#fb641b; border-color:#fb641b; color:#fff; }
.ns-step-sep { flex:0 0 auto; width:40px; height:1px; background:#e0e0e0; margin-right:24px; }

.ns-wrap { max-width:1200px; margin:0 auto; padding:20px 16px 0; }

.ns-layout {
    display:grid;
    grid-template-columns:1fr 360px;
    gap:16px;
    align-items:start;
}

.ns-panel {
    background:#fff;
    border:1px solid #ddd;
    border-radius:3px;
    margin-bottom:12px;
}
.ns-panel-head {
    padding:14px 20px;
    border-bottom:1px solid #f0f0f0;
    display:flex; align-items:center; gap:10px;
}
.ns-panel-head-num {
    width:28px; height:28px; border-radius:50%;
    background:#2874f0; color:#fff;
    font-size:13px; font-weight:700;
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0;
}
.ns-panel-head-title {
    font-size:15px; font-weight:700; color:#212121;
    text-transform:uppercase; letter-spacing:0.3px;
}
.ns-panel-body { padding:20px; }

.ns-addr-option {
    display:flex; align-items:flex-start; gap:14px;
    padding:14px 16px;
    border:1px solid #e0e0e0;
    border-radius:3px;
    margin-bottom:10px;
    cursor:pointer;
    background:#fff;
    transition:border-color 0.2s, background 0.2s;
}
.ns-addr-option:hover { border-color:#2874f0; background:#f5f8ff; }
.ns-addr-option:last-child { margin-bottom:0; }
.ns-addr-option input[type="radio"] {
    margin-top:2px; cursor:pointer;
    accent-color:#2874f0;
    width:17px; height:17px; flex-shrink:0;
}
.ns-addr-name { font-size:14px; font-weight:700; color:#212121; margin-bottom:2px; }
.ns-addr-line { font-size:13px; color:#555; line-height:1.55; }
.ns-addr-pin { font-size:13px; color:#212121; font-weight:500; margin-top:2px; }
.ns-addr-phone { font-size:13px; color:#555; margin-top:3px; }
.ns-addr-tag-default {
    display:inline-block; font-size:11px; font-weight:700;
    color:#2874f0; background:#e8f0fe; padding:2px 8px;
    border-radius:2px; margin-top:5px;
}

.ns-add-addr-btn {
    display:flex; align-items:center; gap:8px;
    width:100%; background:#fff; color:#2874f0;
    padding:12px 16px; border:1px dashed #2874f0;
    border-radius:3px; font-weight:700; cursor:pointer;
    font-size:13px; margin-top:14px;
    transition:background 0.2s;
}
.ns-add-addr-btn:hover { background:#f5f8ff; }

.ns-empty-addr {
    text-align:center; padding:24px; color:#878787; font-size:14px;
}

.ns-right-col { position:sticky; top:16px; }

.ns-order-panel {
    background:#fff; border:1px solid #ddd; border-radius:3px;
}
.ns-order-panel-head {
    padding:14px 20px; border-bottom:1px solid #f0f0f0;
    font-size:12px; font-weight:700; color:#878787;
    text-transform:uppercase; letter-spacing:0.8px;
}

.ns-item-row {
    display:flex; gap:14px; align-items:center;
    padding:14px 20px; border-bottom:1px solid #f5f5f5;
}
.ns-item-row:last-of-type { border-bottom:none; }
.ns-item-thumb {
    width:56px; height:56px; flex-shrink:0;
    border:1px solid #f0f0f0; overflow:hidden;
}
.ns-item-thumb img { width:100%; height:100%; object-fit:cover; }
.ns-item-title { font-size:13px; color:#212121; margin-bottom:3px; line-height:1.4; }
.ns-item-qty-price { font-size:12px; color:#878787; }
.ns-item-price { font-size:14px; font-weight:700; color:#212121; margin-left:auto; flex-shrink:0; }

.ns-price-section { padding:16px 20px; border-top:1px solid #f0f0f0; }
.ns-price-row {
    display:flex; justify-content:space-between;
    font-size:14px; color:#212121; margin-bottom:12px;
}
.ns-price-label { color:#212121; }
.ns-price-val { font-weight:500; color:#212121; }
.ns-price-val.green { color:#388e3c; font-weight:600; }
.ns-price-divider { border:none; border-top:1px dashed #e0e0e0; margin:8px 0 12px; }
.ns-price-total {
    display:flex; justify-content:space-between;
    font-size:16px; font-weight:700; color:#212121; margin-bottom:4px;
}
.ns-savings-pill {
    font-size:13px; color:#388e3c; font-weight:500; margin-bottom:16px;
}
.ns-pay-btn {
    width:100%; background:#fb641b; color:#fff;
    padding:14px; border:none; border-radius:3px;
    font-size:15px; font-weight:700; cursor:pointer;
    transition:background 0.2s;
}
.ns-pay-btn:hover { background:#e05a16; }
.ns-pay-btn:disabled { background:#ccc; cursor:not-allowed; }
.ns-secure-row {
    display:flex; align-items:center; justify-content:center;
    gap:4px; font-size:12px; color:#878787; margin-top:12px;
}
.ns-no-addr-msg {
    font-size:13px; color:#878787; text-align:center;
    padding:14px; background:#fafafa; border:1px dashed #e0e0e0;
    border-radius:3px; margin-top:16px;
}

.ns-modal .modal-content { border-radius:4px; border:1px solid #e0e0e0; }
.ns-modal .modal-header { background:#2874f0; border-radius:4px 4px 0 0; border:none; padding:18px 22px; }
.ns-modal .modal-header h5 { color:#fff; font-size:16px; font-weight:700; }
.ns-modal .modal-body { padding:22px; }
.ns-modal-label { font-size:12px; font-weight:600; color:#555; margin-bottom:5px; display:block; }
.ns-modal-input {
    width:100%; padding:10px 12px; border:1px solid #c2c2c2;
    border-radius:3px; font-size:14px; color:#212121;
    background:#fff; margin-bottom:14px; box-sizing:border-box;
    font-family:inherit; transition:border-color 0.2s;
}
.ns-modal-input:focus { outline:none; border-color:#2874f0; box-shadow:0 0 0 3px rgba(40,116,240,0.1); }
.ns-modal-row { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
.ns-modal .modal-footer { border-top:1px solid #f0f0f0; padding:14px 22px; }
.ns-modal-cancel { padding:10px 22px; border-radius:3px; font-weight:600; cursor:pointer; border:1px solid #c2c2c2; background:#fff; color:#212121; font-size:14px; transition:background 0.15s; }
.ns-modal-cancel:hover { background:#f5f5f5; }
.ns-modal-save { padding:10px 24px; border-radius:3px; font-weight:700; cursor:pointer; border:none; background:#fb641b; color:#fff; font-size:14px; transition:background 0.2s; }
.ns-modal-save:hover { background:#e05a16; }

@media(max-width:860px){
    .ns-layout{grid-template-columns:1fr;}
    .ns-right-col{position:static;}
}
@media(max-width:540px){
    .ns-modal-row{grid-template-columns:1fr;}
    .ns-steps-bar{display:none;}
}
</style>

<div class="ns-breadcrumb">
    <div class="ns-breadcrumb-inner">
        <a href="<?php echo e(url('index')); ?>">Home</a> <span>›</span>
        <a href="<?php echo e(url('cart')); ?>">Cart</a> <span>›</span>
        <span style="color:#1c1c1c;font-weight:500;">Checkout</span>
    </div>
</div>

<div class="ns-steps-bar">
    <div class="ns-steps-inner">
        <div class="ns-step done">
            <div class="ns-step-num">✓</div> Cart
        </div>
        <div class="ns-step-sep"></div>
        <div class="ns-step active">
            <div class="ns-step-num">2</div> Delivery Address
        </div>
        <div class="ns-step-sep"></div>
        <div class="ns-step">
            <div class="ns-step-num">3</div> Payment
        </div>
        <div class="ns-step-sep"></div>
        <div class="ns-step">
            <div class="ns-step-num">4</div> Summary
        </div>
    </div>
</div>
 <form action="<?php echo e(route('checkout')); ?>" method="POST" id="checkoutForm">
            <?php echo csrf_field(); ?>
<div class="ns-page">
    <div class="ns-wrap">
        <div class="ns-layout">
            <div class="ns-left">
                <div class="ns-panel">
                    <div class="ns-panel-head">
                        <div class="ns-panel-head-num">1</div>
                        <div class="ns-panel-head-title">Delivery Address</div>
                    </div>
                   
                    <div class="ns-panel-body">
                        <?php $__empty_1 = true; $__currentLoopData = $cusAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <label class="ns-addr-option">
                            <input type="radio" name="shipping_id" value="<?php echo e($shipping->id); ?>" required <?php if($shipping->id == $shipping->ship_id): ?> checked <?php endif; ?>>
                            <div>
                                <div class="ns-addr-name"><?php echo e($shipping->address); ?></div>
                                <div class="ns-addr-line"><?php echo e($shipping->district); ?>, <?php echo e($shipping->state); ?></div>
                                <div class="ns-addr-pin"><?php echo e($shipping->pincode); ?></div>
                                <div class="ns-addr-phone">📞 <?php echo e($shipping->phone_number); ?></div>
                                <?php if($shipping->id == $shipping->ship_id): ?>
                                <span class="ns-addr-tag-default">Default</span>
                                <?php endif; ?>
                            </div>
                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="ns-empty-addr">No saved addresses. Please add one.</div>
                        <?php endif; ?>

                        <button type="button" class="ns-add-addr-btn" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="fa-solid fa-plus"></i> Add a new address
                        </button>
                    </div>
                </div>
            </div>

      

            <div class="ns-right-col">
                <div class="ns-order-panel">
                    <div class="ns-order-panel-head">Order Summary</div>
                          <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
<input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
<input type="hidden" name="razorpay_signature" id="razorpay_signature">

                    <?php if($cartItems->count() > 0): ?>
                    <?php $sum = 0; $mrp = 0; ?>

                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="ns-item-row">
                        <div class="ns-item-thumb">
                            <img src="<?php echo e(asset('public/assets/img/items/'.$item->image)); ?>" alt="<?php echo e($item->name); ?>">
                        </div>
                        <div style="flex:1;min-width:0;">
                            <div class="ns-item-title"><?php echo e($item->name); ?></div>
                            <div class="ns-item-qty-price">Qty: <?php echo e($item->qty); ?></div>
                        </div>
                        <div class="ns-item-price">₹<?php echo e($item->sr * $item->qty); ?></div>
                    </div>
                    <?php $sum += ($item->sr * $item->qty); $mrp += ($item->mrp * $item->qty); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="ns-price-section">
                        <div class="ns-price-row">
                            <span class="ns-price-label">Price (<?php echo e($cartCount); ?> items)</span>
                            <span class="ns-price-val" id="subtotal">₹<?php echo e($mrp); ?></span>
                        </div>
                        <div class="ns-price-row">
                            <span class="ns-price-label">Discount</span>
                            <span class="ns-price-val green" id="discount">− ₹<?php echo e($mrp - $sum); ?></span>
                        </div>
                        <div class="ns-price-row">
                            <span class="ns-price-label">Delivery Charges</span>
                            <span class="ns-price-val green"> ₹ 60</span>
                        </div>
                        <hr class="ns-price-divider">
                        <div class="ns-price-total">
                            <span>Total Amount</span>
                            <span id="grandtotal">₹<?php echo e($sum + 60); ?></span>
                            <input type="hidden" id="totalAmount" value="<?php echo e($sum + 60); ?>">
                        </div>
                        <?php if($mrp > $sum): ?>
                        <div class="ns-savings-pill" >You will save ₹<?php echo e($mrp - $sum); ?> on this order</div>
                        <?php endif; ?>

                        <?php if($cusAddress->isNotEmpty()): ?>

                         <button type="button" class="ns-pay-btn" id="payBtn">
    Proced to checkout
</button>
                        <?php else: ?>
                        <div class="ns-no-addr-msg">Please add a delivery address to continue</div>
                        <?php endif; ?>
                        <div class="ns-secure-row">
                            <i class="fa-solid fa-lock" style="color:#388e3c;font-size:11px;"></i> Safe and Secure Payments
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="empty-state"><p>No items in cart</p></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<div class="modal fade ns-modal" id="myModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo e(route('addshippingaddress')); ?>" method="POST">
            <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5>Add New Address</h5>
                </div>
                <div class="modal-body">
                    <label class="ns-modal-label">Full Address</label>
                    <textarea class="ns-modal-input form-control" name="address" placeholder="House No., Street, Area, Landmark" required style="min-height:80px;resize:vertical;"></textarea>
                    <div class="ns-modal-row">
                        <div>
                            <label class="ns-modal-label">District</label>
                            <input type="text" name="district" class="ns-modal-input form-control" placeholder="District" required>
                        </div>
                        <div>
                            <label class="ns-modal-label">State</label>
                            <input type="text" name="state" class="ns-modal-input form-control" placeholder="State" required>
                        </div>
                    </div>
                    <div class="ns-modal-row">
                        <div>
                            <label class="ns-modal-label">PIN Code</label>
                            <input type="text" name="pincode" class="ns-modal-input form-control" placeholder="6-digit PIN" required>
                        </div>
                        <div>
                            <label class="ns-modal-label">Mobile Number</label>
                            <input type="text" name="contactnumber" class="ns-modal-input form-control" placeholder="10-digit mobile" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="ns-modal-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="ns-modal-save">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.weblayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ebook\resources\views/web/shipping_details.blade.php ENDPATH**/ ?>