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
        return $this->empresaRepository->updateAtivo($id, $data);
    }

    public function delete($empresaId)
    {
        DB::transaction(function () use ($empresaId) {
            $enderecoService = \App::make(EnderecosService::class);
            $enderecoService->deleteByEmpresaId($empresaId);
            $empresa =  $this->empresaRepository->delete($empresaId);
            return $empresa;

        });
    }

}