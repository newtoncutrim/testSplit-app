<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\ProductCreateRequest;

class ProductApiController extends Controller
{
    public function __construct(protected ProductService $service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 5);
        $page = $request->query('page', 1);

        $products = $this->service->findAll();

        $totalItems = $products->count();
        $currentPage = $page;
        $itemsPerPage = $perPage;
        $lastPage = ceil($totalItems / $itemsPerPage);

        // Paginação manual
        $products = $products->forPage($currentPage, $itemsPerPage);

        $response = [
            "pagina_atual" => $currentPage,
            "total_paginas" => $lastPage,
            "total_registros" => $totalItems,
            "registros_por_pagina" => $itemsPerPage,
            "registros" => $products->values()->all(),
        ];

        return response()->json($response, Response::HTTP_OK);
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        /* dd($request->all()); */
        $task = $this->service->new($request->all());

        if (!$task) {
            return response()->json(["error" => "Failed to create the Product"], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(["message" => "Product created successfully", "data" => $task], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $task = $this->service->findOne($id);

        if (!$task) {
            return response()->json(["error" => "Product not found"], Response::HTTP_NOT_FOUND);
        }

        return response()->json(["data" => $task], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCreateRequest $request, string $id): JsonResponse
    {

        $this->service->updateTask($request->all(), $id);
        $task = $this->service->findOne($id);
        return response()->json(["message" => "Product updated successfully", "data" => $task], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $task = $this->service->findOne($id);

        if (!$task) {
            return response()->json(["error" => "Product not found"], Response::HTTP_NOT_FOUND);
        }

        $this->service->destroy($id);

        return response()->json(["message" => "Product deleted successfully"], Response::HTTP_OK);
    }
}
