<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emprestimo extends Model
{
    protected $table = 'emprestimo';

    protected $fillable = [
        'id_patrimonio',
        'id_funcionario',
        'data_emprestimo',
        'data_devolucao',
    ];
}
