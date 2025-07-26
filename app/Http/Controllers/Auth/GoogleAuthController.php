<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\UserResource;
use App\Services\GoogleAuthService;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback(GoogleAuthService $googleAuthService)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $result = $googleAuthService->handleCallback($googleUser);

        return BaseResource::success(
            new UserResource($result['user'], $result['token']),
            201,
            'Successfully logged in using Google.'
        );
    }
}
