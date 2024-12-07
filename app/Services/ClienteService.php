<?php

namespace App\Services;

use App\Repositories\ClienteRepository;
use Illuminate\Support\Collection;
use App\Models\Cliente;

class ClienteService
{
    protected $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function getAll(): Collection
    {
        return $this->clienteRepository->all();
    }

    public function getById(int $id): ?Cliente
    {
        return $this->clienteRepository->find($id);
    }

    public function create(array $data): Cliente
    {
        return $this->clienteRepository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->clienteRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->clienteRepository->delete($id);
    }
}