<?php

declare(strict_types=1);

namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class UpdatePetRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'id'=>'exists:pets,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'id não encontrado'
        ];
    }
}
