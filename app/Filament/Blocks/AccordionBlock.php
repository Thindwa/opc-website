<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class AccordionBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Repeater::make('items')
                ->label('Accordion Items')
                ->schema([
                    Components\TextInput::make('title')->required(),
                    Components\Textarea::make('content')->required(),
                ])
                ->minItems(1)
                ->reorderable()
        ]);
    }

    public static function view(): string
    {
        return 'blocks.accordion-block';
    }
}
