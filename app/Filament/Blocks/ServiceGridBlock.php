<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class ServiceGridBlock extends Block
{
    public static function block(\Filament\Forms\Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Repeater::make('cards')
                ->schema([
                    Components\FileUpload::make('image')->image()->directory('services')->required(),
                    Components\TextInput::make('title')->required(),
                    Components\Textarea::make('description')->rows(3)->required(),
                    Components\TextInput::make('link')->label('Read More URL')->nullable(),
                ])
                ->minItems(1)
                ->addActionLabel('Add Card'),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.service-grid-block';
    }
}
