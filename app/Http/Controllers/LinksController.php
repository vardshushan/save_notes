<?php

namespace App\Http\Controllers;

use App\Http\Requests\Links\CreateLinkRequest;
use App\Services\Links\LinksService;
use Illuminate\Http\JsonResponse;

class LinksController extends Controller
{
    public function __construct( private readonly LinksService $linksService)
    {}
    /**
     * Display a listing of the resource.
     */
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
