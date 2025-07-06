<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class QuoteBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Textarea::make('quote')->label('Quote')->required(),
            Components\TextInput::make('author')->label('Author')->nullable(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.quote-block';
    }
}
