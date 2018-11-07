<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerFinanceiro extends Controller
{
    public function index()
    {
        return view('samples.FinanceiroIndex');
    }
    
    public function relatorio(Request $request)
    {
        $relatorio = $request->all();
        dd($relatorio);
        
        return view('samples.Relatorio');
    }
    
    public function visualizar()
    {
        return view('samples.VisualizarRelatorio');
    }
}
