<?php 

namespace App\Services;

use App\Repositories\ComprasItensRepository;

class ComprasItensService 
{
    private $compraItemRepository;

    public function __construct(ComprasItensRepository $compraItemRepository)
    {
        $this->compraItemRepository = $compraItemRepository;
    }

    public function createByCompraId($compraId, $data)
    {
        return $this->compraItemRepository->createByCompraId($compraId, $data);
    }

    public function listByCompraId($compraId)
    {
        return $this->compraItemRepository->listByCompraId($compraId);
    }

}