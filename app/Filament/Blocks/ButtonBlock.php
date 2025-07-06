<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class ButtonBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('text')->label('Button Text')->required(),
            Components\TextInput::make('url')->label('Button URL')->url()->required(),
            Components\Select::make('color')
                ->label('Button Color')
                ->options([
                    'primary' => 'Primary',
                    'secondary' => 'Secondary',
                    'success' => 'Success',
                    'danger' => 'Danger',
                    'warning' => 'Warning',
                    'info' => 'Info',
                    'light' => 'Light',
                    'dark' => 'Dark',
                ])
                ->default('primary'),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.button-block';
    }
}
