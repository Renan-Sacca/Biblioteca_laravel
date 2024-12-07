<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:clientes,email,' . $this->cliente,
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
        ];
    }
}