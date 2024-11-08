<?php

namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;

class saidasDeDadosEspecies extends JsonResource
{

    public function toArray(): array
    {
        return [
            'nome' =>$this->nome,
            'descricao'=>$this->descricao,
        ];
    }
}
