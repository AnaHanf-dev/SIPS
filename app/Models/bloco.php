<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\area_escola;

class bloco extends Model
{
    protected $table = 'bloco';

    protected $fillable = [
        'nome_bloco',
        'id_area',
        'descricao',
    ];

    public function area()
    {
        return $this->belongsTo(area_escola::class, 'id_area');
    }
}
