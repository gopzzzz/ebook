<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hsn_codes extends Model
{
    protected $fillable = [
        'code',
        'tax',
        'igst',
        'cgst',
        'sgst'
    ];
}