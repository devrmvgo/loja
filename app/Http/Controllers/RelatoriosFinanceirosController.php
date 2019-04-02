<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RelatoriosFinanceirosService;
use Barryvdh\DomPDF\Facade as PDF;

class RelatoriosFinanceirosController extends Controller
{
    private $relatorioFinanceiroService;
    
    public function __construct(RelatoriosFinanceirosService $relatorioFinanceiroService)
    {
        $this->relatorioFinanceiroService = $relatorioFinanceiroService;
    }


    public function create()
    {
        $this->relatorioFinanceiroService->create();
        return response()->json([
            'message' => 'Relatorios Gerados com sucesso!'
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

    public function pdfByEmpresaId($empresaId)
    {
        $data = $this->relatorioFinanceiroService->pdfByEmpresaId($empresaId);
        return PDF::loadHTML($data)
            ->stream();
    }
}
