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

    #[OA\Post(
        path: '/api/credentials',
        operationId: 'createCredential',
        summary: 'create new credential',
        requestBody: new OA\RequestBody(
            description: 'create new credential',
            content: new OA\JsonContent(
                required: ['title'],
                properties: [
                    new OA\Property(
                        property: 'title',
                        type: 'string',
                        example: 'title'
                    ),
                    new OA\Property(
                        property: 'username',
                        type: 'string',
                        example: 'username'
                    ),
                    new OA\Property(
                        property: 'password',
                        type: 'string',
                        example: '*********'
                    ),
                    new OA\Property(
                        property: 'email',
                        type: 'string',
                        example: 'test@gmail.com'
                    ),
                    new OA\Property(
                        property: 'token',
                        type: 'string',
                        example: 'token'
                    ),
                    new OA\Property(
                        property: 'phone_number',
                        type: 'string',
                        example: '+37494254568'
                    ),
                    new OA\Property(
                        property: 'other',
                        type: 'string',
                        example: 'other information'
                    ),
                ]
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
                response: 500
            ),
        ]
    )]
    public function store(AccountCredentialsRequest $accountCredentialsRequest): JsonResponse
    {
        return $this->accountCredentialsService->createCredential($accountCredentialsRequest);
    }
    #[OA\Patch(
        path: '/api/credentials/{id}',
        operationId: 'updateCredentials',
        summary: 'update credentials',
        requestBody: new OA\RequestBody(
            description: 'update credentials',
            content: new OA\JsonContent(
                required: ['title'],
                properties: [
                    new OA\Property(
                        property: 'title',
                        type: 'string',
                        example: 'title'
                    ),
                    new OA\Property(
                        property: 'username',
                        type: 'string',
                        example: 'username'
                    ),
                    new OA\Property(
                        property: 'password',
                        type: 'string',
                        example: '*********'
                    ),
                    new OA\Property(
                        property: 'email',
                        type: 'string',
                        example: 'test@gmail.com'
                    ),
                    new OA\Property(
                        property: 'token',
                        type: 'string',
                        example: 'token'
                    ),
                    new OA\Property(
                        property: 'phone_number',
                        type: 'string',
                        example: '+37494254568'
                    ),
                    new OA\Property(
                        property: 'other',
                        type: 'string',
                        example: 'other information'
                    ),
                ]
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
                response: 500
            ),
        ]
    )]
    public function update(AccountCredentialsRequest $accountCredentialsRequest, string $id): JsonResponse
    {
        return $this->accountCredentialsService->updateCredential($accountCredentialsRequest, $id);
    }

    #[OA\Delete(
        path: '/api/credentials/{id}',
        operationId: 'deleteCredential',
        summary: 'delete Link',
        requestBody: new OA\RequestBody(
            description: 'delete credential',
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
                response: 500
            ),
        ]
    )]

    public function destroy(string $id): JsonResponse
    {
        return $this->accountCredentialsService->deleteCredential($id);
    }

}
