<?php

namespace App\Repositories;

use App\Models\Compra;
use App\Repositories\AbstractRepository;

class ComprasRepository extends AbstractRepository
{
    public function __construct(Compra $model)
    {
        $this->model = $model;
    }

    public function createByClienteId($clienteId, $data){
        $model = new $this->model;
        $model->fill($data);
        $model->cliente_id = $clienteId;
        $model->save();
        
        return $model;
    }

    public function listByClienteId($clienteId){
        $model = $this->model->select('*')
        ->where('cliente_id', $clienteId)
        ->get();

        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }

        return $model;
    }

}