<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;

class LogAuthenticatedActivity
{
    public function handle($event): void
    {
        if ($event instanceof Login) {
            Log::info('User login', ['user_id' => $event->user->id, 'email' => $event->user->email]);
        }

        if ($event instanceof Logout) {
            if ($event->user) {
                Log::info('User logout', ['user_id' => $event->user->id, 'email' => $event->user->email]);
            }
        }
    }
}
