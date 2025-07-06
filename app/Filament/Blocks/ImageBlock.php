<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class ImageBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\FileUpload::make('image')
                ->image()
                ->directory('blocks/images')
                ->required(),

            Components\TextInput::make('alt')->label('Alt Text')->nullable(),
            Components\Textarea::make('caption')
            ->label('Caption or Description')
            ->nullable()
            ->rows(2),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.image-block';
    }
}
