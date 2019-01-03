<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos_vendas extends Model
{
      //Nome da tabela.
      protected $table      = 'produtos_vendas';

      protected $primaryKey = 'id';
  
      protected $fillable = [
          'id_venda', 'id_produto', 'qtd', 'valor',
      ];
}
