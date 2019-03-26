<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ComprasItensService;

class ComprasItensController extends Controller
{
    private $compraItemService;
    
    public function __construct(ComprasItensService $compraItemService)
    {
        $this->compraItemService = $compraItemService;
    }

    public function createByCompraId($compraId)
    {
        $data = \Request::json()->all();
        $this->compraItemService->createByCompraId($compraId, $data);
        return response()->json([
            'message' => 'Dados salvos com sucesso!'
        ]);
    }

    public function listByCompraId($compraId)
    {
        $data = $this->compraItemService->listByCompraId($compraId);
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count()
        ]);
    }
}
