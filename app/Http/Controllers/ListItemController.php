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

    #[OA\Post(
        path: '/api/list',
        operationId: 'createListItem',
        summary: 'create new list item',
        requestBody: new OA\RequestBody(
            description: 'create new list item',
            content: new OA\JsonContent(
                required: ['folder_id', 'title'],
                properties: [
                    new OA\Property(
                        property: 'folder_id',
                        type: 'integer',
                        example: 1
                    ),
                    new OA\Property(
                        property: 'title',
                        type: 'string',
                        example: 'title'
                    ),
                ]
            )
        ),
        tags: ['Lists'],
        responses: [
            new OA\Response(
                ref: '#/components/responses/SuccessResponse',
                response: 200
            ),
            new OA\Response(
                ref: '#/components/responses/UnAuthorizedResource',
                response: 500
            ),
        ]
    )]
    public function store(ListItemRequest $request): JsonResponse|string
    {
        return $this->listItemService->createListItem($request);
    }
}



