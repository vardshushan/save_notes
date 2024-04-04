<?php

namespace App\Http\Resources\Auth;

use OpenApi\Attributes as OA;

#[OA\Response(
    response: 'SuccessResponse',
    description: 'Successful',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'OK!'),
        ]
    )
)]
class SuccessResponse
{

}
