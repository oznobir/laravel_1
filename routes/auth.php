<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisterController::class, 'store']);



    Route::get('login', [AuthController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthController::class, 'store']);



    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [VerifyEmailController::class, 'prompt'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, 'verify'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [VerifyEmailController::class, 'send'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmPasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmPasswordController::class, 'store']);

    Route::put('password', UpdatePasswordController::class)->name('password.update');


    Route::post('logout', [AuthController::class, 'destroy'])
                ->name('logout');
});
