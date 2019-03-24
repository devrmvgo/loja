<?php 

namespace App\Services;

use App\Repositories\ClientesRepository;
use App\Services\EnderecosService;
use DB;

class ClientesService 
{
    private $clienteRepository;

    public function __construct(ClientesRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function createByEmpresaId($empresaId, $data)
    {
        DB::transaction(function () use ($empresaId, $data) {
            $cliente =  $this->clienteRepository->createByEmpresaId($empresaId, $data);
            $enderecoService = \App::make(EnderecosService::class);
            $enderecoService->createByClienteId($cliente->id, $data['endereco']);
            return $cliente;

        });
    }

    public function list()
    {
        return $this->clienteRepository->list();
    }

    public function listByEmpresaId($empresaId)
    {
        return $this->clienteRepository->listByEmpresaId($empresaId);
    }
    
    public function update($id, $data)
    {
        return $this->clienteRepository->update($id, $data);
    }

    public function updateAtivo($id, $data)
    {
        DB::transaction(function () use ($id, $data) {
            $enderecoService = \App::make(EnderecosService::class);
            $enderecoService->updateAtivoByClienteId($id, $data);
            $cliente =  $this->clienteRepository->updateAtivo($id, $data);
            return $cliente;

        });
    }

    public function updateAtivoByEmpresaId($empresaId, $data)
    {
        DB::transaction(function () use ($empresaId, $data) {
            $clientes = $this->clienteRepository->listByEmpresaId($empresaId);
            $enderecoService = \App::make(EnderecosService::class);
            foreach ($clientes as $model) {
                $enderecoService->updateAtivoByClienteId($model->id, $data);
            }
            $cliente =  $this->clienteRepository->updateAtivoByEmpresaId($empresaId, $data);
            return $cliente;

        });
    }

}