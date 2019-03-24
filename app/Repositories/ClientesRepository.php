<?php 

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\AbstractRepository;

class ClientesRepository extends AbstractRepository
{
    
    public function __construct(Cliente $model)
    {
        $this->model = $model;
    }

    public function createByEmpresaId($empresaId, $data)
    {
        $model = new $this->model;
        $model->fill($data);
        $model->password = bcrypt($data['password']);
        $model->empresa_id = $empresaId;
        $model->save();
        
        return $model;
    }

    public function listByEmpresaId($empresaId){
        $model = $this->model->select('*')
        ->where('empresa_id', $empresaId)
        ->where('ativo', true)
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
        $clientes = $this->model->select('*')
        ->where('empresa_id', $empresaId)
        ->get();

        foreach ($clientes as $model) {
            $model->ativo = $data['ativo'];
            $model->save();
        }
    }

}