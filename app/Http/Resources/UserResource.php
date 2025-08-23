<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function __construct(
        $resource,
        public ?string $token = null
    ) {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'user_id' => $this->id,
                'fullname' => $this->fullname,
                'username' => $this->username,
                'email' => $this->when(
                    $request->user()?->id === $this->id ||
                        $request->user()->role === 'admin',
                    $this->email
                ),
                'role' => $this->role ?? 'user',
                'is_verified' => $this->email_verified_at !== null,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
            ],
            'token' => $this->when($this->token !== null, $this->token),
            'token_type' => $this->when($this->token !== null, 'Bearer Token'),
            'expires_at' => $this->when(
                $this->token !== null,
                now()->addMinutes(config('sanctum.expiration', 1440))->toIso8601String()
            )
        ];
    }
}
