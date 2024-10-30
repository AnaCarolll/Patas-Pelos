<?php

namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;
use Illuminate\Http\Request;
class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray():array
    {
        return [
            'nome'=> $this->nome,
            'data_nascimento'=>$this->data_nascimento,

            ];
    }
}
