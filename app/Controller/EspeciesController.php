<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Especie;
use App\Request\FooRequest;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class EspeciesController extends AbstractController
{
    public function store(FooRequest $request)
    {
        $data = $this->response->json();
        $especie = Especie::create([

        ]);

    }
}
