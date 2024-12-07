<?php

namespace App\Repositories;

use App\Models\Autor;
use Illuminate\Support\Collection;

class AutorRepository
{
    public function all(): Collection
    {
        return Autor::all();
    }

    public function find(int $id): ?Autor
    {
        return Autor::find($id);
    }

    public function create(array $data): Autor
    {
        return Autor::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $autor = $this->find($id);
        if (!$autor) {
            return false;
        }
        return $autor->update($data);
    }

    public function delete(int $id): bool
    {
        $autor = $this->find($id);
        if (!$autor) {
            return false;
        }
        return $autor->delete();
    }
}