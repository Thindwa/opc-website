<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class DividerBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([]); // no input fields needed
    }

    public static function view(): string
    {
        return 'blocks.divider-block';
    }
}
