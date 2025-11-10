<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Agent;

class ActivityLoggingService
{
    protected Agent $agent;

    public function __construct()
    {
        $this->agent = new Agent();
    }

    /**
     * Log user activity with device information
     */
    public function logActivity(
        string $action,
        ?Model $subject = null,
        ?User $causer = null,
        array $properties = [],
        ?Request $request = null
    ): ActivityLog {
        $request = $request ?? request();

        // Parse user agent
        $this->agent->setUserAgent($request->userAgent());

        // Get device information
        $deviceInfo = $this->getDeviceInfo($request);

        // Determine resource information
        $resourceType = $subject ? class_basename($subject) : null;
        $resourceId = $subject ? $subject->getKey() : null;

        // Create activity log entry
        $activityLog = ActivityLog::create([
            'log_name' => 'default',
            'description' => $this->generateDescription($action, $subject, $causer),
            'subject_type' => $subject ? get_class($subject) : null,
            'subject_id' => $subject ? $subject->getKey() : null,
            'causer_type' => $causer ? get_class($causer) : null,
            'causer_id' => $causer ? $causer->getKey() : null,
            'properties' => $properties,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'device_name' => $deviceInfo['device_name'],
            'device_type' => $deviceInfo['device_type'],
            'browser_name' => $deviceInfo['browser_name'],
            'browser_version' => $deviceInfo['browser_version'],
            'os_name' => $deviceInfo['os_name'],
            'os_version' => $deviceInfo['os_version'],
            'action_type' => $action,
            'resource_type' => $resourceType,
            'resource_id' => $resourceId,
            'additional_data' => $this->getAdditionalData($request),
            'session_id' => $request->hasSession() ? $request->session()->getId() : null,
            'last_activity' => now(),
        ]);

        return $activityLog;
    }

    /**
     * Log user login
     */
    public function logLogin(User $user, Request $request): ActivityLog
    {
        return $this->logActivity('login', null, $user, [
            'login_method' => 'password',
            'login_time' => now()->toISOString(),
        ], $request);
    }

    /**
     * Log user logout
     */
    public function logLogout(User $user, Request $request): ActivityLog
    {
        return $this->logActivity('logout', null, $user, [
            'logout_time' => now()->toISOString(),
        ], $request);
    }

    /**
     * Log resource creation
     */
    public function logCreate(Model $model, ?User $user = null, ?Request $request = null): ActivityLog
    {
        return $this->logActivity('create', $model, $user, [
            'created_data' => $model->getAttributes(),
        ], $request);
    }

    /**
     * Log resource update
     */
    public function logUpdate(Model $model, array $oldData, ?User $user = null, ?Request $request = null): ActivityLog
    {
        return $this->logActivity('update', $model, $user, [
            'old_data' => $oldData,
            'new_data' => $model->getAttributes(),
            'changed_fields' => $this->getChangedFields($oldData, $model->getAttributes()),
        ], $request);
    }

    /**
     * Log resource deletion
     */
    public function logDelete(Model $model, ?User $user = null, ?Request $request = null): ActivityLog
    {
        return $this->logActivity('delete', $model, $user, [
            'deleted_data' => $model->getAttributes(),
        ], $request);
    }

    /**
     * Log resource view
     */
    public function logView(Model $model, ?User $user = null, ?Request $request = null): ActivityLog
    {
        return $this->logActivity('view', $model, $user, [], $request);
    }

    /**
     * Get device information from request
     */
    protected function getDeviceInfo(Request $request): array
    {
        $this->agent->setUserAgent($request->userAgent());

        return [
            'device_name' => $this->agent->device() ?: 'Unknown Device',
            'device_type' => $this->getDeviceType(),
            'browser_name' => $this->agent->browser() ?: 'Unknown Browser',
            'browser_version' => $this->agent->version($this->agent->browser()) ?: 'Unknown Version',
            'os_name' => $this->agent->platform() ?: 'Unknown OS',
            'os_version' => $this->agent->version($this->agent->platform()) ?: 'Unknown Version',
        ];
    }

    /**
     * Determine device type
     */
    protected function getDeviceType(): string
    {
        if ($this->agent->isMobile()) {
            return 'mobile';
        } elseif ($this->agent->isTablet()) {
            return 'tablet';
        } else {
            return 'desktop';
        }
    }

    /**
     * Get additional data from request
     */
    protected function getAdditionalData(Request $request): array
    {
        return [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'referer' => $request->header('referer'),
            'accept_language' => $request->header('accept-language'),
            'accept_encoding' => $request->header('accept-encoding'),
            'connection' => $request->header('connection'),
            'is_ajax' => $request->ajax(),
            'is_secure' => $request->secure(),
        ];
    }

    /**
     * Generate activity description
     */
    protected function generateDescription(string $action, ?Model $subject, ?User $causer): string
    {
        $causerName = $causer ? $causer->name : 'System';
        $subjectName = $subject ? class_basename($subject) : 'Unknown';

        return match ($action) {
            'login' => "{$causerName} logged in",
            'logout' => "{$causerName} logged out",
            'create' => "{$causerName} created {$subjectName}",
            'update' => "{$causerName} updated {$subjectName}",
            'delete' => "{$causerName} deleted {$subjectName}",
            'view' => "{$causerName} viewed {$subjectName}",
            default => "{$causerName} performed {$action} on {$subjectName}",
        };
    }

    /**
     * Get changed fields between old and new data
     */
    protected function getChangedFields(array $oldData, array $newData): array
    {
        $changed = [];

        foreach ($newData as $key => $value) {
            if (!array_key_exists($key, $oldData) || $oldData[$key] !== $value) {
                $changed[$key] = [
                    'old' => $oldData[$key] ?? null,
                    'new' => $value,
                ];
            }
        }

        return $changed;
    }

    /**
     * Get activity statistics
     */
    public function getActivityStats(int $days = 30): array
    {
        $startDate = now()->subDays($days);

        return [
            'total_activities' => ActivityLog::where('created_at', '>=', $startDate)->count(),
            'login_activities' => ActivityLog::actionType('login')->where('created_at', '>=', $startDate)->count(),
            'logout_activities' => ActivityLog::actionType('logout')->where('created_at', '>=', $startDate)->count(),
            'create_activities' => ActivityLog::actionType('create')->where('created_at', '>=', $startDate)->count(),
            'update_activities' => ActivityLog::actionType('update')->where('created_at', '>=', $startDate)->count(),
            'delete_activities' => ActivityLog::actionType('delete')->where('created_at', '>=', $startDate)->count(),
            'view_activities' => ActivityLog::actionType('view')->where('created_at', '>=', $startDate)->count(),
            'unique_users' => ActivityLog::where('created_at', '>=', $startDate)->distinct('causer_id')->count('causer_id'),
            'unique_ips' => ActivityLog::where('created_at', '>=', $startDate)->distinct('ip_address')->count('ip_address'),
            'mobile_activities' => ActivityLog::where('device_type', 'mobile')->where('created_at', '>=', $startDate)->count(),
            'desktop_activities' => ActivityLog::where('device_type', 'desktop')->where('created_at', '>=', $startDate)->count(),
            'tablet_activities' => ActivityLog::where('device_type', 'tablet')->where('created_at', '>=', $startDate)->count(),
        ];
    }

    /**
     * Get recent activities for a user
     */
    public function getRecentUserActivities(User $user, int $limit = 10): \Illuminate\Database\Eloquent\Collection
    {
        return ActivityLog::forUser($user->id)
            ->with('subject')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get activities by IP address
     */
    public function getActivitiesByIp(string $ipAddress, int $limit = 50): \Illuminate\Database\Eloquent\Collection
    {
        return ActivityLog::fromIp($ipAddress)
            ->with(['causer', 'subject'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
