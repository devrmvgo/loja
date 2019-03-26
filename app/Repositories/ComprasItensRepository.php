<?php

namespace App\Repositories;

use App\Models\CompraItem;

class ComprasItensRepository
{
    public function __construct(CompraItem $model)
    {
        $this->model = $model;
    }

    public function createByCompraId($compraId, $data){
        $model = new $this->model;
        $model->fill($data);
        $model->compra_id = $compraId;
        $model->save();
        
        return $model;
    }

    public function listByCompraId($compraId){
        $model = $this->model->select('*')
        ->where('compra_id', $compraId)
        ->get();

        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }

        return $model;
    }

}