<?php

declare(strict_types=1);

namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class CreatePetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'nome'=>'required|string|max:255|min:3',
            'data_nascimento'=>'required|date_format:Y-m-d|before_or_equal:today',
            'especie_id' => 'nullable|integer',

        ];
    }
    public function messages(): array
    {
        return [
            'nome.required'=>'o campo nome é obrigatorio',
            'nome.string' => 'O campo nome deve ser uma string.',
            'data_nascimento'=>'o campo data de data nascimento é obrigatorio',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
        ];
    }
}
