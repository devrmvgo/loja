<?php 

namespace App\Repositories;
use App\Models\Cidade;

class CidadesRepository
{
    
    public function __construct(Cidade $model)
    {
        $this->model = $model;
    }

    public function listCidadesByUf($cidadeUf)
    {
        $model = $this->model->select('*')
        ->from('cidade')
        ->where('uf', $cidadeUf)
        ->get();

        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }
        
        return $model;
    }

}