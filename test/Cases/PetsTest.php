<?php

namespace Tests\Cases;

use App\Model\Pet;
use Co\Client;
use Tests\Factories\PetFactory;
use PHPUnit\Framework\TestCase;

class PetsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = $this->createClient();
    }
  public function testDeleteExistinPet():void
  {
      $petData = [
          'nome' => 'Boby',
          'data_nascimento' => '2000-01-01',
          'especie' => 1,
      ];
      $pet = $this->createPetInDatabase($petData);
      $response = $this->client->delete('/pet', [
          'id' => $pet->id,
      ]);
      $this->assertEquals(200, $response->getStatusCode());
      $responseBody = json_decode($response->getBody()->getContents().true);
      $this->asertSame('Pet deletado!',$responseBody['message']);
      $this->assertNull($this->findPetDatabase($pet->id));

  }
    private function createPetInDatabase(array $petData)
    {
        return \Hyperf\DbConnection\Db::table('pets')->where('id', $id)->first();
    }
}
