<?php

namespace App\Helpers;

class SettingsHelper
{
    /**
     * Get header settings for Ministers page
     */
    public static function getMinistersHeader(): array
    {
        return [
            'logo' => setting('ministers.header_logo', 'frontendassets/images/flags/emblam1.jpg'),
            'title' => setting('ministers.header_title', 'Government of Malawi'),
            'main_title' => setting('ministers.header_main_title', 'Cabinet Ministers'),
            'appointment_text' => setting('ministers.header_appointment_text', 'The appointments are with effect from 1st January 2025.'),
            'intro' => setting('ministers.header_intro', 'The Cabinet of Malawi is the executive branch of the government, made up of the President of Malawi, Vice President, Ministers and Deputy Ministers responsible for the different departments.'),
        ];
    }

    /**
     * Get header settings for Deputy Ministers page
     */
    public static function getDeputyMinistersHeader(): array
    {
        return [
            'logo' => setting('deputy_ministers.header_logo', 'frontendassets/images/flags/emblam1.jpg'),
            'title' => setting('deputy_ministers.header_title', 'Government of Malawi'),
            'main_title' => setting('deputy_ministers.header_main_title', 'Deputy Ministers'),
            'appointment_text' => setting('deputy_ministers.header_appointment_text', 'The appointments are with effect from 1st January 2025.'),
            'intro' => setting('deputy_ministers.header_intro', 'The Deputy Ministers of Malawi assist Cabinet Ministers in the executive branch of the government, supporting the President and Vice President in various government departments.'),
        ];
    }
}

