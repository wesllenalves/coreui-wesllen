<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
     //Nome da tabela.
    protected $table      = 'produtos';

    protected $primaryKey = 'idProduto';

    protected $fillable = [
        'nome', 'medidas', 'descricao', 'valorMedio',
         'gastoMedio', 'lucroMedio', 'tempoFabricacao', 'categoria',
    ];

    public function Venda()
    {
        return $this->hasMany('App\Venda');
    }
}
