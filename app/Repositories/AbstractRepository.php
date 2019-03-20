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

    public function list()
    {
        return $this->model->all();
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

    public function delete($id)
    {
        $model = $this->model->find($id);
        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }
        $model->delete();
        return $model;
    }

}
