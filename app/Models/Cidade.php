<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidade';
    
    protected $fillable = [
        'uf',
        'nome'
    ];

    public function endereco()
    {
        return $this->belongsToMany(Endereco::class);
    }
}
