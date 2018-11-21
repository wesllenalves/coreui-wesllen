<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use Illuminate\Support\Facades\DB;

class ControllerOrcamento extends Controller
{
    private $venda;
    public function __construct(Venda $venda){
        $this->venda = $venda;
    }

    public function index()
    {
        $vendas = $this->venda->with('usuario', 'produto')->where('statusVenda', '=', 'Negociando')->get(); 
          
        return view('samples.OrcamentoIndex', ['vendas' => $vendas]);
    }

    public function visualizar($id)
    {
        $vendas = $this->venda->with('usuario', 'produto')->where('idVenda', '=', $id)->get();
        
        return view('samples.OrcamentoVisualizar', ['vendas' => $vendas]);
    }
}
