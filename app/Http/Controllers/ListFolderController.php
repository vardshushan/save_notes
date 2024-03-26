<?php

namespace App\Http\Controllers;

use App\Http\Requests\Links\CreateLinkRequest;
use App\Services\Links\LinksService;
use App\Services\ListFolders\ListFoldersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ListFolderController extends Controller
{

    public function __construct( private readonly ListFoldersService $listFoldersService)
    {}

    public function store(Request $request): JsonResponse|string
    {
        return $this->listFoldersService->createFolder($request);
    }

}
