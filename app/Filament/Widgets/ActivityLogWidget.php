<?php

namespace App\Filament\Widgets;

use App\Models\ActivityLog;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class ActivityLogWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $today = now()->startOfDay();
        $yesterday = now()->subDay()->startOfDay();
        $thisWeek = now()->startOfWeek();
        $thisMonth = now()->startOfMonth();

        // Today's activities
        $todayActivities = ActivityLog::where('created_at', '>=', $today)->count();

        // Yesterday's activities
        $yesterdayActivities = ActivityLog::whereBetween('created_at', [$yesterday, $today])->count();

        // This week's activities
        $weekActivities = ActivityLog::where('created_at', '>=', $thisWeek)->count();

        // This month's activities
        $monthActivities = ActivityLog::where('created_at', '>=', $thisMonth)->count();

        // Most active user today
        $mostActiveUser = ActivityLog::where('created_at', '>=', $today)
            ->whereNotNull('causer_id')
            ->select('causer_id', DB::raw('count(*) as activity_count'))
            ->groupBy('causer_id')
            ->orderBy('activity_count', 'desc')
            ->first();

        $mostActiveUserName = $mostActiveUser ? User::find($mostActiveUser->causer_id)?->name ?? 'Unknown' : 'None';

        // Device breakdown
        $deviceBreakdown = ActivityLog::where('created_at', '>=', $today)
            ->select('device_type', DB::raw('count(*) as count'))
            ->groupBy('device_type')
            ->pluck('count', 'device_type')
            ->toArray();

        $mobileCount = $deviceBreakdown['mobile'] ?? 0;
        $desktopCount = $deviceBreakdown['desktop'] ?? 0;
        $tabletCount = $deviceBreakdown['tablet'] ?? 0;

        // Action breakdown
        $actionBreakdown = ActivityLog::where('created_at', '>=', $today)
            ->select('action_type', DB::raw('count(*) as count'))
            ->groupBy('action_type')
            ->pluck('count', 'action_type')
            ->toArray();

        $loginCount = $actionBreakdown['login'] ?? 0;
        $createCount = $actionBreakdown['create'] ?? 0;
        $updateCount = $actionBreakdown['update'] ?? 0;
        $deleteCount = $actionBreakdown['delete'] ?? 0;

        return [
            Stat::make('Today\'s Activities', $todayActivities)
                ->description($yesterdayActivities . ' yesterday')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color($todayActivities > $yesterdayActivities ? 'success' : 'warning'),

            Stat::make('This Week', $weekActivities)
                ->description('Activities this week')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),

            Stat::make('This Month', $monthActivities)
                ->description('Activities this month')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),

            Stat::make('Most Active User', $mostActiveUserName)
                ->description($mostActiveUser ? $mostActiveUser->activity_count . ' activities today' : 'No activities today')
                ->descriptionIcon('heroicon-m-user')
                ->color('gray'),

            Stat::make('Mobile Users', $mobileCount)
                ->description('Mobile activities today')
                ->descriptionIcon('heroicon-m-device-phone-mobile')
                ->color('success'),

            Stat::make('Desktop Users', $desktopCount)
                ->description('Desktop activities today')
                ->descriptionIcon('heroicon-m-computer-desktop')
                ->color('info'),

            Stat::make('Logins Today', $loginCount)
                ->description('User logins today')
                ->descriptionIcon('heroicon-m-arrow-right-on-rectangle')
                ->color('success'),

            Stat::make('Content Updates', $updateCount)
                ->description('Content updates today')
                ->descriptionIcon('heroicon-m-pencil-square')
                ->color('warning'),
        ];
    }
}
