<?php

namespace App\Providers;

use App\Events\ProductUpdated;
use App\Listeners\AuditProductUpdate;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ProductUpdated::class => [
            AuditProductUpdate::class,
        ],
    ];

    public function boot()
    {
        //
    }
}
