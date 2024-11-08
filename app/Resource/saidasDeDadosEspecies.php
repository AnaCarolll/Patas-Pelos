<?php

namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;

class saidasDeDadosEspecies extends JsonResource
{

    public function toArray(): array
    {
        return [
            'id'=>$this->id,
            'nome' =>$this->nome,
            'descricao'=>$this->descricao,
        ];
    }
}
