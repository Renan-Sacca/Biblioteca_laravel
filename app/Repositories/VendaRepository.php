<?php

namespace App\Repositories;

use App\Models\Livro;
use App\Models\Venda;
use Illuminate\Support\Collection;

class VendaRepository
{
    public function all(): Collection
    {
        return Venda::with('cliente', 'livro')->get();
    }

    public function find(int $id): ?Venda
    {
        return Venda::with('cliente', 'livro')->find($id);
    }

    public function create(array $data): Venda
    {
        $livro = Livro::find($data['livro_id']);
        $data['valor_total'] = $livro->preco * $data['quantidade'];
        return Venda::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $venda = $this->find($id);
        if (!$venda) {
            return false;
        }

        if (isset($data['livro_id']) || isset($data['quantidade'])) {
            $livro = Livro::find($data['livro_id'] ?? $venda->livro_id);
            $quantidade = $data['quantidade'] ?? $venda->quantidade;
            $data['valor_total'] = $livro->preco * $quantidade;
        }

        return $venda->update($data);
    }

    public function delete(int $id): bool
    {
        $venda = $this->find($id);
        if (!$venda) {
            return false;
        }
        return $venda->delete();
    }
}