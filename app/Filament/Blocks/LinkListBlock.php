<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class LinkListBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('title')
                ->label('Section Title')
                ->default('Useful Links'),

            Components\Repeater::make('links')
                ->label('Links')
                ->schema([
                    Components\TextInput::make('label')->label('Text')->required(),
                    Components\TextInput::make('url')->label('URL')->required(),
                ])
                ->minItems(1)
                ->addActionLabel('Add Link'),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.link-list-block';
    }
}
