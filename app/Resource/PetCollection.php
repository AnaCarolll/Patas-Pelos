<?php

namespace App\Resource;

use Hyperf\Resource\Json\ResourceCollection;

class PetCollection extends ResourceCollection
{
    public function toArray(): array
    {
        return parent::toArray();
    }
}
