<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class SliderBlock extends Block
{
    public static function block(\Filament\Forms\Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Repeater::make('slides')
                ->label('Slides')
                ->schema([
                    Components\TextInput::make('title')->required(),
                    Components\TextInput::make('subtitle')->nullable(),
                    Components\TextInput::make('button_text')->nullable(),
                    Components\TextInput::make('button_link')->nullable(),
                    Components\FileUpload::make('image')
                        ->image()
                        ->required()
                        ->directory('slider')
                ])
                ->minItems(1)
                ->addActionLabel('Add Slide'),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.slider-block';
    }
}
