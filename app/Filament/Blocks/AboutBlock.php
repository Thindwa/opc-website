<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components;
use Filament\Forms\Form;
use SkyRaptor\FilamentBlocksBuilder\Blocks\Contracts\Block;

class AboutBlock extends Block
{
    public static function block(Form $form): Components\Builder\Block
    {
        return parent::block($form)->schema([
            Components\TextInput::make('title')
                ->label('Section Title')
                ->default('About Us'),


            Components\FileUpload::make('logo')
                ->label('Logo')
                ->image()
                ->directory('footer/logos')
                ->nullable(),

            Components\Textarea::make('description')
                ->label('Description')
                ->rows(4)
                ->required(),

            Components\Repeater::make('social_links')
                ->label('Social Media Links')
                ->schema([
                    Components\TextInput::make('url')->label('URL')->required(),
                    Components\Select::make('icon')
                    ->label('Icon')
                    ->options([
                        'fab fa-facebook-f' => 'Facebook',
                        'fab fa-twitter' => 'Twitter',
                        'fab fa-instagram' => 'Instagram',
                        'fab fa-youtube' => 'YouTube',
                        'fab fa-linkedin-in' => 'LinkedIn',
                        'fab fa-tiktok' => 'TikTok',
                        'fab fa-whatsapp' => 'WhatsApp',
                        'fab fa-telegram-plane' => 'Telegram',
                        'fab fa-snapchat-ghost' => 'Snapchat',
                        'fab fa-github' => 'GitHub',
                        'fab fa-pinterest' => 'Pinterest',
                        'fab fa-reddit-alien' => 'Reddit',
                        'fab fa-vimeo-v' => 'Vimeo',
                        'fab fa-soundcloud' => 'SoundCloud',
                        'fab fa-medium-m' => 'Medium',
                        'fab fa-dribbble' => 'Dribbble',
                        'fab fa-behance' => 'Behance',
                    ])
                    ->searchable()
                    ->required()

                ])
                ->addActionLabel('Add Social Link')
                ->minItems(1)
        ]);
    }

    public static function view(): string
    {
        return 'blocks.about-block';
    }
}
