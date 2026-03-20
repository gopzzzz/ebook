@extends('layouts.weblayout')

@section('content')

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

    <!-- HEADER -->
    <div class="invoice-header">
        <div>
            <div class="invoice-title">INVOICE</div>
            <p>Order ID: {{ $order_master->order_id }}</p>
            <p>Date: {{ date('d M Y', strtotime($order_master->created_at)) }}</p>
        </div>

        <div class="company-details">
            <h3>Aron Books</h3>
        
        </div>
    </div>

    <!-- CUSTOMER -->
    <div class="customer-details">
        <h4>Billing To:</h4>
        <p>{{ $order_master->name }}</p>
        <p>{{ $order_master->address }}</p>
        <p>{{ $order_master->district }}, {{ $order_master->state }}</p>
        <p>Pin: {{ $order_master->pincode }}</p>
        <p>Phone: {{ $order_master->phone_number }}</p>
    </div>

    <!-- ITEMS TABLE -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>MRP</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            @php $i = 1; @endphp

            @foreach($order_trans as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->name }}</td>
                <td>₹{{$item->mrp}}</td>
                <td>₹{{ $item->sr }}</td>
                <td>{{ $item->qty }}</td>
                <td>₹{{ $item->sr * $item->qty}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <!-- TOTAL -->
    <div class="total-box">
        <p>Subtotal: ₹ {{ $order_master->total_mrp}}</p>
        <p>Discount: ₹ {{ $order_master->total_mrp - $order_master->total_sr }}</p>
        <h3>Grand Total: ₹ {{ $order_master->total_sr }}</h3>
    </div>

</div>

<!-- PRINT BUTTON -->
<div style="text-align:center;">
 <button class="print-btn" onclick="window.print()">Print Invoice</button>
</div>

@endsection

