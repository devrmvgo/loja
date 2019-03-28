<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RelatoriosFinanceirosService;

class RelatoriosFinanceirosController extends Controller
{
    private $relatorioFinanceiroService;
    
    public function __construct(RelatoriosFinanceirosService $relatorioFinanceiroService)
    {
        $this->relatorioFinanceiroService = $relatorioFinanceiroService;
    }


    public function createByEmpresaId($empresaId)
    {
        
        $this->relatorioFinanceiroService->createByEmpresaId($empresaId);
        return response()->json([
            'message' => 'Dados salvos com sucesso!'
        ]);
    }

    public function listByEmpresaId($empresaId)
    {
        $data = $this->relatorioFinanceiroService->listByEmpresaId($empresaId);
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count()
        ]);
    }

}
