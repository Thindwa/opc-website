<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteAnnouncementResource\Pages;
use App\Models\SiteAnnouncement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteAnnouncementResource extends Resource
{
    protected static ?string $model = SiteAnnouncement::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Site Announcements';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Announcement Content')
                ->schema([
                    Forms\Components\TextInput::make('badge')
                        ->maxLength(50)
                        ->placeholder('Important alert'),
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('message')
                        ->required()
                        ->rows(5)
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->directory('site-announcements')
                        ->visibility('public')
                        ->disk('public')
                        ->imageEditor()
                        ->imageEditorAspectRatios(['16:9', '4:3', '1:1'])
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Call to Action')
                ->schema([
                    Forms\Components\TextInput::make('cta_label')
                        ->label('Primary CTA Label')
                        ->placeholder('Read circular'),
                    Forms\Components\TextInput::make('cta_url')
                        ->label('Primary CTA URL')
                        ->url()
                        ->placeholder('https://...'),
                    Forms\Components\Toggle::make('cta_target_blank')
                        ->label('Open primary CTA in new tab')
                        ->default(false),
                    Forms\Components\TextInput::make('secondary_cta_label')
                        ->label('Secondary CTA Label')
                        ->placeholder('Dismiss'),
                    Forms\Components\TextInput::make('secondary_cta_url')
                        ->label('Secondary CTA URL')
                        ->url()
                        ->placeholder('https://...'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Display Rules')
                ->schema([
                    Forms\Components\ToggleButtons::make('placement')
                        ->label('Display Mode')
                        ->options([
                            'popup' => 'Popup',
                            'banner' => 'Top Bar',
                            'slide_in' => 'Slide-in',
                        ])
                        ->icons([
                            'popup' => 'heroicon-o-window',
                            'banner' => 'heroicon-o-megaphone',
                            'slide_in' => 'heroicon-o-arrow-right-on-rectangle',
                        ])
                        ->colors([
                            'popup' => 'warning',
                            'banner' => 'info',
                            'slide_in' => 'success',
                        ])
                        ->default('popup')
                        ->grouped()
                        ->inline()
                        ->helperText('Popup opens as a modal. Top Bar is a compact strip at the top. Slide-in appears from the corner.')
                        ->required(),
                    Forms\Components\Select::make('style')
                        ->options([
                            'primary' => 'Primary',
                            'info' => 'Info',
                            'success' => 'Success',
                            'warning' => 'Warning',
                            'danger' => 'Danger',
                            'dark' => 'Dark',
                        ])
                        ->default('warning')
                        ->required(),
                    Forms\Components\TextInput::make('priority')
                        ->numeric()
                        ->default(0)
                        ->helperText('Higher numbers are shown first.'),
                    Forms\Components\TextInput::make('dismiss_for_hours')
                        ->label('Dismiss for Hours')
                        ->numeric()
                        ->default(12)
                        ->helperText('How long to wait before showing it again after dismissal.'),
                    Forms\Components\DateTimePicker::make('starts_at')
                        ->label('Start At')
                        ->seconds(false),
                    Forms\Components\DateTimePicker::make('ends_at')
                        ->label('End At')
                        ->seconds(false),
                    Forms\Components\Toggle::make('show_on_homepage')
                        ->default(true),
                    Forms\Components\Toggle::make('show_on_all_pages')
                        ->default(true),
                    Forms\Components\Toggle::make('is_dismissible')
                        ->default(true),
                    Forms\Components\Toggle::make('show_once_per_session')
                        ->default(true),
                    Forms\Components\Toggle::make('is_active')
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('badge')
                    ->badge()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('placement')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'popup' => 'Popup',
                        'banner' => 'Top Bar',
                        'slide_in' => 'Slide-in',
                        default => ucfirst(str_replace('_', ' ', $state)),
                    })
                    ->color(fn (string $state) => match ($state) {
                        'popup' => 'warning',
                        'banner' => 'info',
                        'slide_in' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('style')
                    ->badge()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('priority')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('starts_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('ends_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('priority', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteAnnouncements::route('/'),
            'create' => Pages\CreateSiteAnnouncement::route('/create'),
            'edit' => Pages\EditSiteAnnouncement::route('/{record}/edit'),
        ];
    }
}
