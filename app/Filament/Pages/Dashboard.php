<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    public function getWidgets(): array
    {
        // Widgets are now manually placed in the dashboard view
        return [];
    }

    public function getColumns(): int | string | array
    {
        return 2;
    }
}
