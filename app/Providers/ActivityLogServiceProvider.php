<?php

namespace App\Providers;

use App\Services\ActivityLoggingService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Database\Eloquent\Model;

class ActivityLogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ActivityLoggingService::class);
    }

    public function boot(): void
    {
        // Register event listeners
        $this->registerEventListeners();

        // Register model observers
        $this->registerModelObservers();
    }

    private function registerEventListeners(): void
    {
        // Login event
        Event::listen(Login::class, function (Login $event) {
            try {
                app(ActivityLoggingService::class)->logLogin($event->user, request());
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Activity logging failed: ' . $e->getMessage());
            }
        });

        // Logout event
        Event::listen(Logout::class, function (Logout $event) {
            try {
                app(ActivityLoggingService::class)->logLogout($event->user, request());
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Activity logging failed: ' . $e->getMessage());
            }
        });
    }

    private function registerModelObservers(): void
    {
        // You can add model observers here for automatic activity logging
        // For example:
        // User::observe(UserActivityObserver::class);
        // Page::observe(PageActivityObserver::class);
    }
}
