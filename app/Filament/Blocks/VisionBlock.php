<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class VisionBlock extends Block
{
    public static function block(\Filament\Forms\Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('title')->required(),
            Components\FileUpload::make('image')->image()->required()->directory('vision'),
            Components\Repeater::make('bullets')
                ->schema([
                    Components\TextInput::make('text')->required(),
                ])
                ->minItems(1),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.vision-block';
    }
}
