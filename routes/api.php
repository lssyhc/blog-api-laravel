<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\BaseResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Api\EmailVerificationController;

// sanctum auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return BaseResource::success($request->user());
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});

// google auth
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

// email verification
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['signed'])
    ->name('verification.verify');
Route::post('/email/verification-notification', [
    EmailVerificationController::class,
    'sendVerificationEmail'
])
    ->middleware(['auth:sanctum', 'throttle:6,1'])
    ->name('verification.send');
