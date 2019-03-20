<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EnderecosService;

class EnderecosController extends Controller
{
    private $enderecoService;
    
    public function __construct(EnderecosService $enderecoService)
    {
        $this->enderecoService = $enderecoService;
    }


    public function createByEmpresaId($empresaId)
    {
        $data = \Request::json()->all();
        $this->enderecoService->createByEmpresaId($empresaId, $data);
        return response()->json([
            'message' => 'Dados salvos com sucesso!'
        ]);
    }

    public function listByEmpresaId($empresaId)
    {
        $data = $this->enderecoService->listByEmpresaId($empresaId);
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count()
        ]);
    }

    public function update($id)
    {
        $data = \Request::json()->all();
        $this->enderecoService->update($id, $data);
        return response()->json([
            'message' => 'Dados alterados com sucesso'
        ]);
    }

    public function updateAtivo($id)
    {
        $data = \Request::json()->all();
        $this->enderecoService->updateAtivo($id, $data);
        return response()->json([
            'message' => 'Estado alterado com sucesso'
        ]);
    }

    public function delete($id){
        $this->enderecoService->delete($id);
        return response()->json([
            'message' => 'Dados apagados com sucesso'
        ]);
    }

    public function deleteByEmpresaId($empresaId){
        $this->enderecoService->deleteByEmpresaId($empresaId);
        return response()->json([
            'message' => 'Dados apagados com sucesso'
        ]);
    }

}
