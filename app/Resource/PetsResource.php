<?php

namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;

class PetsResource extends JsonResource
{

    public ?string $wrap = null; //não quero que jogue dentro de uma data
    public function toArray(): array
    {
        return[
            'id'=>$this->id,
            'nome'=>$this->nome,
            'data_nascimento'=>$this->data_nascimento,
//            'especies'=>$this->especie->nome
        ];
    }
}
