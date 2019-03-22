<?php

namespace App\Repositories;

use App\Models\Produto;
use App\Repositories\AbstractRepository;

class ProdutosRepository extends AbstractRepository
{
    public function __construct(Produto $model)
    {
        $this->model = $model;
    }

    public function createByEmpresaId($empresaId, $data)
    {
        $model = new $this->model;
        $model->fill($data);
        $model->empresa_id = $empresaId;
        $model->save();
        return $model;
    }

    public function listByEmpresaId($empresaId)
    {
        $model = $this->model->select('*')
        ->where('empresa_id', $empresaId)
        ->get();

        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }
        
        return $model;
    }

    public function updateAtivo($id, $data)
    {
        $model = $this->model->findOrFail($id);
        $model->ativo = $data['ativo'];
        $model->save();
    }

    public function updateAtivoByEmpresaId($empresaId, $data)
    {
        $produtos = $this->model->select('*')
        ->where('empresa_id', $empresaId)
        ->get();

        foreach ($produtos as $model) {
            $model->ativo = $data['ativo'];
            $model->save();
        }
    }

}