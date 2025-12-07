<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class SliderBlock extends Block
{
    public static function block(\Filament\Forms\Form $form): Components\Builder\Block
    {
        return parent::block($form)
            ->label('Slider / Carousel')
            ->icon('heroicon-o-photo')
            ->schema([
            Components\Select::make('design')
                ->label('Slider Design')
                ->options([
                    'design1' => 'Design 1: Side-by-Side (Text Left, Image Right)',
                    'design2' => 'Design 2: Text Overlay on Image (Left Aligned)',
                    'design3' => 'Design 3: Centered Text Overlay on Image',
                    'design4' => 'Design 4: Side-by-Side (Image Left, Text Right)',
                    'design5' => 'Design 5: Full-Width Image with Text Below',
                ])
                ->default('design1')
                ->required()
                ->helperText('Choose a professional slider design style'),
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
