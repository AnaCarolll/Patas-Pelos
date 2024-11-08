<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Especie;
use App\Request\CreateEspecieRequest;
use App\Request\FooRequest;
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
}
