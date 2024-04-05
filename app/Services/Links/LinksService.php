<?php

namespace App\Services\Links;

use App\Http\Requests\Links\CreateLinkRequest;
use App\Models\Links;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LinksService
{
    public function createLink(CreateLinkRequest $request): JsonResponse
    {
        try {
            Links::query()->create([
                'title' => $request->title,
                'link' => $request->link,
                'user_id' => Auth::user()->id,
            ]);
            return response()->json(['message' => "OK!"]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function updateLink(CreateLinkRequest $request, string $id): JsonResponse
    {
        try {
            $link = Links::query()->findOrFail($id);

            if ($link->user_id !== Auth::user()->id) {
                return response()->json(['message' => "User does not have that link."], 403);
            }

            $link->update([
                'title' => $request->title,
                'link' => $request->link,
            ]);

            return response()->json(['message' => "OK!"]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function getLinks(): JsonResponse
    {
        try {
            $links = Links::query()->where('user_id', Auth::user()->id)->get();
            return response()->json(['links' => $links]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function deleteLink(string $id): JsonResponse
    {
        try {
            $link = Links::query()->findOrFail($id);

            if ($link->user_id !== Auth::user()->id) {
                return response()->json(['message' => "You don't have this link."], 403);
            }

            $link->delete();
            return response()->json(['message' => "Link deleted successfully"]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
