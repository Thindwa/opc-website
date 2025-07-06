<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class VideoBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('url')
                ->label('Video URL (YouTube or Vimeo)')
                ->url()
                ->required(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.video-block';
    }
}
