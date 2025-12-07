<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MinisterResource\Pages;
use App\Filament\Resources\MinisterResource\RelationManagers;
use App\Models\Minister;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MinisterResource extends Resource
{
    protected static ?string $model = Minister::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = 'Organization';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Ministers';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('position')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('position_type')
                ->label('Position Type')
                ->required()
                ->options([
                    'President' => 'President',
                    'VP' => 'Vice President',
                    'Second_VP' => 'Second Vice President',
                    'Ministers' => 'Minister',
                ])
                ->native(false), // optional: makes it a searchable dropdown

            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('minister-images')
                ->visibility('public')
                ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'])
                ->maxSize(20480) // 20MB
                ->imageEditor()
                ->imagePreviewHeight('150'),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position_type'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListMinisters::route('/'),
            'create' => Pages\CreateMinister::route('/create'),
            'view' => Pages\ViewMinister::route('/{record}'),
            'edit' => Pages\EditMinister::route('/{record}/edit'),
        ];
    }
}
