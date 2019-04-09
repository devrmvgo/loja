<?php 

namespace App\Services;

use App\Repositories\ComprasRepository;
use DB;

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
        DB::transaction(function () use ($data) {
            $compra =  $this->compraRepository->createByClienteId($clienteId, $data);
            $compraItemService = \App::make(ComprasItensService::class);
            $compraItemService->createByCompraId($compra->id, $data['compra_item']);
            return $compra;
        });
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