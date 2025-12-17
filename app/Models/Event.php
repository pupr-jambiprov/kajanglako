<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'event_date',
        'event_time',
        'location',
        'thumbnail',
        'is_published'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
