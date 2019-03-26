<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraItem extends Model
{
    protected $table = 'compra_item';
    protected $fillable = [
        'produto_id',
        'qntd',
        'valor_total',
        'compra_id'
    ];
}
