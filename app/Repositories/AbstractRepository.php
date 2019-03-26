<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    const DEFAULT_PAGE_SIZE = 20;
    
    protected $model;

    public function getModel() 
    {
        return $this->model;
    }

    public function create(array $data)
    {
        $model = new $this->model;
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function list(){
        $model = $this->model->select('*')
        ->where('ativo', true)
        ->get();

        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }

        return $model;
    }

    public function listAll(){
        $model = $this->model->select('*')
        ->get();

        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }

        return $model;
    }

    public function listById($id)
    {
        return $this->model->find($id);
    }

    public function paginate($model)
    {
        return $model->paginate(self::DEFAULT_PAGE_SIZE);
    }

    public function update($id, array $data)
    {
        $model = $this->model->findOrFail($id);
        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }
        $model->fill($data);
        $model->save();
        return $model;
    }

}
