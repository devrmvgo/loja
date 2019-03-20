<?php 

namespace App\Services;

use App\Repositories\CidadesRepository;

class CidadesService 
{
    private $cidadeRepository;

    public function __construct(CidadesRepository $cidadeRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
    }

    public function listCidadesByUf($cidadeUf)
    {
        return $this->cidadeRepository->listCidadesByUf($cidadeUf);
    }

}