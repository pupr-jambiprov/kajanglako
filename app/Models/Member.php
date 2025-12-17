<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'role',
        'bio',
        'photo',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function ($member) {
            // Jika sort_order belum diisi
            if (is_null($member->sort_order)) {
                $member->sort_order =
                    static::max('sort_order') + 1;
            }
        });
    }
}
