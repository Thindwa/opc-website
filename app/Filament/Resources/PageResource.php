<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Page;
use Filament\Tables;
use Blocks\Layout\Card;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use League\CommonMark\Node\Block\Paragraph;
use SkyRaptor\FilamentBlocksBuilder\Blocks;
use App\Filament\Resources\PageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PageResource\RelationManagers;
use SkyRaptor\FilamentBlocksBuilder\Forms\Components\BlocksInput;



class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
            ->required()
            ->reactive()
            ->afterStateUpdated(function (callable $set, $state) {
                $set('slug', \Str::slug($state));
            }),

        TextInput::make('slug')
            ->required()
            ->unique(ignoreRecord: true),

            BlocksInput::make('content')
                ->label('Page Content')
                ->blocks(fn () => [
                    \App\Filament\Blocks\HeadingBlock::block($form),
                    \App\Filament\Blocks\ParagraphBlock::block($form),
                    \App\Filament\Blocks\ColumnsBlock::block($form),
                    \App\Filament\Blocks\ImageBlock::block($form),
                    \App\Filament\Blocks\ButtonBlock::block($form),
                    \App\Filament\Blocks\QuoteBlock::block($form),
                    \App\Filament\Blocks\DividerBlock::block($form),
                    \App\Filament\Blocks\ListBlock::block($form),
                    \App\Filament\Blocks\SectionTabsBlock::block($form),
                    \App\Filament\Blocks\VideoBlock::block($form),
                    \App\Filament\Blocks\RichEditorBlock::block($form),
                    \App\Filament\Blocks\AccordionBlock::block($form),
                    \App\Filament\Blocks\TabsBlock::block($form),
                    \App\Filament\Blocks\TableBlock::block($form),
                    \App\Filament\Blocks\MultiTableBlock::block($form),
                    \App\Filament\Blocks\CardBlock::block($form),
                    \App\Filament\Blocks\CodeBlock::block($form),
                    \App\Filament\Blocks\MapBlock::block($form),

                ])
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
