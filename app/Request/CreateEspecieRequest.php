<?php

declare(strict_types=1);

namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class CreateEspecieRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:50|min:5',
            'descrição' => 'required|string|max:50|min:5',
        ];
    }

    public function messagens(): array
    {
        return [
            'nome.required' => 'o campo nome é obrigatório',
            'nome.string' => 'o campo nome deve ser texto',
            'descrição.required' => 'o campo descrição é obrigatório',
            'descrição.string' => 'o campo descrição precisa ser uma string',
        ];
    }
}

