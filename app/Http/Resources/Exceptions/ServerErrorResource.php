<?php

namespace App\Http\Resources\Exceptions;
use OpenApi\Attributes as OA;

#[OA\Response(
    response: 'ServerErrorResource',
    description: 'Invalid data',
    content: new OA\JsonContent(
        ref: '#/components/schemas/ServerErrorResource'
    )
)]
#[OA\Schema(
    required: ['errors', 'message'],
    properties: [
        new OA\Property(
            property: 'message',
            type: 'string',
            example: 'Internal Server Error'
        ),
    ],
)]
class ServerErrorResource
{
}
