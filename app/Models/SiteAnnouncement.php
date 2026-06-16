<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteAnnouncement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'badge',
        'message',
        'image',
        'style',
        'priority',
        'placement',
        'cta_label',
        'cta_url',
        'cta_target_blank',
        'secondary_cta_label',
        'secondary_cta_url',
        'is_active',
        'is_dismissible',
        'show_once_per_session',
        'show_on_homepage',
        'show_on_all_pages',
        'dismiss_for_hours',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'priority' => 'integer',
        'cta_target_blank' => 'boolean',
        'is_active' => 'boolean',
        'is_dismissible' => 'boolean',
        'show_once_per_session' => 'boolean',
        'show_on_homepage' => 'boolean',
        'show_on_all_pages' => 'boolean',
        'dismiss_for_hours' => 'integer',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];
}
