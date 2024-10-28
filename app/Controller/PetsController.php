<?php

namespace App\Controller;

use App\Model\Pet;
use App\Request\FooRequest;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Paginator\Paginator;
use Carbon\carbon;
class PetsController extends AbstractController
{
    public function store(FooRequest $request)
    {
        $data = $this->request->all();
        //valida os dados

        $data = $request->validate();
        return $this->response()->json(['message'=>'Data is valid']);
        //insere dados no banco

        $pet = Pet::create([
            'nome'=>$data['nome'],
            'data_nascimento' => $data['data_nascimento'],
        ]);

        //retorna a resposta com sucesso

        return $this->response->json([
            'message'=>'pets cadastrado com sucesso!',
            'pet'=>$pet
        ]);
    }

    public function index()
    {
        $pets = Pet::paginate(10);

        if ($pets->isEmpty()){
            return $this->response->json([
                'message'=>'pets não encontrado',
                'data'=>[],
            ]);
        }

        return $this->response->json([
            'message'=>'pet listado com sucesso!',
            'data'=>$pets,
        ]);
    }

    public function show($id){

        $pet = Pet::find($id);

        if($pet){

            return $this->response->json([
                'message'=>'pet encontrado com sucesso!',
                'data'=>$pet
            ], 200);
        } else{
            return $this->response->json([
                'status' => 'error',
                'message' =>'Pet not found!'
            ],404);
        }
    }

    public function destroy($id)
    {

        $data = $this->request->all();

        $pet = Pet::find($id);

        if($pet){
          Pet::destroy($id);

            return $this->response->json([
                'message'=>'Pet removido com sucesso!'
            ]);
        }
            return $this->response->json([
                'message'=>'Pet não encontrado!'
            ]);
    }

    public function update($id)
    {
        $data = $this->request->all();
        $pet = Pet::find($id);

        if(!$pet){
            return $this->response->json([
                'menssage'=>'O pet não foi encontrado!',
            ]);
        }
//        $pet->nome = $data['nome']?? $pet -> nome;

        if(isset($data['data_nascimento'])){
            $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $data['data_nascimento'])->format('Y-m-d');
        }
        $pet ->update($data);
    }
}