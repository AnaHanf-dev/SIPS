<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\emprestimo;

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

    public function emprestimos()
    {
        return $this->hasMany(emprestimo::class, 'id_funcionario');
    }
}
