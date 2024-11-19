<?php

declare(strict_types=1);

namespace App\Request;

use Hyperf\Validation\Request\FormRequest;
use Psr\Container\ContainerInterface;
class CreatePetRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'especie_id' => 'required|integer|exists:especies,id',
        ];
    }
    public function messages(): array
    {
        return [
           'nome.required' => 'não pode ser vazio vei 🤨'
        ];
    }
}
