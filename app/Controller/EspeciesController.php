<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Especie;
use App\Request\CreateEspecieRequest;
use App\Request\DeleteEspecieRequest;
use App\Request\ListaEspecieRequest;
use App\Request\UpdateEspecieRequest;
use App\Resource\especiesResource;

class EspeciesController extends AbstractController
{
    public function store(CreateEspecieRequest $request)
    {
        $data = $request->validated();
        $especie = Especie::create($data);
        return new EspeciesResource($especie);
    }
    public function destroy(DeleteEspecieRequest $request)
    {
        $data = $request->validated();
        $especie = Especie::find($data['id']);
        $especie->delete();
    }
    public function show (ListaEspecieRequest $request, int $id)
    {
        $data = $request->validated();
        $especie = Especie::find($id);
        return new EspeciesResource($especie);
    }
    public function index(){
        $especies = Especie::paginate(10);
        return EspeciesResource::collection($especies->items());
    }
    public function update(UpdateEspecieRequest $request, int $id)
    {
        $data = $request->validated();
        $especie = Especie::find($id);
        $especie->update($data);
        return new EspeciesResource($especie);
    }
}
