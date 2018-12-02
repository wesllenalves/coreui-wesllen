<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;

class ControllerFiltroPesquisa extends Controller
{
    private $totalPage = 5;
    public function pesquisarFinanceiro(Request $request, Venda $venda)
    {
        $dataForm = $request->all();
        $vendas = $venda->searsh($dataForm, $this->totalPage);
        
        return view('samples.FinanceiroIndex', ['vendas' => $vendas]);
    }
}
