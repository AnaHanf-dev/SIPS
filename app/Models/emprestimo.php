<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\patrimonio;
use App\Models\funcionarios;

class emprestimo extends Model
{
    protected $table = 'emprestimo';

    protected $fillable = [
        'id_patrimonio',
        'id_funcionario',
        'data_emprestimo',
        'data_devolucao',
    ];

    public function patrimonio()
    {
        return $this->belongsTo(patrimonio::class, 'id_patrimonio');
    }

    public function funcionario()
    {
        return $this->belongsTo(funcionarios::class, 'id_funcionario');
    }
}
