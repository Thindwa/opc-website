<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Security headers middleware (safe to enable)
        $middleware->append(\App\Http\Middleware\SecurityHeadersMiddleware::class);

        // Rate limiting and CSRF protection
        $middleware->throttleApi();
        $middleware->validateCsrfTokens();

        // Input sanitization for web routes only (exclude admin)
        $middleware->web(append: [
            \App\Http\Middleware\InputSanitizationMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
