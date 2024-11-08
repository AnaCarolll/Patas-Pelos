<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use App\Controller\PetsController;
use App\Controller\EspeciesController;
use Hyperf\HttpServer\Router\Router;

Router::addGroup('/pet', function (){
    Router::get('',[PetsController::class, 'index']);  //lista todos
    Router::get('/especifico',[PetsController::class, 'show']);  //lista um em especifico
    Router::post('',[PetsController::class, 'store']); //cadastro de pets
    Router::put('/{id}',[PetsController::class, 'update']);
    Router::delete('',[PetsController::class, 'destroy']);

});
//rotas de especiesclear


Router::addGroup('/especies', function (){
    Router::post('',[EspeciesController::class,'store']);
    Router::delete('',[EspeciesController::class,'destroy']);
});