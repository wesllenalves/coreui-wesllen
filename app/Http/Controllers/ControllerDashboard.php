<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Produto;
use App\Venda;

class ControllerDashboard extends Controller
{
    public function dashboard(User $user, Produto $produto, Venda $venda)
    {
        $usuario = $user->where('perfil', '=', 'Cliente')->get()->count();
        $produtos = $produto->get()->count();
        $compras = $venda->where('statusVenda', '=', 'Fechado')->get()->count();
        $orcamentos = $venda->with('usuario', 'produto')
            ->where(function ($query)
                {
                    $query->where('statusVenda', '=', 'Orcamento')
                    ->orWhere('statusVenda', '=', 'Negociando');
                }
            )->get()->count();        
        
        return view('samples.dashboard',
        [
             'usuario' => $usuario, 
             'produtos' => $produtos, 
             'compras' => $compras,
             'orcamentos' => $orcamentos
        ]);
    }
}
