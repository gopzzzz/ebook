<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'type',
        'product_id',
        'amount',
    ];

     public function item()
{
    return $this->belongsTo(Item::class, 'product_id');
}
}
