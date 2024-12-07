<?php

namespace App\Services;

use App\Repositories\CategoriaRepository;
use Illuminate\Support\Collection;
use App\Models\Categoria;

class CategoriaService
{
    protected $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function getAll(): Collection
    {
        return $this->categoriaRepository->all();
    }

    public function getById(int $id): ?Categoria
    {
        return $this->categoriaRepository->find($id);
    }

    public function create(array $data): Categoria
    {
        return $this->categoriaRepository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->categoriaRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->categoriaRepository->delete($id);
    }
}