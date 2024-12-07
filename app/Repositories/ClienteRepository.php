<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Support\Collection;

class ClienteRepository
{
    public function all(): Collection
    {
        return Cliente::all();
    }

    public function find(int $id): ?Cliente
    {
        return Cliente::find($id);
    }

    public function create(array $data): Cliente
    {
        return Cliente::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $cliente = $this->find($id);
        if (!$cliente) {
            return false;
        }
        return $cliente->update($data);
    }

    public function delete(int $id): bool
    {
        $cliente = $this->find($id);
        if (!$cliente) {
            return false;
        }
        return $cliente->delete();
    }
}