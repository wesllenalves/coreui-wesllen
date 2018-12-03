<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;


class ControllerFiltroPesquisa extends Controller
{
    private $totalPage = 5;
    public function pesquisarFinanceiro(Request $request, Venda $venda)
    {
        $dataForm = $request->except('_token');
        $vendas = $venda->searsh($dataForm)->where('statusVenda', '=', 'Fechado')->paginate($this->totalPage);        
        return view('samples.FinanceiroIndex', ['vendas' => $vendas, 'dataForm' => $dataForm]);
    }

     
}
