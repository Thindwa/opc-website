<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class QuickActionsWidget extends Widget
{
    protected static string $view = 'filament.widgets.quick-actions-widget';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 4;

    public function getActions(): array
    {
        return [
            [
                'label' => 'Create Page',
                'description' => 'Add new website pages',
                'icon' => 'heroicon-o-document-text',
                'color' => 'primary',
                'url' => '/admin/pages/create',
            ],
            [
                'label' => 'Create News',
                'description' => 'Publish news articles',
                'icon' => 'heroicon-o-newspaper',
                'color' => 'success',
                'url' => '/admin/news/create',
            ],
            [
                'label' => 'Create Event',
                'description' => 'Schedule new events',
                'icon' => 'heroicon-o-calendar-days',
                'color' => 'warning',
                'url' => '/admin/events/create',
            ],
            [
                'label' => 'Create Document',
                'description' => 'Add documents & files',
                'icon' => 'heroicon-o-document',
                'color' => 'info',
                'url' => '/admin/documents/create',
            ],
            [
                'label' => 'Create Video',
                'description' => 'Upload video content',
                'icon' => 'heroicon-o-video-camera',
                'color' => 'gray',
                'url' => '/admin/videos/create',
            ],
            [
                'label' => 'Manage Users',
                'description' => 'User administration',
                'icon' => 'heroicon-o-users',
                'color' => 'danger',
                'url' => '/admin/users',
            ],
        ];
    }
}
