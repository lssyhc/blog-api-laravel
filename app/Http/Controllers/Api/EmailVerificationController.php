<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use Illuminate\Auth\Events\Verified;

class EmailVerificationController extends Controller
{
    public function verify(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!hash_equals(
            (string)$request->route('hash'),
            sha1($user->getEmailForVerification())
        )) {
            return BaseResource::error('Verification link or invalid signature.', 403);
        }

        if (!$request->hasValidSignature()) {
            return BaseResource::error('The verification link has expired or invalid.', 403);
        }

        if ($user->hasVerifiedEmail()) {
            if ($request->has('redirect_to')) {
                return redirect($request->redirect_to . '?status=already_verified');
            }
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));

            if ($request->has('redirect_to')) {
                return redirect($request->redirect_to . '?status=success');
            }
        }

        if ($request->has('redirect_to')) {
            return redirect($request->redirect_to . '?status=error');
        }
    }

    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return BaseResource::error('Email already verified.', 400);
        }

        $request->user()->sendEmailVerificationNotification();
        return BaseResource::success(message: 'Verification link sent!');
    }
}
