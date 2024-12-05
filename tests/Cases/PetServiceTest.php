<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Service\PetService;
use App\Model\Pet;
use Mockery;
use

class PetServiceTest extends TestCase
{
    use RefreshDatabase;
    public function testCreatePet()
    {
        $petService = new PetService();
        $result = $petService->createPet(['nome' => 'Rex', 'data_nascimento' => '2020-01-01','especie_id' =>'1']);
        $this->assertInstanceOf(Pet::class, $result);
    }
}
