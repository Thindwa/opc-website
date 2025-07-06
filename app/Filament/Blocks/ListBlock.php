<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class ListBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Textarea::make('items')
                ->label('List Items (one per line)')
                ->required()
                ->rows(6),

            Components\Select::make('type')
                ->label('List Type')
                ->options([
                    'ul' => 'Unordered',
                    'ol' => 'Ordered',
                ])
                ->default('ul'),

            Components\Select::make('style')
                ->label('Bullet Style')
                ->options([
                    'disc' => 'Disc (default)',
                    'circle' => 'Circle',
                    'square' => 'Square',
                    'decimal' => 'Decimal',
                    'roman' => 'Roman',
                    'alpha' => 'Alphabetic',
                ])
                ->default('disc'),

            Components\Select::make('alignment')
                ->label('Text Alignment')
                ->options([
                    'text-start' => 'Left',
                    'text-center' => 'Center',
                    'text-end' => 'Right',
                ])
                ->default('text-start'),

            Components\TextInput::make('class')
                ->label('Custom CSS Classes')
                ->placeholder('e.g. mb-4 text-muted'),
                Components\Toggle::make('show_icons')
                ->label('Show Icons')
                ->default(false),

            Components\TextInput::make('icon')
                ->label('Icon class (e.g. fa fa-check)')
                ->placeholder('Optional')
                ->visible(fn ($get) => $get('show_icons'))
                ->default('bi bi-check-circle'),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.list-block';
    }
}
