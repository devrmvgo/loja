<?php 

namespace App\Services;

use App\Repositories\EnderecosRepository;

class EnderecosService 
{
    private $enderecoRepository;

    public function __construct(EnderecosRepository $enderecoRepository)
    {
        $this->enderecoRepository = $enderecoRepository;
    }

    public function createByEmpresaId($empresaId, $data)
    {
        return $this->enderecoRepository->createByEmpresaId($empresaId, $data);
    }

    public function createByClienteId($clienteId, $data)
    {
        return $this->enderecoRepository->createByClienteId($clienteId, $data);
    }

    public function listByEmpresaId($empresaId)
    {
        return $this->enderecoRepository->listByEmpresaId($empresaId);
    }

    public function listByClienteId($clienteId)
    {
        return $this->enderecoRepository->listByCLienteId($clienteId);
    }

    public function update($id, $data)
    {
        return $this->enderecoRepository->update($id, $data);
    }

    public function updateAtivo($id, $data)
    {
        return $this->enderecoRepository->updateAtivo($id, $data);
    }

    public function updateAtivoByEmpresaId($empresaId, $data)
    {
        return $this->enderecoRepository->updateAtivoByEmpresaId($empresaId, $data);
    }

    public function updateAtivoByClienteId($clienteId, $data)
    {
        return $this->enderecoRepository->updateAtivoByClienteId($clienteId, $data);
    }

}