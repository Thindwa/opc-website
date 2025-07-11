<?php
namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class SectionTabsBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\Repeater::make('tabs')
                ->label('Tab Sections')
                ->schema([
                    Components\Hidden::make('id')
                        ->reactive()
                        ->afterStateHydrated(function ($component, $state) {
                            // If it's empty when loaded, leave it — will be set later
                        }),

                    Components\TextInput::make('title')
                        ->label('Tab Title')
                        ->required()
                        ->live()
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            if (!$get('id')) {
                                $set('id', Str::slug($state));
                            }
                        }),

                    Components\Builder::make('content')
                        ->label('Tab Content')
                        ->blocks([
                            \App\Filament\Blocks\ParagraphBlock::block($form),
                            \App\Filament\Blocks\RichEditorBlock::block($form),
                        ])
                ])
                ->minItems(1)
                ->columnSpanFull()
        ]);
    }

    public static function view(): string
    {
        return 'blocks.section-tabs-block';
    }
}

