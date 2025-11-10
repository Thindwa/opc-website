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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
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
         	Livewire::setScriptRoute(function ($handle) {
    return Route::get('/vendor/livewire/livewire.js', $handle);
});
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

        Model::unguard();
    }

    private function configureFilament(): void
    {
        FilamentShield::prohibitDestructiveCommands($this->app->isProduction());

        Table::configureUsing(fn (Table $table) => $table->paginationPageOptions([10, 25, 50]));
    }
}
