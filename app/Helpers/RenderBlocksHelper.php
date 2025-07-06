<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class RenderBlocksHelper
{
    public static function render(array $blocks): string
    {
        $html = '';

        foreach ($blocks as $block) {
            $type = $block['type'] ?? null;
            $data = $block['data'] ?? [];

            if (! $type) continue;

            // Resolve the block view
            if (!class_exists($type)) continue;

            $view = $type::view();

            if (! view()->exists($view)) {
                $html .= "<!-- Missing view: {$view} -->";
                continue;
            }

            $html .= view($view, $data)->render();
        }

        return $html;
    }
}
