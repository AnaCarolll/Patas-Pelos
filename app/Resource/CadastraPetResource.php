<?php

namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;

class CadastraPetResource extends JsonResource
{
    public function toArray(): array
    {
        return[
            'nome'=>$this->nome,
            'data_nascimento'=>$this->data_nascimento
        ];
    }
}
