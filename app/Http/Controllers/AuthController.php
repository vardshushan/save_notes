<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{

    public function __construct(private readonly AuthService $authService)
    {
    }

    #[OA\Post(
        path: '/api/register',
        operationId: 'createUser',
        summary: 'Create a new user.',
        requestBody: new OA\RequestBody(
            description: 'User data',
            content: new OA\JsonContent(
                required: [
                    'name', 'email', 'password',
                ],
                properties: [
                    new OA\Property(
                        property: 'name',
                        type: 'string',
                        example: 'Jon',

                    ),
                    new OA\Property(
                        property: 'email',
                        type: 'string',
                        example: 'test@gmail.com'
                    ),
                    new OA\Property(
                        property: 'password',
                        type: 'string',
                        example: '********'
                    ),
                ]
            )
        ),
        tags: ['Auth'],
        responses: [
            new OA\Response(
                ref: '#/components/responses/SuccessResponse',
                response: 200
            ),
            new OA\Response(
                ref: '#/components/responses/ServerErrorResource',
                response: 500
            ),
        ]
    )]
    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->authService->register($request);
    }

    #[OA\Post(
        path: '/api/login',
        operationId: 'loginUser',
        summary: 'login user',
        requestBody: new OA\RequestBody(
            description: 'User data',
            content: new OA\JsonContent(
                required: [
                    'email', 'password',
                ],
                properties: [
                    new OA\Property(
                        property: 'email',
                        type: 'string',
                        example: 'test@gmail.com'
                    ),
                    new OA\Property(
                        property: 'password',
                        type: 'string',
                        example: '********'
                    ),
                ]
            )
        ),
        tags: ['Auth'],
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
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->authService->login($request);
    }
}
