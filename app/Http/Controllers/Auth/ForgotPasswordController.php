<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Inertia\Inertia;
use Inertia\Response;

class ForgotPasswordController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('Auth/ForgotPassword');
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink($request->only('email'));

        return back()->with('status', __($status));
    }
}
