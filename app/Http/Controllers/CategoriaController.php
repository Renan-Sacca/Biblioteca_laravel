<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Services\CategoriaService;
use Illuminate\Http\JsonResponse;

class CategoriaController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index(): JsonResponse
    {
        $categorias = $this->categoriaService->getAll();
        return response()->json(CategoriaResource::collection($categorias));
    }

    public function store(StoreCategoriaRequest $request): JsonResponse
    {
        $categoria = $this->categoriaService->create($request->validated());
        return response()->json(new CategoriaResource($categoria), 201);
    }

    public function show(int $id): JsonResponse
    {
        $categoria = $this->categoriaService->getById($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }
        return response()->json(new CategoriaResource($categoria));
    }

    public function update(UpdateCategoriaRequest $request, int $id): JsonResponse
    {
        if ($this->categoriaService->update($id, $request->validated())) {
            return response()->json(['message' => 'Categoria atualizada com sucesso']);
        }
        return response()->json(['message' => 'Categoria não encontrada'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        if ($this->categoriaService->delete($id)) {
            return response()->json(['message' => 'Categoria excluída com sucesso']);
        }
        return response()->json(['message' => 'Categoria não encontrada'], 404);
    }
}