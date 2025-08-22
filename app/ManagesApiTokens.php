<?php

namespace App;

use App\Models\User;

trait ManagesApiTokens
{
    protected function issueToken(User $user, string $tokenName = 'auth-token'): string
    {
        $user->tokens()->delete();

        $maxTokens = config('sanctum.max_tokens_per_user', 5);
        if ($user->tokens()->count() > $maxTokens) {
            $user->tokens()->oldest()->first()->delete();
        }

        $abilities = $this->getAbilitiesForUser($user);

        return $user->createToken(
            $tokenName,
            $abilities,
            now()->addMinutes(config('sanctum.expiration', 1440))
        )->plainTextToken;
    }

    private function getAbilitiesForUser(User $user): array
    {
        return match ($user->role) {
            'admin' => ['*'],
            'user' => ['user:read', 'user:update'],
            default => ['user:read']
        };
    }
}
