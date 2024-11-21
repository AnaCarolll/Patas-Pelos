<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Pet;

class PetService
{
    public function createPet(array $data):Pet{
        return $pet = Pet::create($data);
    }
    public function deletePet(int $id):void
    {
        $pet = Pet::find($id);
        $pet->delete();
    }
}
