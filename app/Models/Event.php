<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'title', 'start_date', 'end_date', 'location',
        'description', 'image', 'slug',
    ];

    protected static function booted(): void
    {
        static::saving(function ($event) {
            if (empty($event->slug) && !empty($event->title)) {
                $slug          = Str::slug($event->title);
                $originalSlug  = $slug;
                $counter       = 1;

                while (static::where('slug', $slug)
                             ->where('id', '!=', $event->id)
                             ->exists()) {
                    $slug = $originalSlug.'-'.$counter++;
                }

                $event->slug = $slug;
            }
        });
    }

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
