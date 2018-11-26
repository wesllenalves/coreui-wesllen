<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    //Primary Key da Tabela.
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo', 'imagem', 'preco', 'status', 
    ]; 
}
