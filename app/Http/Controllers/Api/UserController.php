<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return BaseResource::success(
            new UserResource($request->user()),
            message: 'Successfully retrieve user details.'
        );
    }
}
