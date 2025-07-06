<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class MapBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('location')
                ->label('Google Maps Embed URL')
                ->required(),
            Components\TextInput::make('height')
                ->label('Map Height (e.g., 400px)')
                ->default('400px'),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.map-block';
    }
}
