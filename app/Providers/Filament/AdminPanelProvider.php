<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Hasnayeen\Themes\ThemesPlugin;
use Filament\Http\Middleware\Authenticate;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Hasnayeen\Themes\Http\Middleware\SetTheme;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Outerweb\FilamentImageLibrary\Filament\Plugins\FilamentImageLibraryPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->favicon(asset('favicon.ico'))
            ->colors([
                'primary' => Color::Amber,
            ])
            ->resources([
                config('filament-logger.activity_resource')
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([


                \App\Filament\Widgets\ContentStatsWidget::class,
                \App\Filament\Widgets\OrganizationStatsWidget::class,
                \App\Filament\Widgets\SecurityDashboardWidget::class,
                \App\Filament\Widgets\ActivityLogWidget::class,
                \App\Filament\Widgets\RecentActivitiesWidget::class,
                \App\Filament\Widgets\RecentNewsWidget::class,
                \App\Filament\Widgets\UpcomingEventsWidget::class,
                \App\Filament\Widgets\QuickActionsWidget::class,
                \App\Filament\Widgets\ContentChartWidget::class,
            ])
            ->plugins([
                FilamentImageLibraryPlugin::make()
                    ->allowedDisks([
                        'public' => 'Public images',
                    ]),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,

                SetTheme::class
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
                BreezyCore::make()
                    ->myProfile(shouldRegisterUserMenu: true),
                FilamentBackgroundsPlugin::make(),
                ThemesPlugin::make(),
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_START,
                fn () => '<script data-navigate-once="true" data-update-uri="' . $this->getLivewireUpdateUri() . '">
    (function(){
        var origFetch = window.fetch;
        window.fetch = function(){
            var args = arguments;
            if(args[1] && args[1].method==="POST" && args[0] && typeof args[0]==="string" && args[0].includes("lw.php")){
                args[1].headers = args[1].headers || {};
                args[1].headers["Content-Type"] = "text/plain;charset=UTF-8";
            }
            return origFetch.apply(this, args);
        };
    })();
</script>',
            )
            ->viteTheme('resources/css/filament/admin/theme.css');
    }

    private function getLivewireUpdateUri(): string
    {
        return url('/lw.php');
    }
}
