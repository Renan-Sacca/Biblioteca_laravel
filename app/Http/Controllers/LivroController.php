<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Http\Resources\LivroResource;
use App\Services\LivroService;
use Illuminate\Http\JsonResponse;

class LivroController extends Controller
{
    protected $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function index(): JsonResponse
    {
        $livros = $this->livroService->getAll();
        return response()->json(LivroResource::collection($livros));
    }

    public function store(StoreLivroRequest $request): JsonResponse
    {
        $livro = $this->livroService->create($request->validated());
        return response()->json(new LivroResource($livro), 201);
    }

    public function show(int $id): JsonResponse
    {
        $livro = $this->livroService->getById($id);
        if (!$livro) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }
        return response()->json(new LivroResource($livro));
    }

    public function update(UpdateLivroRequest $request, int $id): JsonResponse
    {
        if ($this->livroService->update($id, $request->validated())) {
            return response()->json(['message' => 'Livro atualizado com sucesso']);
        }
        return response()->json(['message' => 'Livro não encontrado'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        if ($this->livroService->delete($id)) {
            return response()->json(['message' => 'Livro excluído com sucesso']);
        }
        return response()->json(['message' => 'Livro não encontrado'], 404);
    }
}