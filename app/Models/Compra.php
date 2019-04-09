<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Compra extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'compra';
    protected $fillable = [
        'valor_total',
        'empresa_id',
        'cliente_id',
        'endereco_entrega_id'
    ];
}
