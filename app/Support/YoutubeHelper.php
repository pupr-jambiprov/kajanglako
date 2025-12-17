<?php

namespace App\Support;

class YoutubeHelper
{
    public static function extractVideoId(?string $url): ?string
    {
        if (! $url) {
            return null;
        }

        preg_match(
            '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
            $url,
            $matches
        );

        return $matches[1] ?? null;
    }

    public static function thumbnail(string $videoId, string $quality = 'hq'): string
    {
        return match ($quality) {
            'max' => "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg",
            'mq'  => "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg",
            default => "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg",
        };
    }

    public static function generateThumbnail(?string $url): ?string
    {
        $videoId = self::extractVideoId($url);

        return $videoId
            ? self::thumbnail($videoId)
            : null;
    }
}
