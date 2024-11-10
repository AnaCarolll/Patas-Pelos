<?php

declare(strict_types=1);

namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class UpdateEspecieRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'=>'exists:especies,id',
            'nome' => 'required|string|max:50',
            'descricao' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'id.exists' => 'id não encontrado'
        ];
    }
}
