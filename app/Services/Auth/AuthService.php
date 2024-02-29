<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

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
        $user = User::query()->where('email', trim(strtolower($request->email)))->first();
        if ($user) {
            if (!empty($user->password) && Hash::check($request->password, $user->password)) {
                $tokenName = 'default_token';

                $token = $user->createToken($tokenName)->plainTextToken;
                return response()->json(['message' => 'OK!', 'token' => $token]);
            }
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
