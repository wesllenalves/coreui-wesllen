<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Nome da tabela.
    protected $table      = 'users';

    //Primary Key da Tabela.
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'cpf', 'telefone', 'email', 'endereco', 'cidade', 'complemento', 'password',
    ];     

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relacionamento.
    public function venda()
    {
        return $this->hasMany('App\Venda');
        //     $this->belongsTo(relação, chave estrangeira local, primary key da relação);
        return $this->belongsTo('App\Venda', 'FkUsers', 'id');
    }
}
