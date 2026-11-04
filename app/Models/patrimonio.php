<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class patrimonio extends Model
{
    protected $table = 'patrimonio';

    protected $fillable = [
        'nome_patrimonio',
        'n_patrimonio',
        'id_salas',
        'id_responsa',
        'descricao',
    ];

    public function funcionarios()
    {
        return $this->belongsToMany(funcionarios::class, 'id_funcionario');
    }

    public function sala()
    {
        return $this->belongsTo(salas::class, 'id_salas');
    }
}
