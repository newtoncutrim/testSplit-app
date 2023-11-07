<?php

namespace App\Services;

use App\Repository\ProductRepository;
use Carbon\Carbon;



class ProductService {
    public function __construct(protected ProductRepository $repository)
    {}

    public function findAll(){
        return $this->repository->findAll();
    }

    public function findOne($id){
        return  $this->repository->findOne($id);
    }

    public function new($data){
        if($data){
        return $this->repository->new($data);
        }
    }

    public function edit() {

    }

    public function updateTask($request, string $id){
        $product = $this->findOne($id);
        if (!$product) {
            throw new \Exception('Registro não encontrado');
        }
        return $this->repository->update($id, $request);
    }

    public function destroy($id){
        if($id){
            return $this->repository->delete($id);
        }

        return redirect()->back();
    }

    public function dataFormat($data){

        return Carbon::parse($data)->format('d/m/Y');
    }
}
