<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Autorização (ajuste conforme necessário)
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
            'nacionalidade' => 'nullable|string|max:255',
        ];
    }
}