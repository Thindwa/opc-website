<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class CardBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('title')
                ->label('Card Title')
                ->nullable(),

            Components\Select::make('icon')
                ->label('Icon (optional FontAwesome class)')
                ->options([
                    'fas fa-gavel' => 'Gavel',
                    'fas fa-eye' => 'Eye',
                    'fas fa-bullseye' => 'Bullseye',
                    'fas fa-check-circle' => 'Check Circle',
                ])
                ->searchable()
                ->nullable(),

            Components\Builder::make('content')
                ->label('Card Content')
                ->blocks([
                    \App\Filament\Blocks\HeadingBlock::block($form),
                    \App\Filament\Blocks\ParagraphBlock::block($form),
                    \App\Filament\Blocks\RichEditorBlock::block($form),
                    \App\Filament\Blocks\ListBlock::block($form),
                ])
                ->columnSpanFull(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.card-block';
    }
}
