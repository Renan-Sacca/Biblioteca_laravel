<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'isbn' => 'nullable|string|max:20',
            'preco' => 'sometimes|numeric|min:0',
            'autor_id' => 'sometimes|exists:autores,id',
            'categoria_id' => 'sometimes|exists:categorias,id',
        ];
    }
}