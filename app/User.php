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
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'cpf', 'telefone', 'email', 'endereco', 'cidade', 'complemento', 'password',
    ];

    /** regras de dados passado pelo formularios que serao aceitos */
    public $rules = [
        'name' => 'required|min:3|max:100',
        'cpf' => 'required|numeric|min:11|max:11',
        'telefone' => 'required|numeric|min:11|max:11',
        'email' => 'required|email',
        'endereco' => 'required|max:100',
        'cidade' => 'required|max:100'
    ];  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
