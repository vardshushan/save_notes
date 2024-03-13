<?php

namespace App\Services\AccountCredentials;

use App\Http\Requests\AccountCredentials\AccountCredentialsRequest;
use App\Models\AccountCredential;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AccountCredentialsService
{
    public function createCredential(AccountCredentialsRequest $request): JsonResponse
    {
        try {
            AccountCredential::query()->create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'username' => $request->username,
                'password' => $request->password,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'token' => $request->token,
                'other' => $request->other,
            ]);
            return response()->json(['message' => "OK!"]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function updateCredential(AccountCredentialsRequest $request, string $id): JsonResponse
    {
        try {
            $credential = AccountCredential::query()->findOrFail($id);

            if ($credential->user_id !== Auth::user()->id) {
                return response()->json(['message' => "User does not have that credential."], 403);
            }

            $credential->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'username' => $request->username,
                'password' => $request->password,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'token' => $request->token,
                'other' => $request->other,
            ]);

            return response()->json(['message' => "OK!"]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function getCredential(): JsonResponse
    {
        try {
            $credentials = AccountCredential::query()->where('user_id', Auth::user()->id)->get();
            return response()->json(['credentials' => $credentials]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function deleteCredential(string $id): JsonResponse
    {
        try {
            $credential = AccountCredential::query()->findOrFail($id);

            if ($credential->user_id !== Auth::user()->id) {
                return response()->json(['message' => "You don't have this credential."], 403);
            }

            $credential->delete();
            return response()->json(['message' => "Credential deleted successfully"]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
