<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class HeadingBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('text')->label('Heading')->required(),
            Components\Select::make('level')
                ->label('Heading Level')
                ->options([
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                ])
                ->default('h2')
                ->required(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.heading-block';
    }
}
