<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProdutosService;

class ProdutosController extends Controller
{
    private $produtoService;
    
    public function __construct(ProdutosService $produtoService)
    {
        $this->produtoService = $produtoService;
    }


    public function createByEmpresaId($empresaId)
    {
        $data = \Request::json()->all();
        $this->produtoService->createByEmpresaId($empresaId, $data);
        return response()->json([
            'message' => 'Dados salvos com sucesso!'
        ]);
    }

    public function list()
    {
        $data = $this->produtoService->list();
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count(),
            'success' => true
        ]);
    }

    public function listByEmpresaId($empresaId)
    {
        $data = $this->produtoService->listByEmpresaId($empresaId);
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count()
        ]);
    }

    public function update($id)
    {
        $data = \Request::json()->all();
        $this->produtoService->update($id, $data);
        return response()->json([
            'message' => 'Dados alterados com sucesso'
        ]);
    }

    public function updateAtivo($id)
    {
        $data = \Request::json()->all();
        $this->produtoService->updateAtivo($id, $data);
        return response()->json([
            'message' => 'Estado alterado com sucesso'
        ]);
    }

    public function delete($id){
        $this->produtoService->delete($id);
        return response()->json([
            'message' => 'Dados apagados com sucesso'
        ]);
    }

    public function deleteByEmpresaId($empresaId){
        $this->produtoService->deleteByEmpresaId($empresaId);
        return response()->json([
            'message' => 'Dados apagados com sucesso'
        ]);
    }
}
