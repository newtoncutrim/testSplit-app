<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public function __construct(protected ProductService $service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = $this->service->findAll();
        return response()->json(["data" => $products], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request): JsonResponse
    {
        $task = $this->service->new($request->all());

        if (!$task) {
            return response()->json(["error" => "Failed to create the task"], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(["message" => "Task created successfully", "data" => $task], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $task = $this->service->findOne($id);

        if (!$task) {
            return response()->json(["error" => "Task not found"], Response::HTTP_NOT_FOUND);
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
        return response()->json(["message" => "Task updated successfully", "data" => $task], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $task = $this->service->findOne($id);

        if (!$task) {
            return response()->json(["error" => "Task not found"], Response::HTTP_NOT_FOUND);
        }

        $this->service->destroy($id);

        return response()->json(["message" => "Task deleted successfully"], Response::HTTP_OK);
    }
}
