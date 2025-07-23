<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = ['title', 'description', 'image', 'slug'];

    protected static function booted(): void
    {
        static::saving(function ($news) {
            if (empty($news->slug) && !empty($news->title)) {
                $slug = Str::slug($news->title);
                $originalSlug = $slug;
                $count = 1;

                // Ensure the slug is unique
                while (static::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }

                $news->slug = $slug;
            }
        });
    }
}
