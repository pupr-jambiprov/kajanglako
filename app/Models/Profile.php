<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'cover_image',
        'email',
        'phone',
        'address',
        'instagram',
        'youtube',
        'website',
    ];

    public static function single(): self
    {
        return cache()->rememberForever('site_profile', function () {
            return self::first();
        });
    }
}
