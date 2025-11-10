<?php

namespace App\Filament\Widgets;

use App\Models\Page;
use App\Models\News;
use App\Models\Event;
use App\Models\Video;
use App\Models\Document;
use App\Models\Department;
use App\Models\Minister;
use App\Models\Dminister;
use App\Models\Management;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalContent = Page::count() + News::count() + Event::count() + Video::count() + Document::count();
        $recentContent = Page::where('created_at', '>=', now()->subDays(7))->count() +
                        News::where('created_at', '>=', now()->subDays(7))->count() +
                        Event::where('created_at', '>=', now()->subDays(7))->count() +
                        Video::where('created_at', '>=', now()->subDays(7))->count() +
                        Document::where('created_at', '>=', now()->subDays(7))->count();

        return [
            Stat::make('Total Content', $totalContent)
                ->description('All content items')
                ->descriptionIcon('heroicon-m-squares-2x2')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make('News Articles', News::count())
                ->description('Published news')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success')
                ->chart([2, 1, 3, 2, 4, 3, 2]),

            Stat::make('Events', Event::count())
                ->description('Upcoming & past events')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning')
                ->chart([1, 2, 1, 3, 2, 1, 2]),

            Stat::make('This Week', $recentContent)
                ->description('New content added')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info')
                ->chart([1, 2, 3, 2, 4, 3, 2]),
        ];
    }
}
