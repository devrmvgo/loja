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

    public function listByEmpresaId($empresaId)
    {
        return $this->enderecoRepository->listByEmpresaId($empresaId);
    }

    public function update($id, $data)
    {
        return $this->enderecoRepository->update($id, $data);
    }

    public function updateAtivo($id, $data)
    {
        return $this->enderecoRepository->updateAtivo($id, $data);
    }

    public function delete($id)
    {
        return $this->enderecoRepository->delete($id);
    }

    public function deleteByEmpresaId($empresaId)
    {
        return $this->enderecoRepository->deleteByEmpresaId($empresaId);
    }

}