<?php

use App\Http\Controllers\SellerAuth\AuthenticatedSessionController;
use App\Http\Controllers\SellerAuth\ConfirmablePasswordController;
use App\Http\Controllers\SellerAuth\EmailVerificationNotificationController;
use App\Http\Controllers\SellerAuth\EmailVerificationPromptController;
use App\Http\Controllers\SellerAuth\NewPasswordController;
use App\Http\Controllers\SellerAuth\PasswordController;
use App\Http\Controllers\SellerAuth\PasswordResetLinkController;
use App\Http\Controllers\SellerAuth\RegisteredUserController;
use App\Http\Controllers\SellerAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('is_admin')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
