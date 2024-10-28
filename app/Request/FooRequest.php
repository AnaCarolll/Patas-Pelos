<?php

declare(strict_types=1);

namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class FooRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nome'=>'requiried|string',
            'data_nascimento'=>'requiried|date',
        ];
    }
    public function messages(): array
    {
        return [
            'nome.required'=>'o campo nome é obrigatorio',
            'data_nascimento'=>'o campo data de data nascimento é obrigatorio'
        ];
    }
}
