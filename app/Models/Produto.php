<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Produto extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

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
