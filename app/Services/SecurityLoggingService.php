<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityLoggingService
{
    /**
     * Log security events
     */
    public function logSecurityEvent(string $event, array $data = [], Request $request = null): void
    {
        try {
            $logData = [
                'event' => $event,
                'timestamp' => now()->toISOString(),
                'ip_address' => $request?->ip() ?? request()->ip(),
                'user_agent' => $request?->userAgent() ?? request()->userAgent(),
                'user_id' => Auth::id(),
                'data' => $data,
                'url' => $request?->fullUrl() ?? request()->fullUrl(),
                'method' => $request?->method() ?? request()->method(),
            ];

            Log::channel('security')->info('Security Event', $logData);
        } catch (\Exception $e) {
            // Fallback to default log if security channel fails
            Log::error('Security logging failed: ' . $e->getMessage());
        }
    }

    /**
     * Log failed login attempts
     */
    public function logFailedLogin(string $email, string $ip, string $userAgent): void
    {
        $this->logSecurityEvent('failed_login', [
            'email' => $email,
            'ip_address' => $ip,
            'user_agent' => $userAgent,
        ]);
    }

    /**
     * Log successful login
     */
    public function logSuccessfulLogin(int $userId, string $ip, string $userAgent): void
    {
        $this->logSecurityEvent('successful_login', [
            'user_id' => $userId,
            'ip_address' => $ip,
            'user_agent' => $userAgent,
        ]);
    }

    /**
     * Log suspicious activity
     */
    public function logSuspiciousActivity(string $activity, array $data = []): void
    {
        $this->logSecurityEvent('suspicious_activity', array_merge([
            'activity' => $activity,
        ], $data));
    }

    /**
     * Log file upload attempts
     */
    public function logFileUpload(string $filename, string $mimeType, int $size, bool $success, string $reason = null): void
    {
        $this->logSecurityEvent('file_upload', [
            'filename' => $filename,
            'mime_type' => $mimeType,
            'size' => $size,
            'success' => $success,
            'reason' => $reason,
        ]);
    }

    /**
     * Log admin actions
     */
    public function logAdminAction(string $action, array $data = []): void
    {
        $this->logSecurityEvent('admin_action', array_merge([
            'action' => $action,
        ], $data));
    }

    /**
     * Log rate limit exceeded
     */
    public function logRateLimitExceeded(string $key, string $ip): void
    {
        $this->logSecurityEvent('rate_limit_exceeded', [
            'key' => $key,
            'ip_address' => $ip,
        ]);
    }
}
