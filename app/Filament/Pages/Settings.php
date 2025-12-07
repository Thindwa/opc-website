<?php

namespace App\Filament\Pages;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;

class Settings extends BaseSettings
{
    use HasPageShield;

    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 1;

    public function schema(): array|Closure
    {
        return [
            Tabs::make('Settings')
                ->schema([
                    Tabs\Tab::make('General')
                        ->schema([
                            TextInput::make('general.brand_name')
                                ->required(),
                        ]),
                    Tabs\Tab::make('Seo')
                        ->schema([
                            TextInput::make('seo.title')
                                ->label('Default SEO Title')
                                ->helperText('This will be used as the default title for all pages')
                                ->required(),
                            Textarea::make('seo.description')
                                ->label('Default Meta Description')
                                ->helperText('This will be used as the default description for all pages (150-160 characters recommended)')
                                ->rows(3)
                                ->required(),
                            TextInput::make('seo.keywords')
                                ->label('Default Keywords')
                                ->helperText('Comma-separated keywords for SEO')
                                ->placeholder('Malawi, Government, OPC, Office of the President and Cabinet'),
                            FileUpload::make('seo.image')
                                ->label('Default Social Media Image')
                                ->helperText('Image used for social media sharing (Open Graph/Twitter). Recommended size: 1200x630px')
                                ->image()
                                ->directory('settings/seo')
                                ->visibility('public')
                                ->disk('public'),
                        ]),
                    Tabs\Tab::make('Page Headers')
                        ->schema([
                            Section::make('Cabinet Ministers Header')
                                ->schema([
                                    FileUpload::make('ministers.header_logo')
                                        ->label('Logo Image')
                                        ->image()
                                        ->directory('settings/ministers')
                                        ->visibility('public')
                                        ->disk('public'),
                                    TextInput::make('ministers.header_title')
                                        ->label('Small Title (e.g., "Government of Malawi")')
                                        ->default('Government of Malawi'),
                                    TextInput::make('ministers.header_main_title')
                                        ->label('Main Title')
                                        ->default('Cabinet Ministers'),
                                    TextInput::make('ministers.header_appointment_text')
                                        ->label('Appointment Text')
                                        ->default('The appointments are with effect from 1st January 2025.'),
                                    Textarea::make('ministers.header_intro')
                                        ->label('Introduction Paragraph')
                                        ->rows(3)
                                        ->default('The Cabinet of Malawi is the executive branch of the government, made up of the President of Malawi, Vice President, Ministers and Deputy Ministers responsible for the different departments.'),
                                ])
                                ->collapsed(),
                            Section::make('Deputy Ministers Header')
                                ->schema([
                                    FileUpload::make('deputy_ministers.header_logo')
                                        ->label('Logo Image')
                                        ->image()
                                        ->directory('settings/deputy-ministers')
                                        ->visibility('public')
                                        ->disk('public'),
                                    TextInput::make('deputy_ministers.header_title')
                                        ->label('Small Title (e.g., "Government of Malawi")')
                                        ->default('Government of Malawi'),
                                    TextInput::make('deputy_ministers.header_main_title')
                                        ->label('Main Title')
                                        ->default('Deputy Ministers'),
                                    TextInput::make('deputy_ministers.header_appointment_text')
                                        ->label('Appointment Text')
                                        ->default('The appointments are with effect from 1st January 2025.'),
                                    Textarea::make('deputy_ministers.header_intro')
                                        ->label('Introduction Paragraph')
                                        ->rows(3)
                                        ->default('The Deputy Ministers of Malawi assist Cabinet Ministers in the executive branch of the government, supporting the President and Vice President in various government departments.'),
                                ])
                                ->collapsed(),
                        ]),
                ]),
        ];
    }
}
