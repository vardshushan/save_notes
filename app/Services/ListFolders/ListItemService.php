<?php

namespace App\Services\ListFolders;


use App\Enums\ListStatus;
use App\Http\Requests\Lists\ListItemRequest;
use App\Models\ListItem;
use Illuminate\Http\JsonResponse;

class ListItemService
{
    public function createListItem(ListItemRequest $request): JsonResponse|string
    {
        try {
            ListItem::query()->create([
                'folder_id' => $request->folder_id,
                'title' => $request->title,
                'status' => ListStatus::PENDING
            ]);
            return response()->json(['message' => "OK!"]);

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
