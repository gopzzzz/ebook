<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'logo',
    'name',
    'description',
    'facebook_link',
    'youtube_link',
    'insta_link',
    'twitter_link',
    'address',
    'phone_number',
    'email'
];
}
