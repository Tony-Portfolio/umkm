<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function apiResponse($data = [], $message = '', $success = true, $errors = null, $metadata = [], $status = 200)
    {
        return response()->json([
            'version'  => 1,
            'message'  => $message,
            'success'  => $success,
            'errors'   => $errors,
            'metadata' => $metadata,
            'results'  => $data,
        ], $status);
    }

    protected function authorizeUser(Request $request)
    {
        if (!$request->user()) {
            return response()->json([
                'version' => 1,
                'message' => 'Unauthorized',
                'success' => false,
                'results' => null,
            ], 401);
        }
    }
}
