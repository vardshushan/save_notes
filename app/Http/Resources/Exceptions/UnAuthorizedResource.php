<?php

namespace App\Http\Resources\Exceptions;
use OpenApi\Attributes as OA;


#[OA\Response(
    response: 'UnAuthorizedResource',
    description: 'No authorized',
    content: new OA\JsonContent(
        ref: '#/components/schemas/UnAuthorizedResource'
    )
)]
#[OA\Schema(
    required: ['message'],
    properties: [
        new OA\Property(
            property: 'message',
            type: 'string',
            example: 'UnAuthorized!'
        ),
    ],
)]
class UnAuthorizedResource
{

}
