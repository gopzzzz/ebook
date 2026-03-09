<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items'; 




    protected $fillable = [
    'name',
    'slug',

    'cat_id',
    'mrp',
    'sr',
    'image',
    'description',
];

    // 🔗 Relationships


    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}