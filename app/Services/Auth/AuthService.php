<?php

namespace App\Services\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            User::query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return response()->json(['message' => "User successfully created."]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = auth()->user()->createToken('loginToken')->accessToken->token;
            return response()->json(['message'=>'OK!', 'token' => $token]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
