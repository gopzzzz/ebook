<?php $__env->startSection('content'); ?>

<style>
/* keep all old classes */
.profile-wrapper{max-width:1200px;margin:50px auto;padding:0 15px;}
.profile-container{background:#fff;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.08);overflow:hidden;}
.profile-header{background:linear-gradient(135deg,#1a1a1a 0%,#2d2d2d 100%);padding:40px;color:#fff;}
.profile-header h1{font-size:28px;font-weight:800;margin:0;}
.profile-nav{display:flex;background:#f8f9fa;border-bottom:1px solid #e5e5e5;}
.profile-nav-item{flex:1;border-right:1px solid #e5e5e5;}
.profile-nav-item:last-child{border-right:none;}
.profile-nav-btn{width:100%;padding:16px 20px;background:none;border:none;color:#666;font-size:14px;font-weight:600;cursor:pointer;transition:all 0.3s ease;text-align:left;}
.profile-nav-btn:hover,.profile-nav-btn.active{background:#fff;color:#F59E0B;border-bottom:3px solid #F59E0B;}
.tab-content{padding:40px;}
.tab-pane{display:none;}
.tab-pane.show{display:block;}
.section-header{font-size:18px;font-weight:700;color:#1a1a1a;margin-bottom:25px;padding-bottom:15px;border-bottom:2px solid #f0f0f0;}
.info-card{background:#f9f9f9;border:1px solid #e5e5e5;border-radius:6px;padding:20px;margin-bottom:20px;}
.info-row{display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid #e5e5e5;font-size:14px;}
.info-row:last-child{border-bottom:none;}
.info-label{color:#666;font-weight:500;}
.info-value{color:#1a1a1a;font-weight:600;}
.address-card{background:#fff;border:1px solid #e5e5e5;border-radius:6px;padding:18px;margin-bottom:12px;transition:all 0.3s ease;}
.address-card:hover{border-color:#F59E0B;box-shadow:0 4px 12px rgba(245,158,11,0.1);}
.address-title{color:#1a1a1a;font-weight:600;font-size:14px;margin-bottom:8px;}
.address-detail{color:#666;font-size:13px;line-height:1.6;margin-bottom:4px;}
.address-phone{color:#999;font-size:12px;}
.empty-state{text-align:center;padding:40px 20px;}
.empty-state-text{color:#999;font-size:15px;}
.order-card{background:#f9f9f9;border:1px solid #e5e5e5;border-radius:6px;padding:18px;margin-bottom:12px;transition:all 0.3s ease;}
.order-card:hover{box-shadow:0 4px 12px rgba(0,0,0,0.08);border-color:#d9d9d9;}
.order-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:15px;flex-wrap:wrap;gap:10px;}
.order-id{font-weight:700;color:#1a1a1a;font-size:14px;}
.order-date{color:#999;font-size:12px;}
.order-footer{display:flex;justify-content:space-between;align-items:center;padding-top:12px;border-top:1px solid #e5e5e5;flex-wrap:wrap;gap:12px;}
.order-total{font-size:16px;font-weight:700;color:#F59E0B;}
.view-details-link{background:#F59E0B;color:#fff;padding:8px 16px;text-decoration:none;border-radius:6px;font-size:12px;font-weight:600;transition:all 0.3s ease;}
.view-details-link:hover{background:#e59000;}
.settings-section{background:#f9f9f9;border:1px solid #e5e5e5;border-radius:6px;padding:20px;}
.settings-text{color:#666;font-size:14px;margin-bottom:20px;}
.logout-link{display:inline-block;background:#ef4444;color:#fff;padding:10px 20px;text-decoration:none;border-radius:6px;font-weight:600;transition:all 0.3s ease;}
.logout-link:hover{background:#dc2626;box-shadow:0 4px 12px rgba(239,68,68,0.3);}
@media(max-width:768px){.profile-nav{flex-wrap:wrap;}.profile-nav-item{flex:1 1 50%;}.profile-nav-item:nth-child(even){border-right:none;}.tab-content{padding:20px;}.profile-header{padding:25px 20px;}.profile-header h1{font-size:22px;}.order-header{flex-direction:column;align-items:flex-start;}.order-footer{flex-direction:column;align-items:flex-start;}.view-details-link{width:100%;text-align:center;}}

/* ── NEW PROFESSIONAL PROFILE STYLES ── */
.np-page { background:#f1f3f6; padding:0 0 48px; }

.np-breadcrumb {
    background:#fff; border-bottom:1px solid #e8e8e8; padding:12px 0;
}
.np-breadcrumb-inner {
    max-width:1200px; margin:0 auto; padding:0 16px;
    font-size:13px; color:#777; display:flex; align-items:center; gap:6px;
}
.np-breadcrumb-inner a { color:#555; text-decoration:none; }
.np-breadcrumb-inner a:hover { color:#2874f0; }

.np-wrap { max-width:1200px; margin:0 auto; padding:20px 16px 0; }
.np-layout { display:grid; grid-template-columns:240px 1fr; gap:16px; align-items:start; }

.np-sidebar {
    background:#fff;
    border:1px solid #ddd;
    border-radius:3px;
    position:sticky;
    top:16px;
    overflow:hidden;
}
.np-sidebar-user {
    background:#2874f0;
    padding:20px 18px;
    display:flex;
    align-items:center;
    gap:12px;
}
.np-sidebar-avatar {
    width:44px; height:44px; border-radius:50%;
    background:#fff;
    display:flex; align-items:center; justify-content:center;
    font-size:18px; font-weight:800; color:#2874f0; flex-shrink:0;
}
.np-sidebar-name { font-size:15px; font-weight:700; color:#fff; line-height:1.3; }
.np-sidebar-sub { font-size:12px; color:rgba(255,255,255,0.75); margin-top:1px; }

.np-sidebar-nav { padding:8px 0; }
.np-nav-item {
    display:flex; align-items:center; gap:12px;
    padding:13px 18px;
    font-size:14px; color:#212121; font-weight:500;
    cursor:pointer;
    border-left:3px solid transparent;
    transition:all 0.15s;
    background:none; border-top:none; border-right:none; border-bottom:none;
    width:100%; text-align:left;
}
.np-nav-item i { font-size:15px; color:#878787; width:20px; text-align:center; }
.np-nav-item:hover { background:#f5f5f5; color:#2874f0; }
.np-nav-item:hover i { color:#2874f0; }
.np-nav-item.np-active {
    border-left-color:#2874f0;
    background:#f0f5ff;
    color:#2874f0; font-weight:700;
}
.np-nav-item.np-active i { color:#2874f0; }
.np-nav-divider { height:1px; background:#f0f0f0; margin:4px 0; }
.np-nav-section-label {
    font-size:11px; font-weight:700; color:#878787;
    letter-spacing:0.8px; text-transform:uppercase;
    padding:10px 18px 4px;
}

.np-main { display:flex; flex-direction:column; gap:0; }

.np-tab-content { display:none; }
.np-tab-content.np-show { display:block; }

.np-section-panel {
    background:#fff; border:1px solid #ddd; border-radius:3px; margin-bottom:12px; overflow:hidden;
}
.np-section-head {
    padding:14px 20px; border-bottom:1px solid #f0f0f0;
    display:flex; align-items:center; justify-content:space-between;
}
.np-section-head-title {
    font-size:14px; font-weight:700; color:#212121;
    text-transform:uppercase; letter-spacing:0.3px;
}
.np-section-body { padding:20px; }

.np-info-grid {
    display:grid; grid-template-columns:1fr 1fr; gap:1px;
    background:#f0f0f0; border:1px solid #f0f0f0;
}
.np-info-cell {
    background:#fff; padding:16px 20px;
}
.np-info-cell-label {
    font-size:12px; color:#878787; font-weight:500; margin-bottom:4px;
}
.np-info-cell-val {
    font-size:15px; color:#212121; font-weight:600;
}

.np-addr-card {
    border:1px solid #e0e0e0; border-radius:3px;
    padding:16px; margin-bottom:10px;
    background:#fff; position:relative;
    transition:border-color 0.2s, box-shadow 0.2s;
}
.np-addr-card:hover {
    border-color:#2874f0;
    box-shadow:0 2px 8px rgba(40,116,240,0.1);
}
.np-addr-card:last-child { margin-bottom:0; }
.np-addr-type-badge {
    display:inline-block; font-size:11px; font-weight:700;
    color:#2874f0; background:#e8f0fe; padding:2px 8px;
    border-radius:2px; margin-bottom:6px;
}
.np-addr-street { font-size:14px; font-weight:600; color:#212121; margin-bottom:3px; }
.np-addr-details { font-size:13px; color:#555; line-height:1.5; }
.np-addr-phone { font-size:13px; color:#555; margin-top:4px; }

.np-empty-panel {
    text-align:center; padding:40px 20px; background:#fff;
    border:1px solid #ddd; border-radius:3px;
}
.np-empty-icon { font-size:48px; opacity:0.2; margin-bottom:12px; }
.np-empty-msg { font-size:15px; color:#878787; font-weight:500; }

.np-order-row {
    border:1px solid #e0e0e0; border-radius:3px;
    background:#fff; margin-bottom:10px;
    overflow:hidden; transition:box-shadow 0.2s;
}
.np-order-row:hover { box-shadow:0 2px 8px rgba(0,0,0,0.08); }
.np-order-row:last-child { margin-bottom:0; }
.np-order-top {
    padding:14px 20px; border-bottom:1px solid #f5f5f5;
    display:flex; align-items:center; justify-content:space-between;
    flex-wrap:wrap; gap:10px;
    background:#fafafa;
}
.np-order-meta-label { font-size:11px; color:#878787; font-weight:600; letter-spacing:0.5px; text-transform:uppercase; margin-bottom:2px; }
.np-order-meta-val { font-size:13px; font-weight:700; color:#212121; }
.np-order-status-chip {
    font-size:12px; font-weight:700; padding:5px 12px;
    border-radius:2px;
}
.np-order-status-chip.delivered { background:#e8f5e9; color:#2e7d32; }
.np-order-status-chip.processing { background:#fff8e1; color:#f57f17; }
.np-order-body {
    padding:14px 20px;
    display:flex; align-items:center; justify-content:space-between;
    flex-wrap:wrap; gap:14px;
}
.np-order-amount { font-size:18px; font-weight:700; color:#212121; }
.np-order-amount small { font-size:12px; font-weight:400; color:#878787; margin-left:4px; }
.np-order-btns { display:flex; gap:10px; flex-wrap:wrap; }
.np-order-btn-primary {
    font-size:13px; font-weight:700; padding:9px 20px;
    border-radius:3px; text-decoration:none;
    background:#2874f0; color:#fff;
    transition:background 0.2s;
    display:inline-flex; align-items:center; gap:6px;
}
.np-order-btn-primary:hover { background:#1a65dc; color:#fff; }
.np-order-btn-secondary {
    font-size:13px; font-weight:600; padding:9px 20px;
    border-radius:3px; text-decoration:none;
    background:#fff; color:#212121; border:1px solid #c2c2c2;
    transition:background 0.15s;
    display:inline-flex; align-items:center; gap:6px;
}
.np-order-btn-secondary:hover { background:#f5f5f5; color:#212121; }

.np-settings-row {
    display:flex; align-items:flex-start; justify-content:space-between;
    gap:20px; padding:16px; background:#fff;
    border:1px solid #e0e0e0; border-radius:3px;
    margin-bottom:10px; flex-wrap:wrap;
}
.np-settings-row:last-child { margin-bottom:0; }
.np-settings-label { font-size:15px; font-weight:700; color:#212121; margin-bottom:3px; }
.np-settings-desc { font-size:13px; color:#878787; line-height:1.5; }
.np-logout-btn {
    display:inline-flex; align-items:center; gap:6px;
    padding:10px 24px; border-radius:3px;
    background:#fb641b; color:#fff; text-decoration:none;
    font-weight:700; font-size:14px; transition:background 0.2s;
    flex-shrink:0; white-space:nowrap;
}
.np-logout-btn:hover { background:#e05a16; color:#fff; }

@media(max-width:860px) {
    .np-layout { grid-template-columns:1fr; }
    .np-sidebar { position:static; }
    .np-sidebar-nav { display:flex; overflow-x:auto; padding:0; }
    .np-nav-item { flex-shrink:0; border-left:none; border-bottom:3px solid transparent; padding:12px 14px; }
    .np-nav-item.np-active { border-left-color:transparent; border-bottom-color:#2874f0; }
    .np-nav-divider, .np-nav-section-label { display:none; }
}
@media(max-width:540px) {
    .np-info-grid { grid-template-columns:1fr; }
    .np-order-top { flex-direction:column; align-items:flex-start; }
}
</style>

<div class="np-breadcrumb">
    <div class="np-breadcrumb-inner">
        <a href="<?php echo e(url('index')); ?>">Home</a> <span>›</span>
        <span style="color:#1c1c1c;font-weight:500;">My Account</span>
    </div>
</div>

<div class="np-page">
    <div class="np-wrap">
        <div class="np-layout">
            <div class="np-sidebar">
                <div class="np-sidebar-user">
                    <div class="np-sidebar-avatar"><?php echo e(strtoupper(substr($profile->name, 0, 1))); ?></div>
                    <div>
                        <div class="np-sidebar-name"><?php echo e($profile->name); ?></div>
                        <div class="np-sidebar-sub"><?php echo e($orders->count()); ?> Orders</div>
                    </div>
                </div>
                <div class="np-sidebar-nav">
                    <div class="np-nav-section-label">My Account</div>
                    <button class="np-nav-item np-active" data-np-target="np-tab-profile">
                        <i class="fa-regular fa-user"></i> Profile
                    </button>
                    <button class="np-nav-item" data-np-target="np-tab-orders">
                        <i class="fa-regular fa-rectangle-list"></i> My Orders
                    </button>
                    <button class="np-nav-item" data-np-target="np-tab-addresses">
                        <i class="fa-solid fa-location-dot"></i> Addresses
                    </button>
                    <div class="np-nav-divider"></div>
                    <div class="np-nav-section-label">Settings</div>
                    <button class="np-nav-item" data-np-target="np-tab-settings">
                        <i class="fa-solid fa-gear"></i> Account Settings
                    </button>
                </div>
            </div>

            <div class="np-main">
                <div class="np-tab-content np-show" id="np-tab-profile">
                    <div class="np-section-panel">
                        <div class="np-section-head">
                            <div class="np-section-head-title">Personal Information</div>
                        </div>
                        <div class="np-section-body" style="padding:0;">
                            <div class="np-info-grid">
                                <div class="np-info-cell">
                                    <div class="np-info-cell-label">Full Name</div>
                                    <div class="np-info-cell-val"><?php echo e($profile->name); ?></div>
                                </div>
                                <div class="np-info-cell">
                                    <div class="np-info-cell-label">Account Status</div>
                                    <div class="np-info-cell-val" style="color:#388e3c;">Active</div>
                                </div>
                                <div class="np-info-cell">
                                    <div class="np-info-cell-label">Total Orders</div>
                                    <div class="np-info-cell-val"><?php echo e($orders->count()); ?></div>
                                </div>
                                <div class="np-info-cell">
                                    <div class="np-info-cell-label">Saved Addresses</div>
                                    <div class="np-info-cell-val"><?php echo e($cusAddress->count()); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="np-tab-content" id="np-tab-orders">
                    <div class="np-section-panel">
                        <div class="np-section-head">
                            <div class="np-section-head-title">My Orders</div>
                            <span style="font-size:13px;color:#878787;"><?php echo e($orders->count()); ?> order(s)</span>
                        </div>
                        <div class="np-section-body">
                            <?php if($orders->count() > 0): ?>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="np-order-row">
                                <div class="np-order-top">
                                    <div>
                                        <div class="np-order-meta-label">Order ID</div>
                                        <div class="np-order-meta-val">#<?php echo e($order->order_id); ?></div>
                                    </div>
                                    <div>
                                        <div class="np-order-meta-label">Date</div>
                                        <div class="np-order-meta-val"><?php echo e(date('d M Y', strtotime($order->created_at))); ?></div>
                                    </div>
                                    <div>
                                        <span class="np-order-status-chip delivered">Delivered</span>
                                    </div>
                                </div>
                                <div class="np-order-body">
                                    <div class="np-order-amount">₹<?php echo e($order->total_amount); ?><small>Total</small></div>
                                    <div class="np-order-btns">
                                        <a href="<?php echo e(route('orderview', $order->id)); ?>" class="np-order-btn-primary" target="_blank">
                                            <i class="fa-regular fa-eye" style="font-size:12px;"></i> View Details
                                        </a>
                                        <a href="#" class="np-order-btn-secondary">
                                            <i class="fa-solid fa-rotate-left" style="font-size:12px;"></i> Buy Again
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div style="text-align:center;padding:40px 20px;">
                                <div style="font-size:48px;opacity:0.2;margin-bottom:12px;">📦</div>
                                <div style="font-size:16px;font-weight:500;color:#212121;margin-bottom:6px;">No orders yet</div>
                                <div style="font-size:14px;color:#878787;margin-bottom:20px;">Looks like you haven't placed any orders</div>
                                <a href="<?php echo e(url('product-list')); ?>" style="display:inline-block;background:#fb641b;color:#fff;padding:11px 28px;border-radius:3px;text-decoration:none;font-weight:700;font-size:14px;">Start Shopping</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="np-tab-content" id="np-tab-addresses">
                    <div class="np-section-panel">
                        <div class="np-section-head">
                            <div class="np-section-head-title">Saved Addresses</div>
                            <span style="font-size:13px;color:#878787;"><?php echo e($cusAddress->count()); ?> saved</span>
                        </div>
                        <div class="np-section-body">
                            <?php $__empty_1 = true; $__currentLoopData = $cusAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="np-addr-card">
                                <span class="np-addr-type-badge">HOME</span>
                                <div class="np-addr-street"><?php echo e($address->address); ?></div>
                                <div class="np-addr-details"><?php echo e($address->district); ?>, <?php echo e($address->state); ?> — <?php echo e($address->pincode); ?></div>
                                <div class="np-addr-phone">📞 <?php echo e($address->phone_number); ?></div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="np-empty-panel">
                                <div class="np-empty-icon">📍</div>
                                <div class="np-empty-msg">No saved addresses</div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="np-tab-content" id="np-tab-settings">
                    <div class="np-section-panel">
                        <div class="np-section-head">
                            <div class="np-section-head-title">Account Settings</div>
                        </div>
                        <div class="np-section-body">
                            <div class="np-settings-row">
                                <div>
                                    <div class="np-settings-label">Sign Out</div>
                                    <div class="np-settings-desc">Sign out of your account on this device. Your saved data will remain secure.</div>
                                </div>
                                <a href="<?php echo e(url('logout')); ?>" class="np-logout-btn">
                                    <i class="fa-solid fa-right-from-bracket" style="font-size:13px;"></i> Sign Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    var btns = document.querySelectorAll('.np-nav-item[data-np-target]');
    var tabs = document.querySelectorAll('.np-tab-content');
    btns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var target = btn.getAttribute('data-np-target');
            btns.forEach(function(b) { b.classList.remove('np-active'); });
            tabs.forEach(function(t) { t.classList.remove('np-show'); });
            btn.classList.add('np-active');
            var el = document.getElementById(target);
            if (el) el.classList.add('np-show');
        });
    });
})();
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.weblayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ebook\resources\views/web/profile.blade.php ENDPATH**/ ?>