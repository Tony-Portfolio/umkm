<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AuthToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$token || !preg_match('/Bearer\s(\S+)/', $token, $matches)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('api_token', hash('sha256', $matches[1]))->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Set the user in the request
        $request->merge(['user' => $user]);

        return $next($request);
    }
}
