<?php

namespace App\Repository\Contract;


use Illuminate\Database\Eloquent\Model;
use App\Repository\Contract\InterfaceRepository;


abstract class AbstractRepository implements InterfaceRepository {

    protected Model $model;

    public function findAll(){
        return $this->model->all();
    }

    public function findOne($id){
        return $this->model->find($id);
    }
    public function new($data){

        return $this->model->create($data);

    }

    public function edit() {

    }

    public function update($id, $request) {
        $data = $this->model->find($id);

        if (!$data) {
            throw new \Exception("Registro não encontrado");
        }
        $data->update($request);

        return $data->save();
    }


        /* DB::transaction(); */

    public function delete($id){
        $data = $this->model->find($id);

        if (!$data) {
            throw new \Exception("Registro não encontrado");
        }

        $data->delete();

        $records = $this->model->get();

        // Reordena os IDs

        return $records;
    }
}

/* @php artisan vendor:publish --tag=laravel-assets --ansi --force */
