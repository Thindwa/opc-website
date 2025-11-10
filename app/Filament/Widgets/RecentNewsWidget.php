<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentNewsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                News::query()->latest()->limit(4)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->size(50)
                    ->defaultImageUrl('/images/placeholder-news.jpg'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(35)
                    ->weight('medium')
                    ->color('primary'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Published')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->size('sm')
                    ->color('gray'),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (News $record): string => route('filament.admin.resources.news.edit', $record))
                    ->icon('heroicon-m-eye')
                    ->size('sm'),
            ])
            ->paginated(false)
            ->striped();
    }
}
