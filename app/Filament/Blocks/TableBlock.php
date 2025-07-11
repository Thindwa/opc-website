<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class TableBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('title')
                ->label('Table Title')
                ->nullable(),

                Components\Repeater::make('headers')
                ->label('Table Headers')
                ->collapsible()
                ->reorderable() // 🟢 Enables drag-and-drop reordering
                ->schema([
                    Components\TextInput::make('text')
                        ->required()
                        ->label('Header Label'),
                ])
                ->minItems(1)
                ->maxItems(10)
                ->columns(1)
                ->addActionLabel('Add Header'),


            Components\Repeater::make('rows')
                ->label('Table Rows')
                ->collapsible() // Make rows collapsible
                ->schema([
                    Components\Repeater::make('cells')
                        ->label('Row Cells')
                        ->collapsible() // Make cells collapsible
                        ->schema([
                            Components\Select::make('type')
                                ->label('Content Type')
                                ->options([
                                    'text' => 'Text',
                                    'list' => 'Checklist',
                                ])
                                ->default('text')
                                ->required()
                                ->reactive(),

                            Components\Textarea::make('value')
                                ->label('Text Content')
                                ->rows(2)
                                ->visible(fn ($get) => $get('type') === 'text'),

                            Components\Repeater::make('list')
                                ->label('Checklist Items')
                                ->collapsible() // Make list items collapsible
                                ->schema([
                                    Components\TextInput::make('item')
                                        ->label('Item')
                                        ->required(),
                                ])
                                ->visible(fn ($get) => $get('type') === 'list')
                                ->minItems(1)
                                ->addActionLabel('Add Item'),
                        ])
                        ->minItems(1)
                        ->columns(1)
                        ->addActionLabel('Add Cell'),
                ])
                ->minItems(1)
                ->columnSpanFull()
                ->addActionLabel('Add Row'),
        ]);
    }


    public static function view(): string
    {
        return 'blocks.table-block';
    }
}
