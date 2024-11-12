<?php

namespace App\Controller;

use App\Model\Pet;
use App\Request\DeletePetRequest;
use App\Request\ListaPetRequest;
use App\Request\ListaPetsRequest;
use App\Resource\PetsResource;
use App\Resource\ShowResource;
use App\Resource\UpdateResource;
use App\Resource\PetListagemResource;
use App\Request\CreatePetRequest;
use App\Request\UpdatePetRequest;
class PetsController extends AbstractController
{
    public function store(CreatePetRequest $request)
    {
        $data = $request->validated();
        $pet = Pet::create($data);
        return new PetsResource($pet);
    }
    public function index()
    {
        $pets = Pet::paginate(10);
        return PetsResource::collection($pets->items());
    }
    public function show(ListaPetRequest $request, int $id)
    {
        $data = $request->validated();
        $pet = Pet::find($id);
        return new PetsResource($pet);
    }
    public function destroy(DeletePetRequest $request )
    {
        $data = $request->validated();
        $pet = Pet::find($data['id']);
        $pet->delete();
        return response()->json([],200);
    }
    public function update(UpdatePetRequest $request, int $id)
    {
        $data = $request->validated();
        $pet = Pet::find($id);
        $pet->update($data);
        return response()->json([],200);
    }

}