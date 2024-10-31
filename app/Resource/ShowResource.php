<?php

declare(strict_types=1);
namespace App\Resource;

use http\Env\Request;
use Hyperf\Resource\Json\JsonResource;

class ShowResource extends JsonResource
{
    public function toArray(): array
    {
        return [
            'nome'=>$this->nome,
            'data_nascimento'=>$this->data_nascimento,
        ];
    }
}
