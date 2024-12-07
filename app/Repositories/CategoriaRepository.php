<?php

namespace App\Repositories;

use App\Models\Categoria;
use Illuminate\Support\Collection;

class CategoriaRepository
{
    public function all(): Collection
    {
        return Categoria::all();
    }

    public function find(int $id): ?Categoria
    {
        return Categoria::find($id);
    }

    public function create(array $data): Categoria
    {
        return Categoria::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $categoria = $this->find($id);
        if (!$categoria) {
            return false;
        }
        return $categoria->update($data);
    }

    public function delete(int $id): bool
    {
        $categoria = $this->find($id);
        if (!$categoria) {
            return false;
        }
        return $categoria->delete();
    }
}