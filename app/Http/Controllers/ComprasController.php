<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ComprasService;

class ComprasController extends Controller
{
    private $compraService;
    
    public function __construct(ComprasService $compraService)
    {
        $this->compraService = $compraService;
    }

    public function createByClienteId($clienteId)
    {
        $data = \Request::json()->all();
        $this->compraService->createByClienteId($clienteId, $data);
        return response()->json([
            'message' => 'Dados salvos com sucesso!'
        ]);
    }

    public function listByClienteId($clienteId)
    {
        $data = $this->compraService->listByClienteId($clienteId);
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count()
        ]);
    }

    public function update($id)
    {
        $data = \Request::json()->all();
        $this->compraService->update($id, $data);
        return response()->json([
            'message' => 'Dados alterados com sucesso'
        ]);
    }
}
