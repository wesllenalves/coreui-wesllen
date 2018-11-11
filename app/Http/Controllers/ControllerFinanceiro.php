<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lancamento;
use Illuminate\Support\Facades\DB;

class ControllerFinanceiro extends Controller
{   
    private $lancamento;
    public function __construct(Lancamento $lancamento){
        $this->lacamento = $lancamento;
    }
    public function index()
    {
        $lancamentos = $this->lacamento->all();
        return view('samples.FinanceiroIndex', ['lancamentos' => $lancamentos]);
    }    
    
    
    
    public function adicionarReceita(Request $request)
    {
            
        $inserir = new Lancamento;
        $inserir->tipo = $request->tipo;
        $inserir->descricao = $request->descricao;
        $inserir->cliente = $request->cliente;
        $inserir->valor = $request->valor;
        $inserir->data_vencimento = $request->data_vencimento;
        $inserir->formaPgto = $request->formaPgto;
        
        if($request->status === null){
            $inserir->status = 'Devendo';
        }       
        $inserir->save();
        
        if($inserir){
            return redirect('/sample/relatorio');
        }else{
            return redirect('/sample/relatorio')->with(['errors' => 'Falha ao Inserir']);
        }
        
    }
}
