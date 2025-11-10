<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Services\SecurityLoggingService;
use Carbon\Carbon;

class SecurityMonitor extends Command
{
    protected $signature = 'security:monitor';
    protected $description = 'Monitor security events and generate alerts';

    public function handle()
    {
        $this->info('Security Monitoring Report - ' . now());

        // Check for failed login attempts in the last hour
        $failedLogins = DB::table('security_logs')
            ->where('event', 'failed_login')
            ->where('created_at', '>=', Carbon::now()->subHour())
            ->count();

        if ($failedLogins > 10) {
            $this->warn("High number of failed login attempts: {$failedLogins} in the last hour");
            $this->logSecurityAlert('high_failed_logins', [
                'count' => $failedLogins,
                'timeframe' => '1 hour'
            ]);
        }

        // Check for suspicious activity
        $suspiciousActivity = DB::table('security_logs')
            ->where('event', 'suspicious_activity')
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->count();

        if ($suspiciousActivity > 0) {
            $this->warn("Suspicious activity detected: {$suspiciousActivity} events in the last 24 hours");
        }

        // Check for rate limit violations
        $rateLimitViolations = DB::table('security_logs')
            ->where('event', 'rate_limit_exceeded')
            ->where('created_at', '>=', Carbon::now()->subHour())
            ->count();

        if ($rateLimitViolations > 5) {
            $this->warn("High number of rate limit violations: {$rateLimitViolations} in the last hour");
        }

        // Check for file upload issues
        $fileUploadFailures = DB::table('security_logs')
            ->where('event', 'file_upload')
            ->where('data->success', false)
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->count();

        if ($fileUploadFailures > 0) {
            $this->info("File upload failures: {$fileUploadFailures} in the last 24 hours");
        }

        // Generate summary
        $totalEvents = DB::table('security_logs')
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->count();

        $this->info("Total security events in last 24 hours: {$totalEvents}");

        // Check for blocked IPs
        $blockedIPs = config('security.ip_security.blocked_ips', []);
        if (count($blockedIPs) > 0) {
            $this->info("Currently blocked IPs: " . implode(', ', $blockedIPs));
        }

        $this->info('Security monitoring completed successfully.');
    }

    private function logSecurityAlert(string $type, array $data): void
    {
        try {
            app(SecurityLoggingService::class)->logSecurityEvent('security_alert', array_merge([
                'alert_type' => $type,
            ], $data));
        } catch (\Exception $e) {
            $this->error('Failed to log security alert: ' . $e->getMessage());
        }
    }
}
