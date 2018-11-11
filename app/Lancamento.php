<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
   //Nome da tabela.
   protected $table      = 'lancamentos';

   //Primary Key da Tabela.
   protected $primaryKey = 'id';

   protected $fillable = [
       'tipo', 'descricao', 'cliente', 'valor', 'data_vencimento', 'formaPgto', 'status', 'data_pagamento',  
   ]; 
}
