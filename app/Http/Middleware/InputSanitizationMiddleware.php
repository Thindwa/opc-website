<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InputSanitizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only sanitize non-AJAX requests and exclude certain routes
        if (!$request->ajax() && !$this->shouldSkipSanitization($request)) {
            // Sanitize all input data
            $input = $request->all();
            $sanitizedInput = $this->sanitizeArray($input);

            // Replace the request input with sanitized data
            $request->replace($sanitizedInput);
        }

        return $next($request);
    }

    /**
     * Check if sanitization should be skipped for this request
     */
    private function shouldSkipSanitization(Request $request): bool
    {
        // Skip sanitization for admin routes, API routes, and authentication routes
        $skipRoutes = [
            'filament.*',
            'admin.*',
            'login',
            'logout',
            'register',
            'api.*',
        ];

        foreach ($skipRoutes as $route) {
            if ($request->routeIs($route)) {
                return true;
            }
        }

        // Skip for AJAX requests
        if ($request->ajax()) {
            return true;
        }

        // Skip for admin panel requests
        if (str_starts_with($request->path(), 'admin')) {
            return true;
        }

        return false;
    }

    /**
     * Recursively sanitize array data
     */
    private function sanitizeArray(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->sanitizeArray($value);
            } else {
                $data[$key] = $this->sanitizeString($value);
            }
        }

        return $data;
    }

    /**
     * Sanitize string input
     */
    private function sanitizeString($value)
    {
        if (!is_string($value)) {
            return $value;
        }

        // Remove null bytes
        $value = str_replace(chr(0), '', $value);

        // Remove control characters except newlines and tabs
        $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $value);

        // Trim whitespace
        $value = trim($value);

        return $value;
    }
}
