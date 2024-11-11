<?php

namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;

class saidasDeDadosPets extends JsonResource
{
    public function toArray(): array
    {
        return[
            'id'=>$this->id,
            'nome'=>$this->nome,
            'data_nascimento'=>$this->data_nascimento,
            'especie_id'=>$this->especie_id
        ];
    }
}
