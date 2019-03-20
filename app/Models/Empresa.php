<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    
    protected $fillable = [
        'cnpj',
        'nome',
        'telefone',
        'email'
    ];

    protected $hidden = [
        'password'
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
}
