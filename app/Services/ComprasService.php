<?php 

namespace App\Services;

use App\Repositories\ComprasRepository;

class ComprasService 
{
    private $compraRepository;

    public function __construct(ComprasRepository $compraRepository)
    {
        $this->compraRepository = $compraRepository;
    }

    public function createByClienteId($clienteId, $data)
    {
        return $this->compraRepository->createByClienteId($clienteId, $data);
    }

    public function listByClienteId($clienteId)
    {
        return $this->compraRepository->listByCLienteId($clienteId);
    }

    public function update($id, $data)
    {
        return $this->compraRepository->update($id, $data);
    }

}