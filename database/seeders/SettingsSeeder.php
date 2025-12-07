<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Outerweb\Settings\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // General Settings
        Setting::updateOrCreate(
            ['key' => 'general.brand_name'],
            ['value' => 'Office of the President and Cabinet']
        );

        // SEO Settings
        Setting::updateOrCreate(
            ['key' => 'seo.title'],
            ['value' => 'Office of the President and Cabinet - Government of Malawi']
        );

        Setting::updateOrCreate(
            ['key' => 'seo.description'],
            ['value' => 'Official website of the Office of the President and Cabinet, Government of Malawi. Information about the Cabinet, Ministers, Departments, and Government services.']
        );

        Setting::updateOrCreate(
            ['key' => 'seo.keywords'],
            ['value' => 'Malawi, Government, OPC, Office of the President and Cabinet, Cabinet Ministers, Deputy Ministers, Government Services, Government of Malawi']
        );

        Setting::updateOrCreate(
            ['key' => 'seo.keywords'],
            ['value' => 'Malawi, Government, OPC, Office of the President and Cabinet, Cabinet Ministers, Deputy Ministers, Government Services, Government of Malawi']
        );

        // Cabinet Ministers Header Settings
        Setting::updateOrCreate(
            ['key' => 'ministers.header_logo'],
            ['value' => null] // Will use default image path if null
        );

        Setting::updateOrCreate(
            ['key' => 'ministers.header_title'],
            ['value' => 'Government of Malawi']
        );

        Setting::updateOrCreate(
            ['key' => 'ministers.header_main_title'],
            ['value' => 'Cabinet Ministers']
        );

        Setting::updateOrCreate(
            ['key' => 'ministers.header_appointment_text'],
            ['value' => 'The appointments are with effect from 1st January 2025.']
        );

        Setting::updateOrCreate(
            ['key' => 'ministers.header_intro'],
            ['value' => 'The Cabinet of Malawi is the executive branch of the government, made up of the President of Malawi, Vice President, Ministers and Deputy Ministers responsible for the different departments.']
        );

        // Deputy Ministers Header Settings
        Setting::updateOrCreate(
            ['key' => 'deputy_ministers.header_logo'],
            ['value' => null] // Will use default image path if null
        );

        Setting::updateOrCreate(
            ['key' => 'deputy_ministers.header_title'],
            ['value' => 'Government of Malawi']
        );

        Setting::updateOrCreate(
            ['key' => 'deputy_ministers.header_main_title'],
            ['value' => 'Deputy Ministers']
        );

        Setting::updateOrCreate(
            ['key' => 'deputy_ministers.header_appointment_text'],
            ['value' => 'The appointments are with effect from 1st January 2025.']
        );

        Setting::updateOrCreate(
            ['key' => 'deputy_ministers.header_intro'],
            ['value' => 'The Deputy Ministers of Malawi assist Cabinet Ministers in the executive branch of the government, supporting the President and Vice President in various government departments.']
        );

        // Clear settings cache to ensure fresh data
        cache()->forget(config('settings.cache_key'));

        $this->command->info('Settings seeded successfully!');
    }
}

