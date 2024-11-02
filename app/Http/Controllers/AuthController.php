<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user,
            ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();
            return response()->json([
                'message' => 'Logged out successfully.',
                'success' => true,
            ]);
        }

        return response()->json([
            'message' => 'No user is logged in.',
            'success' => false,
        ], 401);
    }
}
