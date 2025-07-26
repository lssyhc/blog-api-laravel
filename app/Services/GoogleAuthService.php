<?php

namespace App\Services;

use App\Http\Traits\ManagesApiTokens;
use App\Models\User;
use Illuminate\Support\Str;

class GoogleAuthService
{
    use ManagesApiTokens;

    public function handleCallback(object $googleUser): array
    {
        $user = User::updateOrCreate(
            [
                'google_id' => $googleUser->getId(),
            ],
            [
                'fullname' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'username' => $this->generateUniqueUsername($googleUser->getEmail()),
                'email_verified_at' => now()
            ]
        );

        $token = $this->issueToken($user, 'google-auth-token');
        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    private function generateUniqueUsername(string $email): string
    {
        $username = Str::before($email, '@');
        $originalUsername = $username;

        while (User::where('username', $username)->exists()) {
            $username = $originalUsername . Str::random(4);
        }
        return $username;
    }
}
