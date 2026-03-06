<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMaster extends Model
{
    protected $table = 'order_masters';

    protected $fillable = [
        'order_id',
        'cus_id',
        'total_amount',
        'shipping_charge',
        'discount',
        'address_id'
    ];

     public function customer()
{
    return $this->belongsTo(Customer::class, 'cus_id');
}
}
