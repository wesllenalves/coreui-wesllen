<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lucro_Mensal extends Model
{
    protected $fillable = [
        'fkVenda','mes', 'ano', 'lucroTotal',
    ];

    public  $timestamps   = true;
}
