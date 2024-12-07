<?php

namespace App\Services;

use App\Repositories\LivroRepository;
use Illuminate\Support\Collection;
use App\Models\Livro;

class LivroService
{
    protected $livroRepository;

    public function __construct(LivroRepository $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    public function getAll(): Collection
    {
        return $this->livroRepository->all();
    }

    public function getById(int $id): ?Livro
    {
        return $this->livroRepository->find($id);
    }

    public function create(array $data): Livro
    {
        return $this->livroRepository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->livroRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->livroRepository->delete($id);
    }
}