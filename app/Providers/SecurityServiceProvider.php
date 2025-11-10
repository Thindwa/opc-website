<?php

namespace App\Providers;

use App\Services\SecurityLoggingService;
use App\Services\SecureFileUploadService;
use Illuminate\Support\ServiceProvider;

class SecurityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SecurityLoggingService::class);
        $this->app->singleton(SecureFileUploadService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register security event listeners
        $this->registerSecurityEventListeners();
    }

    /**
     * Register security event listeners
     */
    private function registerSecurityEventListeners(): void
    {
        // Security event listeners with error handling
        \Illuminate\Support\Facades\Event::listen('auth.failed', function ($event) {
            try {
                app(SecurityLoggingService::class)->logFailedLogin(
                    $event->credentials['email'] ?? 'unknown',
                    request()->ip(),
                    request()->userAgent()
                );
            } catch (\Exception $e) {
                // Log error but don't break the application
                \Illuminate\Support\Facades\Log::error('Security logging failed: ' . $e->getMessage());
            }
        });

        \Illuminate\Support\Facades\Event::listen('auth.login', function ($event) {
            try {
                app(SecurityLoggingService::class)->logSuccessfulLogin(
                    $event->user->id,
                    request()->ip(),
                    request()->userAgent()
                );
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Security logging failed: ' . $e->getMessage());
            }
        });

        \Illuminate\Support\Facades\Event::listen('auth.logout', function ($event) {
            try {
                app(SecurityLoggingService::class)->logSecurityEvent('user_logout', [
                    'user_id' => $event->user->id ?? null,
                ]);
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Security logging failed: ' . $e->getMessage());
            }
        });
    }
}
