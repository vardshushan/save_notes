<?php

namespace App\Http\Controllers;

use OpenApi\Attributes\Info;
use OpenApi\Attributes\SecurityScheme;
use OpenApi\Attributes\Server;

#[Info(version: '1.0.0', title: 'Notes API')]
#[Server(url: 'http://0.0.0.0:8000', description: 'For local development')]
#[Server(url: 'http://172.105.84.107:9552', description: 'Base server for development')]
#[SecurityScheme(securityScheme: 'bearerAuth', type: 'http', description: '', name: 'Authorization', in: 'header', bearerFormat: '', scheme: 'Bearer')]
class OpenAPI
{

}
