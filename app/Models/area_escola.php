<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class area_escola extends Model
{
    protected $table = 'area_escola';

    protected $fillable = [
        'nome_area',
        'localizacao',
        'descricao',
    ];
}
