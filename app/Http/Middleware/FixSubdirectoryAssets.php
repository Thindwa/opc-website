<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FixSubdirectoryAssets
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (
            $response->headers->has('Content-Type')
            && str_contains($response->headers->get('Content-Type'), 'text/html')
            && method_exists($response, 'getContent')
        ) {
            $basePath = $this->getBasePath($request);

            if ($basePath) {
                $content = $response->getContent();
                $correctPath = $basePath . '/livewire/update';

                $content = str_replace(
                    'data-update-uri="/livewire/update"',
                    'data-update-uri="' . $correctPath . '"',
                    $content
                );

                $content = str_replace(
                    '"uri":"/livewire/update"',
                    '"uri":"' . $correctPath . '"',
                    $content
                );

                $content = str_replace(
                    "'/livewire/update'",
                    "'" . $correctPath . "'",
                    $content
                );

                $response->setContent($content);
            }
        }

        return $response;
    }

    private function getBasePath(Request $request): string
    {
        $basePath = $request->getBasePath();
        if ($basePath && $basePath !== '/') {
            return $basePath;
        }

        $appUrl = config('app.url');
        if ($appUrl) {
            $parsed = parse_url($appUrl);
            $path = $parsed['path'] ?? '';
            if ($path && $path !== '/') {
                return rtrim($path, '/');
            }
        }

        return '';
    }
}
