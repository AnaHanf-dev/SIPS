<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bloco extends Model
{
    protected $table = 'blocos';

    protected $fillable = [
        'nome_bloco',
        'id_area',
        'descricao',
    ];
}
