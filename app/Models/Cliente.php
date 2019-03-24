<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    
    protected $fillable = [
        'cpf',
        'nome',
        'data_nasc',
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

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

}
