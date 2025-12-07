<?php

namespace App\View\Composers;

use Illuminate\View\View;

class SeoComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('seo', \App\Helpers\SeoHelper::getDefaults());
    }
}

