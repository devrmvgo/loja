<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class CompraItem extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'compra_item';
    protected $fillable = [
        'produto_id',
        'qntd',
        'valor_total',
        'compra_id'
    ];
}
