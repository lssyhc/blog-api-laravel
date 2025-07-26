<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\ManagesApiTokens;

class AuthController extends Controller
{
    use ManagesApiTokens;

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        $token = $this->issueToken($user);

        return BaseResource::success(new UserResource($user, $token), 201, 'User successfully registered.');
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return BaseResource::error('The provided credentials are incorrect.', 401);
        }

        $user = $request->user();
        $token = $this->issueToken($user);

        return BaseResource::success(new UserResource($user, $token), message: 'Successfully logged in.');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return BaseResource::success(message: 'Successfully logged out.');
    }
}
