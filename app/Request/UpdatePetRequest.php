<?php

declare(strict_types=1);

namespace App\Request;

use Hyperf\Validation\Contract\ValidatesWhenResolved;
use Hyperf\Validation\Request\FormRequest;

class UpdatePetRequest extends FormRequest implements ValidatesWhenResolved
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'id'=>'exists:pets,id',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date_format:d/m/Y',
        ];
    }
    public function messages(): array
    {
        return [
            'id.exists' => 'id não encontrado'
        ];
    }
}
