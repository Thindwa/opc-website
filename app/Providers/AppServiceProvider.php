<?php

namespace App\Providers;

use Livewire\Livewire;
use Filament\Tables\Table;
use App\Policies\ActivityPolicy;
use App\Policies\ActivityLogPolicy;
use App\Policies\DepartmentPolicy;
use App\Policies\VideoPolicy;
use App\Models\ActivityLog;
use App\Models\Department;
use App\Models\Video;
use App\Services\FrontendContentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;
use BezhanSalleh\FilamentShield\FilamentShield;

class AppServiceProvider extends ServiceProvider
{
    protected array $policies = [
        Activity::class => ActivityPolicy::class,
        ActivityLog::class => ActivityLogPolicy::class,
        Department::class => DepartmentPolicy::class,
        Video::class => VideoPolicy::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->configurePolicies();

        $this->configureDB();

        $this->configureModels();

        $this->configureFilament();

        $this->configureFrontendViews();

        $this->configureLivewireScriptRoute();

        $this->configureSubdirectoryUrl();
    }

    private function configureLivewireScriptRoute(): void
    {
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/vendor/livewire/livewire.js', $handle);
        });
    }

    private function configureSubdirectoryUrl(): void
    {
        if (app()->environment('local')) {
            return;
        }

        $appUrl = config('app.url');
        if ($appUrl) {
            $this->app->make('url')->forceRootUrl($appUrl);
        }
    }

    private function configurePolicies(): void
    {
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }

    private function configureDB(): void
    {
        DB::prohibitDestructiveCommands($this->app->environment('production'));
    }

    private function configureModels(): void
    {
        Model::preventAccessingMissingAttributes();

        // Mass assignment protection is enabled by default in Laravel
        // Each model should define $fillable or $guarded arrays
        // Model::unguard() removed for security - mass assignment protection is now active
    }

    private function configureFilament(): void
    {
        FilamentShield::prohibitDestructiveCommands($this->app->isProduction());

        Table::configureUsing(fn (Table $table) => $table->paginationPageOptions([10, 25, 50]));
    }

    private function configureFrontendViews(): void
    {
        View::composer('layouts.frontend', function ($view) {
            $view->with('siteAnnouncementPopup', app(FrontendContentService::class)->getPopupAnnouncement());
        });
    }
}
