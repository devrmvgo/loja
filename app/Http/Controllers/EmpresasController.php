<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmpresasService;

class EmpresasController extends Controller
{
    private $empresaService;
    
    public function __construct(EmpresasService $empresaService)
    {
        $this->empresaService = $empresaService;
    }

    public function create()
    {
        $data = \Request::json()->all();
        $this->empresaService->create( $data);
        return response()->json([
            'message' => 'Dados salvos com sucesso!',
        ]);
    }

    public function list()
    {
        $data = $this->empresaService->list();
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count(),
            'success' => true
        ]);
    }

    public function update($id)
    {
        $data = \Request::json()->all();
        $this->empresaService->update($id, $data);
        return response()->json([
            'message' => 'Dados alterados com sucesso'
        ]);
    }

    public function updateAtivo($id)
    {
        $data = \Request::json()->all();
        $this->empresaService->updateAtivo($id, $data);
        return response()->json([
            'message' => 'Estado alterado com sucesso'
        ]);
    }

    public function delete($id){
        $this->empresaService->delete($id);
        return response()->json([
            'message' => 'Dados apagados com sucesso'
        ]);
    }

}
