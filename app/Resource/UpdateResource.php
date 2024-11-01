<?php

namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;

class UpdateResource extends JsonResource
{
    public function toArray(): array
    {
        return [
            'nome'=>$this->nome,
            'data_nascimento'=>$this->data_nascimento
        ];
    }
}
