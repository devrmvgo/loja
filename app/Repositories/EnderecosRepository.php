<?php

namespace App\Repositories;

use App\Models\Endereco;
use App\Models\Cidade;
use App\Repositories\AbstractRepository;

class EnderecosRepository extends AbstractRepository
{
    public function __construct(Endereco $model)
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

    public function createByClienteId($clienteId, $data)
    {
        $model = new $this->model;
        $model->fill($data);
        $model->cliente_id = $clienteId;
        $model->save();
        
        return $model;
    }

    public function listByEmpresaId($empresaId)
    {
        $model = $this->model->select(
            'endereco.logradouro',
            'endereco.logradouro_numero',
            'endereco.logradouro_complemento',
            'endereco.bairro',
            'endereco.cep',
            'cidade.nome AS cidade_nome',
            'cidade.uf'
        )
        ->join(
            'cidade',
            'endereco.cidade_id',
            '=',
            'cidade.id'
        )
        ->where('endereco.empresa_id', $empresaId)
        ->get();

        if( is_null($model) ) {
            abort(404, "Não encontrado");
        }
        
        return $model;
    }

    public function listByClienteId($clienteId)
    {
        $model = $this->model->select(
            'endereco.logradouro',
            'endereco.logradouro_numero',
            'endereco.logradouro_complemento',
            'endereco.bairro',
            'endereco.cep',
            'cidade.nome AS cidade_nome',
            'cidade.uf'
        )
        ->join(
            'cidade',
            'endereco.cidade_id',
            '=',
            'cidade.id'
        )
        ->where('endereco.cliente_id', $clienteId)
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
        $enderecos = $this->model->select('*')
        ->where('empresa_id', $empresaId)
        ->get();

        foreach ($enderecos as $model) {
            $model->ativo = $data['ativo'];
            $model->save();
        }
    }

    public function updateAtivoByClienteId($clienteId, $data)
    {
        $enderecos = $this->model->select('*')
        ->where('cliente_id', $clienteId)
        ->get();

        foreach ($enderecos as $model) {
            $model->ativo = $data['ativo'];
            $model->save();
        }
    }

}