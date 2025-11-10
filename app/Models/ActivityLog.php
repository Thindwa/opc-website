<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Carbon\Carbon;

class ActivityLog extends Model
{
    protected $table = 'activity_log';

    protected $fillable = [
        'log_name',
        'description',
        'subject_type',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
        'ip_address',
        'user_agent',
        'device_name',
        'device_type',
        'browser_name',
        'browser_version',
        'os_name',
        'os_version',
        'action_type',
        'resource_type',
        'resource_id',
        'additional_data',
        'session_id',
        'last_activity',
    ];

    protected $casts = [
        'properties' => 'array',
        'additional_data' => 'array',
        'last_activity' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the subject of the activity
     */
    public function subject(): MorphTo
    {
        return $this->morphTo('subject');
    }

    /**
     * Get the causer of the activity
     */
    public function causer(): MorphTo
    {
        return $this->morphTo('causer');
    }

    /**
     * Get the user who performed the activity
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'causer_id');
    }

    /**
     * Scope for filtering by action type
     */
    public function scopeActionType($query, string $actionType)
    {
        return $query->where('action_type', $actionType);
    }

    /**
     * Scope for filtering by resource type
     */
    public function scopeResourceType($query, string $resourceType)
    {
        return $query->where('resource_type', $resourceType);
    }

    /**
     * Scope for filtering by user
     */
    public function scopeForUser($query, int $userId)
    {
        return $query->where('causer_id', $userId);
    }

    /**
     * Scope for filtering by IP address
     */
    public function scopeFromIp($query, string $ipAddress)
    {
        return $query->where('ip_address', $ipAddress);
    }

    /**
     * Scope for recent activities
     */
    public function scopeRecent($query, int $hours = 24)
    {
        return $query->where('created_at', '>=', Carbon::now()->subHours($hours));
    }

    /**
     * Get device information as a formatted string
     */
    public function getDeviceInfoAttribute(): string
    {
        $parts = [];

        if ($this->device_name) {
            $parts[] = $this->device_name;
        }

        if ($this->device_type) {
            $parts[] = ucfirst($this->device_type);
        }

        if ($this->browser_name) {
            $browser = $this->browser_name;
            if ($this->browser_version) {
                $browser .= ' ' . $this->browser_version;
            }
            $parts[] = $browser;
        }

        if ($this->os_name) {
            $os = $this->os_name;
            if ($this->os_version) {
                $os .= ' ' . $this->os_version;
            }
            $parts[] = $os;
        }

        return implode(' | ', $parts);
    }

    /**
     * Get formatted action description
     */
    public function getFormattedActionAttribute(): string
    {
        $action = ucfirst($this->action_type ?? 'unknown');

        if ($this->resource_type) {
            $action .= ' ' . class_basename($this->resource_type);
        }

        if ($this->resource_id) {
            $action .= " #{$this->resource_id}";
        }

        return $action;
    }

    /**
     * Get time since activity
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Check if activity is from mobile device
     */
    public function isMobile(): bool
    {
        return $this->device_type === 'mobile';
    }

    /**
     * Check if activity is from desktop
     */
    public function isDesktop(): bool
    {
        return $this->device_type === 'desktop';
    }

    /**
     * Check if activity is from tablet
     */
    public function isTablet(): bool
    {
        return $this->device_type === 'tablet';
    }
}
