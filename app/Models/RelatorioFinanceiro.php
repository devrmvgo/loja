<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatorioFinanceiro extends Model
{
    protected $table = 'relatorios_financeiros';

    protected $fillable = [
        'mes_ano',
        'qntd_total_produtos_vendidos',
        'qntd_vendas',
        'valor_total_vendido',
        'empresa_id'
    ];

    
}