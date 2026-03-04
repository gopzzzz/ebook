<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = ['author_name'];

     public function items()
    {
        return $this->hasMany(Item::class);
    }
}
