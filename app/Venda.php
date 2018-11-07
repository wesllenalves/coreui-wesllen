<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Venda extends Model
{   
    //Nome da tabela.
    protected $table      = 'vendas';

    //Primary Key da Tabela.
    protected $primaryKey = 'idVenda';

    protected $fillable = [
        'FKUsers','FKProdutos', 'qtd', 'dataEntrega', 'valorUnd',
        'valorTotal', 'desconto', 'gasto', 'taxaEntrega', 'taxaAdd',
        'statusVenda', 'entrada', 'descricao', 'medidas',
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User', 'FkUsers');
         //     $this->hasOne(relacao, chave estrangeira, primary key);
         //return $this->hasOne('App\User', 'FkUsers', 'idVenda');
    }

    public function produto()
    {
        return $this->belongsTo('App\Produto', 'FkProdutos');
    }
}
