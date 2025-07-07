<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DministerResource\Pages;
use App\Filament\Resources\DministerResource\RelationManagers;
use App\Models\Dminister;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DministerResource extends Resource
{
    protected static ?string $model = Dminister::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->label('Full Name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('position')
                ->label('Official Position')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('image')
                ->label('Profile Image')
                ->image()
                ->imageEditor() // Optional image editor
                ->directory('dminister-images') // Optional storage path
                ->visibility('public') // For public access
                ->imagePreviewHeight('150')
                ->maxSize(1024), // Optional: limit to 1MB
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('image')
                ->label('Photo')
                ->circular(), // makes it round
            Tables\Columns\TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('position')
                ->label('Position')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Updated')
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
            'index' => Pages\ListDministers::route('/'),
            'create' => Pages\CreateDminister::route('/create'),
            'view' => Pages\ViewDminister::route('/{record}'),
            'edit' => Pages\EditDminister::route('/{record}/edit'),
        ];
    }
}
