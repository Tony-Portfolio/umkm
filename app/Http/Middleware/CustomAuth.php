<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            // Return custom response if not authenticated
            return response()->json([
                'version' => 1,
                'message' => 'Unauthorized',
                'success' => false,
                'results' => null,
            ], 401);
        }

        return $next($request); // Proceed to the next middleware or request handler
    }
}
