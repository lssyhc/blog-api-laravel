<?php

namespace App\Http\Controllers\Auth;

use App\Services\GoogleAuthService;
use App\Http\Controllers\Controller;
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

        $queryParams = [
            'token' => $result['token'],
            'user' => json_encode($result['user'])
        ];

        $frontendUrl = config('app.frontend_url') .
            '/auth/google/callback?' . http_build_query($queryParams);
        return redirect($frontendUrl);
    }
}
