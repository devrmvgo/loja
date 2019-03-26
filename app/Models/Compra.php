<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compra';
    protected $fillable = [
        'valor_total',
        'empresa_id',
        'cliente_id',
        'endereco_entrega_id'
    ];
}
