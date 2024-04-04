<?php

namespace App\Http\Controllers;

use App\Services\ListFolders\ListFoldersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ListFolderController extends Controller
{
    public function __construct(private readonly ListFoldersService $listFoldersService)
    {
    }

    #[OA\Post(
        path: '/api/folder',
        operationId: 'createFolder',
        summary: 'create new folder for list',
        requestBody: new OA\RequestBody(
            description: 'create new folder',
            content: new OA\JsonContent(
                required: [],
                properties: [
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
    public function store(Request $request): JsonResponse|string
    {
        return $this->listFoldersService->createFolder($request);
    }

}
