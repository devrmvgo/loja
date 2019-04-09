<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'nome',
        'preco',
        'descricao',
        'qntd'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
