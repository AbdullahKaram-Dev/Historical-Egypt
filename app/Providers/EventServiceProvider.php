<?php

namespace App\Providers;

use App\Events\CopticViewers;
use App\Events\IslamicViewers;
use App\Events\ModernViewers;
use App\Events\PharaonicViewers;
use App\Listeners\IncreaseCounterCoptic;
use App\Listeners\IncreaseCounterIslamic;
use App\Listeners\IncreaseCounterModern;
use App\Listeners\IncreaseCounterPharaonic;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        PharaonicViewers::class => [
            IncreaseCounterPharaonic::class,
        ],

        ModernViewers::class => [
            IncreaseCounterModern::class,
        ],

        CopticViewers::class => [
            IncreaseCounterCoptic::class,
        ],

        IslamicViewers::class => [
            IncreaseCounterIslamic::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
