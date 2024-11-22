<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Pet;

class PetService
{
    public function createPet(array $data):Pet{
        return $pet = Pet::create($data);
    }
    public function deletePet(int $id)
    {
        $pet = Pet::find($id);
        $pet->delete();
    }
    public function updatePet(int $id, array $data):Pet
    {
        $pet = Pet::find($id);
        $pet->update($data);
        return $pet;
    }
    public function listPets(int $perPage = 10)
    {
        return Pet::paginate($perPage);
    }
}
