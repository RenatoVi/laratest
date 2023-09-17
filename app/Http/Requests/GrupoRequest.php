<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255|min:3',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do grupo é obrigatório',
            'nome.string' => 'O nome do grupo deve ser uma string',
            'nome.max' => 'O nome do grupo deve ter no máximo 255 caracteres',
            'nome.min' => 'O nome do grupo deve ter no mínimo 3 caracteres',
        ];
    }
}
