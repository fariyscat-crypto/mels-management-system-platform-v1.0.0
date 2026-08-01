<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        'login',
        'logout',
        'register',
        'forgot-password',
        'reset-password',
        'email/verification-notification',
        'projects',
        'projects/*',
    ];
}
