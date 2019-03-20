<?php 

namespace App\Repositories;

use App\Models\Empresa;
use App\Repositories\AbstractRepository;

class EmpresasRepository extends AbstractRepository
{
    
    public function __construct(Empresa $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $model = new $this->model;
        $model->fill($data);
        $model->password = bcrypt($data['password']);
        $model->save();
        return $model;
    }
    
    public function updateAtivo($id, $data)
    {
        $model = $this->model->findOrFail($id);
        $model->ativo = $data['ativo'];
        $model->save();
    }

}