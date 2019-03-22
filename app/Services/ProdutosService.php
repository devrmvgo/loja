<?php 

namespace App\Services;

use App\Repositories\ProdutosRepository;

class ProdutosService 
{
    private $produtoRepository;

    public function __construct(ProdutosRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function createByEmpresaId($empresaId, $data)
    {
        return $this->produtoRepository->createByEmpresaId($empresaId, $data);
    }

    public function list()
    {
        return $this->produtoRepository->list();
    }

    public function listByEmpresaId($empresaId)
    {
        return $this->produtoRepository->listByEmpresaId($empresaId);
    }

    public function update($id, $data)
    {
        return $this->produtoRepository->update($id, $data);
    }

    public function updateAtivo($id, $data)
    {
        return $this->produtoRepository->updateAtivo($id, $data);
    }

    public function updateAtivoByEmpresaId($empresaId, $data)
    {
        return $this->produtoRepository->updateAtivoByEmpresaId($empresaId, $data);
    }

}