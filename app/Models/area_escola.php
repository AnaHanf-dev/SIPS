<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\blocos;


class area_escola extends Model
{
    protected $table = 'area_escola';

    protected $fillable = [
        'nome_area',
        'localizacao',
        'descricao',
    ];

    public function bloco(){
        return $this->hasMany(bloco::class, 'id_area');
    }
}
