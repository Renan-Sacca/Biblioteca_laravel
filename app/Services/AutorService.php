<?php

namespace App\Services;

use App\Repositories\AutorRepository;
use Illuminate\Support\Collection;
use App\Models\Autor;

class AutorService
{
    protected $autorRepository;

    public function __construct(AutorRepository $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function getAll(): Collection
    {
        return $this->autorRepository->all();
    }

    public function getById(int $id): ?Autor
    {
        return $this->autorRepository->find($id);
    }

    public function create(array $data): Autor
    {
        return $this->autorRepository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->autorRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->autorRepository->delete($id);
    }
}