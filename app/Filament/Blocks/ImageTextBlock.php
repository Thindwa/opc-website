<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class ImageTextBlock extends Block
{
    public static function block(\Filament\Forms\Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\FileUpload::make('image')
                ->label('Image')
                ->image()
                ->directory('blocks')
                ->required(),
            Components\TextInput::make('name')->required(),
            Components\TextInput::make('heading')->required(),
            Components\Textarea::make('content')->rows(5)->required(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.image-text-block';
    }
}
