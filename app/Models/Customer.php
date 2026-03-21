<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public $timestamps = true;

    // Optional (correct relation if you want to use later)
    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class, 'cus_id');
    }
}
