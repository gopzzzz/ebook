<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $table = 'shipping_address';

    protected $fillable = [
        'cus_id',
        'address',
        'pincode',
        'district',
        'state'
    ];

    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cus_id');
    }
}