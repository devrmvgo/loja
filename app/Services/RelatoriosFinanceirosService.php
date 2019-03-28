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

    public function createByEmpresaId($empresaId)
    {
        return $this->relatorioFinanceiroRepository->createByEmpresaId($empresaId);
    }

    public function listByEmpresaId($empresaId)
    {
        return $this->relatorioFinanceiroRepository->listByEmpresaId($empresaId);
    }

}