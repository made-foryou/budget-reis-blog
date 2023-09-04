<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\SavingModel;
use App\Listeners\GenerateSlug;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SaveAndUpdateRouteListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

/**
 * ## Event service provider
 * ---
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        SavingModel::class => [
            GenerateSlug::class,
            SaveAndUpdateRouteListener::class,
        ],

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
