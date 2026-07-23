<?php $__env->startSection('content'); ?>

<style>
.invoice-box{
    width:80%;
    margin:40px auto;
    padding:20px;
    border:1px solid #ffffff;
    background:#fff;
    color:#000000;
}
.invoice-header{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}
.invoice-title{
    font-size:28px;
    font-weight:bold;
}
.company-details{
    text-align:right;
}
.customer-details p{
   margin-bottom: 0.5rem;
}
.invoice-header p{
    margin-bottom: 0.5rem;
}
.total-box p{
margin-bottom: 0.5rem;
}
.table{
    width:100%;
    border-collapse:collapse;
}
.table th, .table td{
    border:1px solid #ddd;
    padding:10px;
    text-align:left;
}
.table th{
    background:#f5f5f5;
}
.total-box{
    /* margin-top:20px; */
    text-align:right;
}
.print-btn{
    margin:20px;
    padding:10px 20px;
    background:#f59e0b;
    color:#fff;
    border:none;
    cursor:pointer;
}

</style>

<style>
@media print {

    /* Hide everything */
    body * {
        visibility: hidden;
    }

    /* Show only invoice */
     #invoice-area * {
        visibility: visible;
    }

    /* Proper alignment */
    #invoice-area {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        margin: 0;
        padding: 20px;
        box-sizing: border-box;
        background: #fff;
    }

    /* VERY IMPORTANT FIX */
    .invoice-box {
        width: 100% !important;
        margin: 0 !important;
        border: none !important;
    }

    /* A4 page */
    @page {
        size: A4;
        margin: 10mm;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        font-size: 12px;
        padding: 8px;
    }

    tr {
        page-break-inside: avoid;
    }

    /* Hide button */
    .print-btn {
        display: none;
    }
}
</style>

<div class="invoice-box" id="invoice-area" >

    <div class="invoice-header">
        <div>
            <div class="invoice-title">INVOICE</div>
            <p>Order ID: <?php echo e($order_master->order_id); ?></p>
            <p>Date: <?php echo e(date('d M Y', strtotime($order_master->created_at))); ?></p>
        </div>

        <div class="company-details">
            <h3>Aron Books</h3>
        
        </div>
    </div>

    <div class="customer-details">
        <h4>Billing To:</h4>
        <p><?php echo e($order_master->name); ?></p>
        <p><?php echo e($order_master->address); ?></p>
        <p><?php echo e($order_master->district); ?>, <?php echo e($order_master->state); ?></p>
        <p>Pin: <?php echo e($order_master->pincode); ?></p>
        <p>Phone: <?php echo e($order_master->phone_number); ?></p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>P.Code</th>
                <th>Product</th>
                <th>MRP</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>

            <?php $__currentLoopData = $order_trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($i++); ?></td>
                <td>(<?php echo e($item->pro_code); ?>)</td>
                <td><?php echo e($item->name); ?>(<?php echo e($item->size); ?>)</td>
                <td>₹<?php echo e($item->mrp); ?></td>
                <td>₹<?php echo e($item->sr); ?></td>
                <td><?php echo e($item->qty); ?></td>
                <td>₹<?php echo e($item->sr * $item->qty); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <div class="total-box">
        <p>Subtotal: ₹ <?php echo e($order_master->total_mrp); ?></p>
        <p>Discount: ₹ <?php echo e($order_master->total_mrp - $order_master->total_sr); ?></p>
         <p>Shipping Charge: ₹ 60 </p>
        <h3>Grand Total: ₹ <?php echo e($order_master->total_amount); ?></h3>
    </div>

</div>

<div style="text-align:center;">
 <button class="print-btn" onclick="window.print()">Print Invoice</button>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.weblayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ebook\resources\views/web/orderview.blade.php ENDPATH**/ ?>