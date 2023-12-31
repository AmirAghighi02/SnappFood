<?php

namespace App\Providers;

use App\Events\CartPaid;
use App\Events\CartStatusChanged;
use App\Events\OrderCanceled;
use App\Listeners\ChangePartyCount;
use App\Listeners\InformAboutCanceledOrder;
use App\Listeners\SendCartPaidEmail;
use App\Listeners\SendStatusEmail;
use App\Models\Restaurant;
use App\Observers\RestaurantObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CartStatusChanged::class => [SendStatusEmail::class],
        CartPaid::class => [
            SendCartPaidEmail::class,
            ChangePartyCount::class
        ],
        OrderCanceled::class => [
            InformAboutCanceledOrder::class
        ]
    ];

//    protected $observers = [
//        Restaurant::class => [RestaurantObserver::class]
//    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Restaurant::observe(RestaurantObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
