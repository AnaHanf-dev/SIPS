<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = 'admin';

    protected $fillable = [
        'id_funcionario',
    ];

    public function area()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }
}
