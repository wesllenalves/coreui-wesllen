<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'FKUsers','FKProdutos', 'qtd', 'dataEntrega', 'valorUnd',
        'valorTotal', 'desconto', 'gasto', 'taxaEntrega', 'taxaAdd',
        'statusVenda', 'entrada', 'descricao', 'medidas',
    ];
}
