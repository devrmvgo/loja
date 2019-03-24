<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ClientesService;

class ClientesController extends Controller
{
    private $clienteService;
    
    public function __construct(ClientesService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function createByEmpresaId($empresaId)
    {
        $data = \Request::json()->all();
        $this->clienteService->createByEmpresaId($empresaId, $data);
        return response()->json([
            'message' => 'Dados salvos com sucesso!',
        ]);
    }

    public function list()
    {
        $data = $this->empresaService->list();
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count(),
            'success' => true
        ]);
    }

    public function listByEmpresaId($empresaId)
    {
        $data = $this->clienteService->listByEmpresaId($empresaId);
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count()
        ]);
    }

    public function update($id)
    {
        $data = \Request::json()->all();
        $this->clienteService->update($id, $data);
        return response()->json([
            'message' => 'Dados alterados com sucesso'
        ]);
    }

    public function updateAtivo($id)
    {
        $data = \Request::json()->all();
        $this->clienteService->updateAtivo($id, $data);
        return response()->json([
            'message' => 'Estado alterado com sucesso'
        ]);
    }

    public function updateAtivoByEmpresaId($empresaId)
    {
        $data = \Request::json()->all();
        $this->clienteService->updateAtivoByEmpresaId($empresaId, $data);
        return response()->json([
            'message' => 'Estado alterado com sucesso'
        ]);
    }

}
