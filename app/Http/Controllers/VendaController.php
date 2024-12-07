<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendaRequest;
use App\Http\Requests\UpdateVendaRequest;
use App\Http\Resources\VendaResource;
use App\Services\VendaService;
use Illuminate\Http\JsonResponse;

class VendaController extends Controller
{
    protected $vendaService;

    public function __construct(VendaService $vendaService)
    {
        $this->vendaService = $vendaService;
    }

    public function index(): JsonResponse
    {
        $vendas = $this->vendaService->getAll();
        return response()->json(VendaResource::collection($vendas));
    }

    public function store(StoreVendaRequest $request): JsonResponse
    {
        $venda = $this->vendaService->create($request->validated());
        return response()->json(new VendaResource($venda), 201);
    }

    public function show(int $id): JsonResponse
    {
        $venda = $this->vendaService->getById($id);
        if (!$venda) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }
        return response()->json(new VendaResource($venda));
    }

    public function update(UpdateVendaRequest $request, int $id): JsonResponse
    {
        if ($this->vendaService->update($id, $request->validated())) {
            return response()->json(['message' => 'Venda atualizada com sucesso']);
        }
        return response()->json(['message' => 'Venda não encontrada'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        if ($this->vendaService->delete($id)) {
            return response()->json(['message' => 'Venda excluída com sucesso']);
        }
        return response()->json(['message' => 'Venda não encontrada'], 404);
    }
}