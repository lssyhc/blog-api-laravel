<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\UserResource;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                $user->update(['google_id' => $googleUser->getId()]);
            } else {
                $username_base = Str::slug(Str::before($googleUser->getEmail(), '@'));
                $username = $username_base;

                $counter = 1;
                while (User::where('username', $username)->exists()) {
                    $username = $username_base . $counter;
                    $counter++;
                }

                $user = User::create([
                    'google_id' => $googleUser->getId(),
                    'fullname' => $googleUser->getName(),
                    'username' => $username,
                    'email' => $googleUser->getEmail(),
                    'password' => null,
                ]);
            }
        }

        $token = $user->createToken(
            'auth-token-google',
            ['*'],
            now()->addMinutes(config('sanctum.expiration', 1440))
        )->plainTextToken;
        return BaseResource::success([
            'message' => 'Login with Google successful',
            'user' => new UserResource($user, $token),
        ], 201);
    }
}
