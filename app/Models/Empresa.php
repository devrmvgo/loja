<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    
    protected $fillable = [
        'cnpj',
        'nomeEmpresa',
        'cpfProprietario',
        'nomeProprietario',
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

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
