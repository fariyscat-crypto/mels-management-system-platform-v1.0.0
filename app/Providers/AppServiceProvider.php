<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register application services.
    }

    public function boot(): void
    {
        Inertia::share([
            'app.name' => config('app.name'),
            'auth.user' => fn () => Auth::user() ? [
                'id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'role' => Auth::user()->role,
                'roles' => Auth::user()->getRoleNames(),
            ] : null,
            'flash' => fn () => [
                'success' => session('success'),
                'error' => session('error'),
            ],
            'csrf_token' => csrf_token(),
        ]);
    }
}
