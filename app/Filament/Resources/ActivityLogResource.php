<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use App\Models\ActivityLog;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\ViewAction;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\KeyValueEntry;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'System Monitoring';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Activity Logs';

    public static function shouldRegisterNavigation(): bool
    {
        return false; // Temporarily disable to fix login
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('log_name')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('action_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('resource_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('resource_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ip_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('device_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('device_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('browser_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('os_name')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Time')
                    ->dateTime('M j, Y g:i A')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable()
                    ->default('System'),

                Tables\Columns\TextColumn::make('formatted_action')
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
                    }),

                Tables\Columns\TextColumn::make('resource_type')
                    ->label('Resource')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('device_info')
                    ->label('Device')
                    ->getStateUsing(fn (ActivityLog $record) => $record->device_info)
                    ->limit(50)
                    ->tooltip(fn (ActivityLog $record) => $record->device_info),

                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('time_ago')
                    ->label('Time Ago')
                    ->getStateUsing(fn (ActivityLog $record) => $record->time_ago)
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('action_type')
                    ->label('Action Type')
                    ->options([
                        'login' => 'Login',
                        'logout' => 'Logout',
                        'create' => 'Create',
                        'update' => 'Update',
                        'delete' => 'Delete',
                        'view' => 'View',
                    ])
                    ->multiple(),

                SelectFilter::make('device_type')
                    ->label('Device Type')
                    ->options([
                        'mobile' => 'Mobile',
                        'desktop' => 'Desktop',
                        'tablet' => 'Tablet',
                    ])
                    ->multiple(),

                SelectFilter::make('resource_type')
                    ->label('Resource Type')
                    ->options(function () {
                        return ActivityLog::distinct('resource_type')
                            ->whereNotNull('resource_type')
                            ->pluck('resource_type', 'resource_type')
                            ->toArray();
                    })
                    ->multiple(),

                SelectFilter::make('causer_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('From Date'),
                        DatePicker::make('created_until')
                            ->label('Until Date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                ViewAction::make()
                    ->infolist([
                        Section::make('Activity Details')
                            ->schema([
                                TextEntry::make('description')
                                    ->label('Description'),
                                TextEntry::make('formatted_action')
                                    ->label('Action')
                                    ->getStateUsing(fn (ActivityLog $record) => $record->formatted_action),
                                TextEntry::make('created_at')
                                    ->label('Time')
                                    ->dateTime('M j, Y g:i A'),
                                TextEntry::make('time_ago')
                                    ->label('Time Ago')
                                    ->getStateUsing(fn (ActivityLog $record) => $record->time_ago),
                            ])
                            ->columns(2),

                        Section::make('User Information')
                            ->schema([
                                TextEntry::make('user.name')
                                    ->label('User')
                                    ->default('System'),
                                TextEntry::make('user.email')
                                    ->label('Email')
                                    ->default('N/A'),
                            ])
                            ->columns(2),

                        Section::make('Device Information')
                            ->schema([
                                TextEntry::make('device_info')
                                    ->label('Device Details')
                                    ->getStateUsing(fn (ActivityLog $record) => $record->device_info),
                                TextEntry::make('ip_address')
                                    ->label('IP Address'),
                                TextEntry::make('user_agent')
                                    ->label('User Agent')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Section::make('Resource Information')
                            ->schema([
                                TextEntry::make('resource_type')
                                    ->label('Resource Type'),
                                TextEntry::make('resource_id')
                                    ->label('Resource ID'),
                            ])
                            ->columns(2),

                        Section::make('Additional Data')
                            ->schema([
                                KeyValueEntry::make('properties')
                                    ->label('Properties'),
                                KeyValueEntry::make('additional_data')
                                    ->label('Additional Data'),
                            ])
                            ->collapsible(),
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('created_at', '>=', now()->subDay())->count();
    }
}
