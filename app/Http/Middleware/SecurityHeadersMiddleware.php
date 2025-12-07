<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Security Headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

        // Content Security Policy
        // Note: 'unsafe-inline' and 'unsafe-eval' are required for Livewire/Alpine.js functionality
        // Livewire uses Alpine.js which dynamically evaluates expressions, requiring unsafe-eval
        // TODO: Consider using CSP nonces in the future if Livewire/Alpine support them

        // Allow HTTP images in development (for localhost), HTTPS only in production
        $imgSrc = app()->environment('production')
            ? "'self' data: https:"
            : "'self' data: http: https:";

        $csp = "default-src 'self'; " .
               "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://maps.googleapis.com; " .
               "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://fonts.bunny.net https://cdn.jsdelivr.net; " .
               "font-src 'self' data: https://fonts.gstatic.com https://fonts.bunny.net; " .
               "img-src {$imgSrc}; " .
               "connect-src 'self' https://maps.googleapis.com; " .
               "frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com https://player.vimeo.com; " .
               "frame-ancestors 'none'; " .
               "base-uri 'self'; " .
               "form-action 'self';";

        $response->headers->set('Content-Security-Policy', $csp);

        // HSTS (HTTP Strict Transport Security) - only in production
        if (app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        return $response;
    }
}
