<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);

Route::get('/gallery/{gallery}', function (\App\Models\Gallery $gallery) {
    return response()->json([
        'gallery' => [
            'id' => $gallery->id,
            'title' => $gallery->title,
        ],
        'items' => $gallery->items()
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'type' => $item->type,
                'thumbnail' => $item->image,
                'videoUrl' => $item->video_url,
                'caption' => $item->caption,
            ]),
    ]);
});

