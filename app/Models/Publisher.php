<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publishers';

    protected $fillable = [
        'publisher_name',
        'publisher_logo'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}