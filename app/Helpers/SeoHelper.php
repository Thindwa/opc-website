<?php

namespace App\Helpers;

class SeoHelper
{
    /**
     * Get default SEO data from settings
     */
    public static function getDefaults(): array
    {
        return [
            'title' => setting('seo.title', 'Office of the President and Cabinet - Government of Malawi'),
            'description' => setting('seo.description', 'Official website of the Office of the President and Cabinet, Government of Malawi.'),
            'keywords' => setting('seo.keywords', 'Malawi, Government, OPC, Office of the President and Cabinet, Cabinet Ministers'),
            'image' => setting('seo.image', asset('frontendassets/images/default.jpg')),
            'site_name' => setting('general.brand_name', 'Office of the President and Cabinet'),
            'url' => url()->current(),
        ];
    }

    /**
     * Get SEO data for a page with optional overrides
     */
    public static function get(array $overrides = []): array
    {
        $defaults = self::getDefaults();

        return array_merge($defaults, array_filter($overrides));
    }

    /**
     * Generate page title
     */
    public static function title(?string $pageTitle = null, ?string $siteName = null): string
    {
        $siteName = $siteName ?? setting('general.brand_name', 'Office of the President and Cabinet');

        if ($pageTitle) {
            return $pageTitle . ' - ' . $siteName;
        }

        return setting('seo.title', $siteName);
    }
}

