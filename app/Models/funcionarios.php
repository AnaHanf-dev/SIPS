<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class funcionarios extends Model
{
    protected $table = 'funcionarios';
    
    protected $fillable = [
        'nome_funcionario',
        'email',
        'senha',
        'cargo',
        'NIF',
    ];
}
