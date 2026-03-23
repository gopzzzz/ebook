<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items'; 




    protected $fillable = [
    'item_type',
    'name',
    'slug',
    'author_id',
    'publisher_id',
    'cat_id',
    'mrp',
    'sr',
    'image',
    'description',
];

    // 🔗 Relationships

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    
}