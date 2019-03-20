<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CidadesService;

class CidadesController extends Controller
{
    private $cidadeService;

    public function __construct(CidadesService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }

    public function listCidadesByUf($cidadeUf)
    {
        $data = $this->cidadeService->listCidadesByUf($cidadeUf);
        return response()->json([
            'data' => $data->toArray(),
            'total' => $data->count(),
            'success' => true
        ]);
    }
}
