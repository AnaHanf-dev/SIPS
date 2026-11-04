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

    public function bloco()
    {
        return $this->belongsTo(bloco::class, 'id_bloco');
    }

    public function patrimonio()
    {
        return $this->hasMany(patrimonio::class, 'id_salas');
    }
}
