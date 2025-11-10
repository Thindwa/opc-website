<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SecurityDashboardWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $thisWeek = Carbon::now()->startOfWeek();

        return [
            Stat::make('Failed Logins Today', $this->getFailedLoginsCount($today))
                ->description('Failed login attempts today')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger'),

            Stat::make('Security Events This Week', $this->getSecurityEventsCount($thisWeek))
                ->description('Total security events this week')
                ->descriptionIcon('heroicon-m-shield-exclamation')
                ->color('warning'),

            Stat::make('Active Sessions', $this->getActiveSessionsCount())
                ->description('Currently active user sessions')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),

            Stat::make('Blocked IPs', $this->getBlockedIPsCount())
                ->description('IPs currently blocked')
                ->descriptionIcon('heroicon-m-no-symbol')
                ->color('gray'),
        ];
    }

    private function getFailedLoginsCount(Carbon $date): int
    {
        return DB::table('security_logs')
            ->where('event', 'failed_login')
            ->whereDate('created_at', $date)
            ->count();
    }

    private function getSecurityEventsCount(Carbon $date): int
    {
        return DB::table('security_logs')
            ->where('created_at', '>=', $date)
            ->count();
    }

    private function getActiveSessionsCount(): int
    {
        return DB::table('sessions')
            ->where('last_activity', '>', now()->subMinutes(config('session.lifetime', 120)))
            ->count();
    }

    private function getBlockedIPsCount(): int
    {
        $blockedIPs = config('security.ip_security.blocked_ips', []);
        return count(array_filter($blockedIPs));
    }
}
