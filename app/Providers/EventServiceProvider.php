<?php

namespace App\Providers;

use App\Listeners\LogAuthenticatedActivity;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            LogAuthenticatedActivity::class,
        ],
        Logout::class => [
            LogAuthenticatedActivity::class,
        ],
    ];
}
