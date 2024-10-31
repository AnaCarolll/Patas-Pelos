<?php

namespace App\Controller;

use App\Model\Pet;
use App\Request\DeletPetRequest;
use App\Request\ListaEspecificoRequest;
use App\Resource\ShowResource;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Paginator\Paginator;
use App\Resource\PetResource;
use phpseclib3\Math\PrimeField\Integer;
use App\Request\CreatePetRequest;
use App\Request\UpdatePetRequest;
class PetsController extends AbstractController
{
    public function store(CreatePetRequest $request)
    {
        $data = $request->validated();
        $pet = Pet::create($data);
    }
    public function index()
    {
        $pets = Pet::paginate(10);
        if ($pets->isEmpty()) {
            return $this->response->json([
                'data' => [],
            ]);
        }
        return PetResource::collection($pets);

    }
    public function show(ListaEspecificoRequest $request)
    {
        $data = $request->validated();
        $pet = Pet::find($data['id']);
        return new ShowResource($pet);
    }
    public function destroy(DeletPetRequest $request )
    {
        $data = $request->validated();
        $pet = Pet::find($data['id']);
        $pet->delete();
    }
    public function update(UpdatePetRequest $request, int $id)
    {
        $data = $request->validated();
        $pet = Pet::find($id);
        if (!$pet) {
            return $this->response->json([
                'menssage' => 'O pet não foi encontrado!',
            ]);
        }
        if (isset($data['data_nascimento'])) {
            $dataNascimento = \DateTime::createFromFormat('d/m/Y', $data['data_nascimento']);
        }
        if($dataNascimento !== false){
            $data['data_nascimento'] = $dataNascimento->format('Y-m-d');
        }
        $pet->update($data);
    }
}