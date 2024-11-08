<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Especie;
use App\Request\CreateEspecieRequest;
use App\Request\DeleteEspecieRequest;
use App\Request\FooRequest;
use App\Request\ListaEspecieEspecificaRequest;
use App\Resource\saidasDeDadosEspecies;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class EspeciesController extends AbstractController
{
    public function store(CreateEspecieRequest $request)
    {
        $data = $request->validated();
        $especie = Especie::create($data);
        return new saidasDeDadosEspecies($especie);

    }

    public function destroy(DeleteEspecieRequest $request)
    {
        $data = $request->validated();
        $especie = Especie::find($data['id']);
        $especie->delete();
    }

    public function show (ListaEspecieEspecificaRequest $request){
        $data = $request->validated();
        $especie = Especie::find($data['id']);
        return new saidasDeDadosEspecies($especie);
    }

}
