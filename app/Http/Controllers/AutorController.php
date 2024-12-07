<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Http\Resources\AutorResource;
use App\Services\AutorService;
use Illuminate\Http\JsonResponse;

class AutorController extends Controller
{
    protected $autorService;

    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function index(): JsonResponse
    {
        $autores = $this->autorService->getAll();
        return response()->json(AutorResource::collection($autores));
    }

    public function store(StoreAutorRequest $request): JsonResponse
    {
        $autor = $this->autorService->create($request->validated());
        return response()->json(new AutorResource($autor), 201);
    }

    public function show(int $id): JsonResponse
    {
        $autor = $this->autorService->getById($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return response()->json(new AutorResource($autor));
    }

    public function update(UpdateAutorRequest $request, int $id): JsonResponse
    {
        if ($this->autorService->update($id, $request->validated())) {
            return response()->json(['message' => 'Autor atualizado com sucesso']);
        }
        return response()->json(['message' => 'Autor não encontrado'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        if ($this->autorService->delete($id)) {
            return response()->json(['message' => 'Autor excluído com sucesso']);
        }
        return response()->json(['message' => 'Autor não encontrado'], 404);
    }
}