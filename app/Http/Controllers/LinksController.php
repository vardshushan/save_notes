<?php

namespace App\Http\Controllers;

use App\Http\Requests\Links\CreateLinkRequest;
use App\Services\Links\LinksService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class LinksController extends Controller
{
    public function __construct( private readonly LinksService $linksService)
    {}

    #[OA\Get(
        path: '/api/links',
        operationId: 'getSavedLinks',
        summary: 'get Saved links',
        requestBody: new OA\RequestBody(
            description: 'get Saved links',
            content: new OA\JsonContent(
                required: [],
                properties: []
            )
        ),
        tags: ['Saved Links'],
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
    public function index(): JsonResponse
    {
        return $this->linksService->getLinks();
    }


    #[OA\Post(
        path: '/api/links',
        operationId: 'createLink',
        summary: 'create new link',
        requestBody: new OA\RequestBody(
            description: 'create new link',
            content: new OA\JsonContent(
                required: ['title', 'link'],
                properties: [
                    new OA\Property(
                        property: 'title',
                        type: 'string',
                        example: 'name'
                    ),
                    new OA\Property(
                        property: 'link',
                        type: 'string',
                        example: 'https://test.com/'
                    ),
                ]
            )
        ),
        tags: ['Saved Links'],
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
    public function store(CreateLinkRequest $request): JsonResponse
    {
       return $this->linksService->createLink($request);
    }


    #[OA\Patch(
        path: '/api/links/{id}',
        operationId: 'updateLink',
        summary: 'update Link',
        requestBody: new OA\RequestBody(
            description: 'update Saved link',
            content: new OA\JsonContent(
                required: ['title', 'link'],
                properties: [
                    new OA\Property(
                        property: 'title',
                        type: 'string',
                        example: 'name'
                    ),
                    new OA\Property(
                        property: 'link',
                        type: 'string',
                        example: 'https://test.com/'
                    ),
                ]
            )
        ),
        tags: ['Saved Links'],
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
    public function update(CreateLinkRequest $request, string $id): JsonResponse
    {
        return $this->linksService->updateLink($request, $id);
    }

    #[OA\Delete(
        path: '/api/links/{id}',
        operationId: 'deleteLink',
        summary: 'delete Link',
        requestBody: new OA\RequestBody(
            description: 'delete Saved link',
            content: new OA\JsonContent(
                required: [],
                properties: []
            )
        ),
        tags: ['Saved Links'],
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
    public function destroy(string $id): JsonResponse
    {
        return $this->linksService->deleteLink($id);
    }
}
