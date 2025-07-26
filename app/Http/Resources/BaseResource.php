<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public static function success($data = null, $code = 200, $message = 'Successful action.')
    {
        return response()->json([
            'code' => $code,
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'error' => null
        ], $code);
    }

    public static function error($error, $code = 500)
    {
        return response()->json([
            'code' => $code,
            'status' => 'error',
            'data' => null,
            'error' => $error
        ], $code);
    }
}
