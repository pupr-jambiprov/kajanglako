<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover',
        'is_active',
        'sort_order',
    ];

    public function items()
    {
        return $this->hasMany(GalleryItem::class)
            ->orderBy('sort_order');
    }

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
