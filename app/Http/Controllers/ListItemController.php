<?php
namespace App\Http\Controllers;

use App\Http\Requests\Lists\ListItemRequest;
use App\Services\ListFolders\ListItemService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class ListItemController
{
    public function __construct(private readonly ListItemService $listItemService)
    {
    }

    public function store(ListItemRequest $request): JsonResponse|string
    {
        return $this->listItemService->createListItem($request);
    }
}



