<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'youtube_url'];

    public function getEmbedUrlAttribute(): ?string
    {
        $url = $this->youtube_url;

        if (! $url) {
            return null;
        }

        $videoId = $this->extractYoutubeId($url);

        if (! $videoId) {
            return $url;
        }

        return "https://www.youtube.com/embed/{$videoId}";
    }

    protected function extractYoutubeId(string $url): ?string
    {
        $patterns = [
            '#youtu\.be/([A-Za-z0-9_-]{11})#',
            '#youtube\.com/embed/([A-Za-z0-9_-]{11})#',
            '#youtube\.com/shorts/([A-Za-z0-9_-]{11})#',
            '#youtube\.com/live/([A-Za-z0-9_-]{11})#',
            '#youtube\.com/v/([A-Za-z0-9_-]{11})#',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        $query = parse_url($url, PHP_URL_QUERY);

        if ($query) {
            parse_str($query, $params);
            if (! empty($params['v']) && preg_match('/^[A-Za-z0-9_-]{11}$/', $params['v'])) {
                return $params['v'];
            }
        }

        return null;
    }
}
