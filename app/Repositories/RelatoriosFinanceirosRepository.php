<?php

namespace App\Repositories;

use App\Models\RelatorioFinanceiro;
use Carbon\Carbon;
use DB;

class RelatoriosFinanceirosRepository
{
    public function __construct(RelatorioFinanceiro $model)
    {
        $this->model = $model;
    }

    public function create()
    {
        $empresas = DB::table('empresa')->get();

        foreach ($empresas as $empresa) {
            $compras = DB::table('compra')
            ->where('empresa_id', $empresa->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->select('*')
            ->get();
            
            $model = new $this->model;
            $model->mes_ano = Carbon::now()->format('m-Y');

            foreach ($compras as $compra) {
                $model->qntd_total_produtos_vendidos += DB::table('compra_item')
                ->where('compra_id', $compra->id)
                ->whereMonth('created_at', Carbon::now()->month)
                ->sum( 'qntd');
                $model->qntd_total_produtos_vendidos= DB::table('compra_item')
                ->where('compra_id', $compra->id)
                ->whereMonth('created_at', Carbon::now()->month)
                ->sum( 'qntd');
            }

            $model->qntd_vendas= $compras->count();
            $model->valor_total_vendido = DB::table('compra')
            ->where('empresa_id', $empresa->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('valor_total');
            $model->empresa_id = $empresa->id;
            $model->save();
            return $model;
        }
    }

    public function listByEmpresaId($empresaId)
    {
        return $this->model->find($empresaId);
    }

    public function pdfByEmpresaId($empresaId)
    {
        return $this->model->select('*')
        ->where('empresa_id', $empresaId)
        ->get();
    }

}