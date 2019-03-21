<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';

    protected $fillable = [
        'logradouro',
        'logradouro_numero',
        'logradouro_complemento',
        'bairro',
        'cep',
        'cidade_id'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

}
