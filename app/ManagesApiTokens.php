<?php

namespace App;

use App\Models\User;

trait ManagesApiTokens
{
    protected function issueToken(User $user, string $tokenName = 'auth-token'): string
    {
        $user->tokens()->delete();

        return $user->createToken(
            $tokenName,
            ['*'],
            now()->addMinutes(config('sanctum.expiration', 1440))
        )->plainTextToken;
    }
}
