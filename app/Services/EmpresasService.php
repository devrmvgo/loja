<?php 

namespace App\Services;

use App\Repositories\EmpresasRepository;
use App\Services\EnderecosService;
use DB;

class EmpresasService 
{
    private $empresaRepository;

    public function __construct(EmpresasRepository $empresaRepository)
    {
        $this->empresaRepository = $empresaRepository;
    }

    public function create($data)
    {
        DB::transaction(function () use ($data) {
            $empresa =  $this->empresaRepository->create($data);
            $enderecoService = \App::make(EnderecosService::class);
            $enderecoService->createByEmpresaId($empresa->id, $data['endereco']);
            return $empresa;

        });
    }

    public function list()
    {
        return $this->empresaRepository->list();
    }

    public function update($id, $data)
    {
        return $this->empresaRepository->update($id, $data);
    }

    public function updateAtivo($id, $data)
    {
        DB::transaction(function () use ($id, $data) {
            $enderecoService = \App::make(EnderecosService::class);
            $enderecoService->updateAtivoByEmpresaId($id, $data);
            $produtoService = \App::make(ProdutosService::class);
            $produtoService->updateAtivoByEmpresaId($id, $data);
            $clienteService = \App::make(ClientesService::class);
            $clienteService->updateAtivoByEmpresaId($id, $data);
            $empresa =  $this->empresaRepository->updateAtivo($id, $data);
            return $empresa;

        });
    }

}