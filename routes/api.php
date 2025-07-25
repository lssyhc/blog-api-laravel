<?php

use Illuminate\Http\Request;
use App\Http\Resources\BaseResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return BaseResource::success($request->user());
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
