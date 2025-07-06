<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class RichEditorBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\RichEditor::make('content')
                ->label('Content')
                ->required(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.rich-editor-block';
    }
}
