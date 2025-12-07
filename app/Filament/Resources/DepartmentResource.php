<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Blocks\ImageBlock;
use App\Filament\Blocks\ParagraphBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DepartmentResource\Pages;
use App\Filament\Resources\DepartmentResource\RelationManagers;
use SkyRaptor\FilamentBlocksBuilder\Forms\Components\BlocksInput;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Organization';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Departments';



    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),
            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),
            TextInput::make('icon')->label('Icon (FontAwesome class)'),
            FileUpload::make('banner_image')
                ->directory('departments/banners')
                ->maxSize(20480), // 20MB
            BlocksInput::make('content')
                ->label('Department Content')
                ->blocks([
                    \App\Filament\Blocks\ParagraphBlock::block($form),
                    \App\Filament\Blocks\ImageBlock::block($form),
                    \App\Filament\Blocks\ListBlock::block($form),
                    \App\Filament\Blocks\RichEditorBlock::block($form),
                    \App\Filament\Blocks\CardBlock::block($form),

                ])
                ->columnSpanFull(),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('banner_image'),
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
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
