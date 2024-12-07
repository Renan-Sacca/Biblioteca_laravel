<?php

namespace App\Repositories;

use App\Models\Livro;
use Illuminate\Support\Collection;

class LivroRepository
{
    public function all(): Collection
    {
        return Livro::with('autor', 'categoria')->get();
    }

    public function find(int $id): ?Livro
    {
        return Livro::with('autor', 'categoria')->find($id);
    }

    public function create(array $data): Livro
    {
        return Livro::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $livro = $this->find($id);
        if (!$livro) {
            return false;
        }
        return $livro->update($data);
    }

    public function delete(int $id): bool
    {
        $livro = $this->find($id);
        if (!$livro) {
            return false;
        }
        return $livro->delete();
    }
}