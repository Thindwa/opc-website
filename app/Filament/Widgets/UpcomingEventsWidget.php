<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class UpcomingEventsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Event::query()
                    ->where('start_date', '>=', Carbon::today())
                    ->orderBy('start_date')
                    ->limit(4)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->size(50)
                    ->defaultImageUrl('/images/placeholder-event.jpg'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->weight('medium')
                    ->color('primary'),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Date')
                    ->date('M j, Y')
                    ->sortable()
                    ->size('sm')
                    ->color('gray'),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->limit(25)
                    ->size('sm')
                    ->color('gray'),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Event $record): string => route('filament.admin.resources.events.edit', $record))
                    ->icon('heroicon-m-eye')
                    ->size('sm'),
            ])
            ->paginated(false)
            ->striped();
    }
}
