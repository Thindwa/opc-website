<?php

namespace App\Filament\Widgets;

use App\Models\News;
use App\Models\Event;
use App\Models\Page;
use App\Models\Document;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class ContentChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Content Created This Year';

    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        // Get data for the last 12 months
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');

            $data[] = [
                'news' => News::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'events' => Event::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'pages' => Page::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'documents' => Document::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        }

        return [
            'datasets' => [
                [
                    'label' => 'News',
                    'data' => array_column($data, 'news'),
                    'backgroundColor' => 'rgba(34, 197, 94, 0.2)',
                    'borderColor' => 'rgb(34, 197, 94)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Events',
                    'data' => array_column($data, 'events'),
                    'backgroundColor' => 'rgba(245, 158, 11, 0.2)',
                    'borderColor' => 'rgb(245, 158, 11)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Pages',
                    'data' => array_column($data, 'pages'),
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Documents',
                    'data' => array_column($data, 'documents'),
                    'backgroundColor' => 'rgba(107, 114, 128, 0.2)',
                    'borderColor' => 'rgb(107, 114, 128)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
