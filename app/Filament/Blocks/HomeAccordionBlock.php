<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class HomeAccordionBlock extends Block
{
    public static function block(\Filament\Forms\Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Repeater::make('items')
                ->label('Accordion Items')
                ->schema([
                    Components\TextInput::make('title')->required(),
                    Components\Textarea::make('body')->rows(4)->required(),
                ])
                ->minItems(1),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.home-accordion-block';
    }
}
