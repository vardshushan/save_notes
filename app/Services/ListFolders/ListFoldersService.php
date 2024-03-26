<?php

namespace App\Services\ListFolders;


use App\Enums\ListStatus;
use App\Models\Folder;
use App\Models\ListItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListFoldersService
{
    public function createFolder(Request $request): JsonResponse|string
    {
        try {
            $newFolder = Folder::query()->create([
                'user_id' => auth()->user()->id,
                'title' => $request->title ? $request->title : now()->format('D M d, Y h:i A'),
            ]);

            ListItem::query()->create([
                'folder_id' => $newFolder->id,
                'title' => '',
                'status' => ListStatus::PENDING
            ]);
            return response()->json(['message' => "OK!"]);

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
