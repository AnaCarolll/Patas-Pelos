<?php

namespace App\Controller;

use App\Model\Pet;
use App\Request\DeletePetRequest;
use App\Request\ListaEspecificoRequest;
use App\Request\ListaPetsRequest;
use App\Resource\saidasDeDadosPets;
use App\Resource\ShowResource;
use App\Resource\UpdateResource;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Paginator\Paginator;
use App\Resource\PetListagemResource;
use phpseclib3\Math\PrimeField\Integer;
use App\Request\CreatePetRequest;
use App\Request\UpdatePetRequest;
class PetsController extends AbstractController
{
    public function store(CreatePetRequest $request)
    {
        $data = $request->validated();
        $pet = Pet::create($data);
        return new saidasDeDadosPets($pet);
    }
    public function index()
    {
        $pets = Pet::paginate(10);
        return saidasDeDadosPets::collection($pets->items());

    }
    public function show(ListaEspecificoRequest $request)
    {
        $data = $request->validated();
        $pet = Pet::find($data['id']);
        return new saidasDeDadosPets($pet);
    }
    public function destroy(DeletePetRequest $request )
    {
        $data = $request->validated();
        $pet = Pet::find($data['id']);
        $pet->delete();
    }
    public function update(UpdatePetRequest $request, int $id)
    {
        $data = $request->validated();
        $pet = Pet::find($id);
        $pet->update($data);
        return new saidasDeDadosPets($pet);
    }

}