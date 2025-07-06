<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class ColumnsBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Select::make('columns')
                ->label('Number of Columns')
                ->options([
                    2 => '2 Columns',
                    3 => '3 Columns',
                ])
                ->default(2)
                ->required(),

            Repeater::make('content')
                ->label('Column Content')
                ->schema([
                    Components\RichEditor::make('html')
                        ->label('Content')
                        ->required(),
                ])
                ->minItems(2)
                ->maxItems(3)
                ->columns(1)
                ->reorderable(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.columns-block';
    }
}
