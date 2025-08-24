<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\ManagesApiTokens;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    use ManagesApiTokens;

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $token = $this->issueToken($user);
        $user->sendEmailVerificationNotification();

        return BaseResource::success(
            new UserResource($user, $token),
            201,
            'User successfully registered. Check email to verify.'
        );
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($validated)) {
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
