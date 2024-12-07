<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Http\Resources\ClienteResource;
use App\Services\ClienteService;
use Illuminate\Http\JsonResponse;

class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function index(): JsonResponse
    {
        $clientes = $this->clienteService->getAll();
        return response()->json(ClienteResource::collection($clientes));
    }

    public function store(StoreClienteRequest $request): JsonResponse
    {
        $cliente = $this->clienteService->create($request->validated());
        return response()->json(new ClienteResource($cliente), 201);
    }

    public function show(int $id): JsonResponse
    {
        $cliente = $this->clienteService->getById($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        return response()->json(new ClienteResource($cliente));
    }

    public function update(UpdateClienteRequest $request, int $id): JsonResponse
    {
        if ($this->clienteService->update($id, $request->validated())) {
            return response()->json(['message' => 'Cliente atualizado com sucesso']);
        }
        return response()->json(['message' => 'Cliente não encontrado'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        if ($this->clienteService->delete($id)) {
            return response()->json(['message' => 'Cliente excluído com sucesso']);
        }
        return response()->json(['message' => 'Cliente não encontrado'], 404);
    }
}