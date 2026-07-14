<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_attributes extends Model
{
     protected $fillable = [
        'varient_id',
        'value',
        'name'
    ];
}
