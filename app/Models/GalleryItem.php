<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'gallery_id',
        'type',
        'image',
        'video_url',
        'caption',
        'sort_order',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    protected $casts = [
        'image' => 'string',
    ];

    public function getImageAttribute($value)
    {
        if (! $value) {
            return asset('assets/images/placeholder.jpg');
        }

        // Jika sudah URL YouTube
        if (str_starts_with($value, 'http')) {
            return $value;
        }

        return asset('storage/' . $value);
    }
}
