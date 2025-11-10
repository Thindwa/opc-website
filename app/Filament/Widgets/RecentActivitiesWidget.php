<?php

namespace App\Filament\Widgets;

use App\Models\ActivityLog;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class RecentActivitiesWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ActivityLog::query()
                    ->with('user')
                    ->latest()
                    ->limit(8)
            )
            ->columns([
                TextColumn::make('created_at')
                    ->label('Time')
                    ->dateTime('M j, g:i A')
                    ->sortable()
                    ->size('sm')
                    ->color('gray'),

                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->default('System')
                    ->badge()
                    ->color('primary')
                    ->size('sm'),

                TextColumn::make('formatted_action')
                    ->label('Action')
                    ->getStateUsing(fn (ActivityLog $record) => $record->formatted_action)
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        str_contains($state, 'login') => 'success',
                        str_contains($state, 'logout') => 'warning',
                        str_contains($state, 'create') => 'info',
                        str_contains($state, 'update') => 'primary',
                        str_contains($state, 'delete') => 'danger',
                        str_contains($state, 'view') => 'gray',
                        default => 'secondary',
                    })
                    ->size('sm'),

                TextColumn::make('device_info')
                    ->label('Device')
                    ->getStateUsing(fn (ActivityLog $record) => $record->device_info)
                    ->limit(25)
                    ->tooltip(fn (ActivityLog $record) => $record->device_info)
                    ->size('sm')
                    ->color('gray'),
            ])
            ->paginated(false)
            ->poll('30s')
            ->striped();
    }
}
