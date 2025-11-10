<?php

namespace App\Filament\Widgets;

use App\Models\Minister;
use App\Models\Dminister;
use App\Models\Management;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrganizationStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalStaff = Minister::count() + Dminister::count() + Management::count();

        return [
            Stat::make('Total Staff', $totalStaff)
                ->description('Organization members')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary')
                ->chart([2, 3, 2, 4, 3, 2, 3]),

            Stat::make('Ministers', Minister::count())
                ->description('Government ministers')
                ->descriptionIcon('heroicon-m-user-circle')
                ->color('success'),

            Stat::make('Deputy Ministers', Dminister::count())
                ->description('Deputy ministers')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning'),

            Stat::make('System Users', User::count())
                ->description('Admin users')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
        ];
    }
}
