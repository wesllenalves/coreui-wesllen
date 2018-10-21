<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome','medidas', 'descricao', 'valorMedio', 'gastoMedio', 'lucroMedio', 'tempoFabricacao', 'categoria',
    ];
}
