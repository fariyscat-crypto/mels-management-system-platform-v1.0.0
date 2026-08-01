<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/employees', [ManagementController::class, 'employees'])->name('employees.index');
    Route::get('/clients', [ManagementController::class, 'clients'])->name('clients.index');
    Route::get('/tasks', [ManagementController::class, 'tasks'])->name('tasks.index');
    Route::get('/roles-permissions', [ManagementController::class, 'rolesPermissions'])->name('roles-permissions.index');
    Route::get('/users', [ManagementController::class, 'users'])->name('users.index');

    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware(['signed'])
        ->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->name('verification.send');
});
