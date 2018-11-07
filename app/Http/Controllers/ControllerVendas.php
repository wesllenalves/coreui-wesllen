<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;

class ControllerVendas extends Controller
{   
    private $venda;
    public function __construct(Venda $venda){
        $this->venda = $venda;
    }

    public function index()
    {   
        $vendas = $this->venda->with('usuario', 'produto')->get();

        

        /*$users = $vendas;
        foreach ($users as $use){
           print_r($use->usuario->name); die();
        }*/

        return view('samples.VendasIndex', ['vendas' => $vendas]);
    }
}
