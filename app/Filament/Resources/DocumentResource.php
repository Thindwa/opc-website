<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('category_type')
                ->label('Category Type')
                ->required()
                ->options([
                    'Speeches' => 'Speeches',
                    'Strategic-plan' => 'Strategic-plan',
                    'Press-Releases' => 'Press-Releases',
                    'Regulations' => 'Regulations',
                    'Reports' => 'Reports',
                    'Acts and Laws' => 'Acts and Laws',
                    'Policies' => 'Policies',
                    'Guidelines' => 'Guidelines',
                    'Circulars' => 'Circulars',
                    'Notices' => 'Notices',
                    'Forms' => 'Forms',
                    'Publications' => 'Publications',
                    'Brochures' => 'Brochures',
                    'Manuals' => 'Manuals',
                    'Templates' => 'Templates',
                    'FAQs' => 'FAQs',
                    'Announcements' => 'Announcements',
                    'Newsletters' => 'Newsletters',
                    'Press Releases' => 'Press Releases',
                    'Media Kits' => 'Media Kits',
                    'Reports and Publications' => 'Reports and Publications',
                    'Research Papers' => 'Research Papers',
                    'White Papers' => 'White Papers',
                    'Case Studies' => 'Case Studies',
                    'Guidelines and Standards' => 'Guidelines and Standards',
                    'Guidelines' => 'Guidelines',
                    'Miscellaneous' => 'Miscellaneous',
                    'Tenders' => 'Tenders',
                    'Vacancies' => 'Vacancies',
                    'Advertisements' => 'Advertisements',
                    'Announcements' => 'Announcements',
                    'Others' => 'Others',

                ])
                ->searchable(),

                Forms\Components\FileUpload::make('files')
                ->label('Upload Documents')
                ->required()
                ->multiple()
                ->directory('documents')
                ->visibility('public')
                ->downloadable()
                ->preserveFilenames()
                ->reorderable()
                ->columnSpanFull(),

        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_type'),

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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'view' => Pages\ViewDocument::route('/{record}'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
