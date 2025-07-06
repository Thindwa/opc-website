<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class CodeBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Select::make('language')
                ->options([
                    'html' => 'HTML',
                    'css' => 'CSS',
                    'js' => 'JavaScript',
                    'php' => 'PHP',
                    'bash' => 'Bash',
                ])
                ->default('html')
                ->required(),
            Components\Textarea::make('code')
                ->label('Code')
                ->rows(10)
                ->required(),
        ]);
    }

    public static function view(): string
    {
        return 'blocks.code-block';
    }
}
