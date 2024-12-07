<?php

namespace App\Services;

use App\Repositories\VendaRepository;
use Illuminate\Support\Collection;
use App\Models\Venda;

class VendaService
{
    protected $vendaRepository;

    public function __construct(VendaRepository $vendaRepository)
    {
        $this->vendaRepository = $vendaRepository;
    }

    public function getAll(): Collection
    {
        return $this->vendaRepository->all();
    }

    public function getById(int $id): ?Venda
    {
        return $this->vendaRepository->find($id);
    }

    public function create(array $data): Venda
    {
        return $this->vendaRepository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->vendaRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->vendaRepository->delete($id);
    }
}