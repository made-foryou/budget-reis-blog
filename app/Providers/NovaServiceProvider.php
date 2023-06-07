<?php

declare(strict_types=1);

namespace App\Providers;

use App\Nova\Dashboards\Main;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

/**
 * ## Nova service provider
 * ---
 */
class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     */
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewNova', function ($user) {
            return $user->email == 'menno@made-foryou.nl';
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     */
    protected function dashboards(): array
    {
        return [
            new Main(),
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     */
    public function tools(): array
    {
        return [
            ...parent::tools(),
        ];
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        parent::register();

        //
    }
}
