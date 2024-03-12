<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountCredentials\AccountCredentialsRequest;
use App\Services\AccountCredentials\AccountCredentialsService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class AccountCredentialsController extends Controller
{

    public function __construct( private readonly AccountCredentialsService $accountCredentialsService)
    {}

    #[OA\Get(
        path: '/api/credentials',
        operationId: 'getCredentials',
        summary: 'get account credentials',
        requestBody: new OA\RequestBody(
            description: 'get credentials list',
            content: new OA\JsonContent(
                required: [],
                properties: []
            )
        ),
        tags: ['Account Credentials'],
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
        return $this->accountCredentialsService->getCredential();
    }

    public function store(AccountCredentialsRequest $request): JsonResponse
    {
        return $this->accountCredentialsService->createCredential($request);
    }

    public function update(AccountCredentialsRequest $request, string $id): JsonResponse
    {
        return $this->accountCredentialsService->updateCredential($request, $id);
    }

    public function destroy(string $id): JsonResponse
    {
        return $this->accountCredentialsService->deleteCredential($id);
    }

}
