<?php 

namespace App\Services;

use App\Repositories\RelatoriosFinanceirosRepository;

class RelatoriosFinanceirosService 
{
    private $relatorioFinanceiroRepository;

    public function __construct(RelatoriosFinanceirosRepository $relatorioFinanceiroRepository)
    {
        $this->relatorioFinanceiroRepository = $relatorioFinanceiroRepository;
    }

    public function create()
    {
        return $this->relatorioFinanceiroRepository->create();
    }

    public function listByEmpresaId($empresaId)
    {
        return $this->relatorioFinanceiroRepository->listByEmpresaId($empresaId);
    }

    public function pdfByEmpresaId($empresaId)
    {
        return $this->relatorioFinanceiroRepository->pdfByEmpresaId($empresaId);
    }
}