<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function __construct($resource, $token = null)
    {
        parent::__construct($resource);
        $this->token = $token;
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
                'email' => $this->email,
                'role' => $this->role ?? 'user',
                'is_verified' => $this->email_verified_at ? true : false,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
            ],
            'token' => $this->token,
            'token_type' => 'Bearer Token'
        ];
    }
}
