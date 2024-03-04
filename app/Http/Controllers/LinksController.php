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
                response: 401
            ),
        ]
    )]
    public function index(): JsonResponse
    {
        return $this->linksService->getLinks();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLinkRequest $request): JsonResponse
    {
       return $this->linksService->createLink($request);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CreateLinkRequest $request, string $id): JsonResponse
    {
        return $this->linksService->updateLink($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return $this->linksService->deleteLink($id);
    }
}
