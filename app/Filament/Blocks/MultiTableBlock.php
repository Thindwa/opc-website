<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class MultiTableBlock extends Block
{
    public static function block(Form $form): \Filament\Forms\Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Repeater::make('tables')
                ->label('Tables')
                ->collapsible() // Collapse each full table block
                ->schema([
                    Components\TextInput::make('title')->label('Table Title')->nullable(),

                    Components\Repeater::make('headers')
                        ->label('Headers')
                        ->collapsible() // Collapse each header row
                        ->schema([
                            Components\TextInput::make('text')
                                ->label('Header Label')
                                ->required(),
                        ])
                        ->minItems(1)
                        ->columns(1),

                    Components\Repeater::make('rows')
                        ->label('Rows')
                        ->collapsible() // Collapse each row
                        ->reorderable()
                        ->reorderableWithButtons()
                        ->schema([
                            Components\Repeater::make('cells')
                                ->label('Cells')
                                ->collapsible() // Collapse each cell
                                ->schema([
                                    Components\Textarea::make('text')
                                        ->label('Text')
                                        ->rows(2)
                                        ->nullable(),

                                    Components\FileUpload::make('image')
                                        ->label('Image (optional)')
                                        ->image()
                                        ->directory('table/images')
                                        ->nullable(),

                                        Components\Select::make('bg')
                                        ->label('Background Color')
                                        ->options([
                                            'success' => 'Green',
                                            'warning' => 'Yellow',
                                            'info' => 'Blue',
                                            'danger' => 'Red',
                                            'secondary' => 'Gray',
                                            'orange' => 'Orange', // 👈 Add this
                                            'none' => 'None',
                                        ])
                                        ->default('none'),

                                ])
                                ->minItems(1)
                                ->collapsible(),
                        ])
                        ->minItems(1),
                ])
                ->minItems(1)
                ->columnSpanFull(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.multi-table-block';
    }
}
