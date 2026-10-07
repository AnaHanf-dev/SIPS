<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salas extends Model
{
    protected $table = 'salas';

    protected $fillable = [
        'nome_sala',
        'id_bloco',
        'descricao',
    ];
}
