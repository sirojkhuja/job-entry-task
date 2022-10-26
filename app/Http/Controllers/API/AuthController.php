<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password')) && Auth::user()->role === 'Admin') {
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'You logged in successfully!!!',
                'data' => $token
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized',
        ], 401);
    }
}
