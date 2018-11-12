<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lancamento;
use Illuminate\Support\Facades\DB;

class ControllerFinanceiro extends Controller
{   
    private $lancamento;
    public function __construct(Lancamento $lancamento){
        $this->lancamento = $lancamento;
    }
    public function index()
    {
        $lancamentos = $this->lancamento->all();
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
        if($request->status === 'Pago'){
            $inserir->status = 'Pago';
            $inserir->data_pagamento = $request->data_pagamento;
        }
        
        $inserir->save();
        
        if($inserir){
            return redirect('/sample/relatorio');
        }else{
            return redirect('/sample/relatorio')->with(['errors' => 'Falha ao Inserir']);
        }
        
    }


    public function adicionarDespesa(Request $request)
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
        if($request->status === 'Pago'){
            $inserir->status = 'Pago';
            $inserir->data_pagamento = $request->data_pagamento;
        }
        
        $inserir->save();
        
        if($inserir){
            return redirect('/sample/relatorio');
        }else{
            return redirect('/sample/relatorio')->with(['errors' => 'Falha ao Inserir']);
        }
    }

    public function editar(Request $request)
    {
        if($request->data_pagamento === null){
            $status = 'Devendo';
            $data_pagamento = null;
        }else{
            $status = 'Pago';
            $data_pagamento = $request->data_pagamento;
        }
        
        
        $dados = [

            "tipo" => $request->tipo,
            "descricao" => $request->descricao,
            "cliente" => $request->cliente,
            "valor" => $request->valor,
            "data_vencimento" => $request->data_vencimento,
            "formaPgto" => $request->formaPgto,
            "status" => $status,
            "data_pagamento" => $data_pagamento,
        ];
        
        $lancamentos = $this->lancamento->find($request->id);
        
        $update = $lancamentos->update($dados);
        
        if($update){
            return redirect('/sample/relatorio');
        }else{
            return redirect('/sample/relatorio')->with(['errors' => 'Falha ao Inserir']);
        }
    }

    public function deletar($id)
    {
        $lancamentos = $this->lancamento->find($id);
        
        $deletar = $lancamentos->delete();

        if($deletar){
            return redirect('/sample/relatorio');
        }else{
            return redirect('/sample/relatorio')->with(['errors' => 'Falha ao Inserir']);
        }  
    }
}
