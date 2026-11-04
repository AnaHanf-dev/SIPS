<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\funcionarios;

class FunciToken extends Model
{
    protected $table = 'funci_token';

    protected $fillable = [
        'id_funcionario',
        'token',
        'valido_ate',
    ];

    public function funcionario()
    {
        return $this->belongsTo(funcionarios::class, 'id_funcionario');
    }
}
