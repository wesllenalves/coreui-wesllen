<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lancamento;
use App\Venda;
use Illuminate\Support\Facades\DB;


class ControllerFinanceiro extends Controller
{   
    private $lancamento;
    private $totalPage = 5;
    public function __construct(Lancamento $lancamento){
        $this->lancamento = $lancamento;
    }
    public function index()
    {
        $vendas = Venda::with('usuario', 'produto')->where('statusVenda', '=', 'Fechado')->paginate($this->totalPage);              

        return view('samples.FinanceiroIndex', ['vendas' => $vendas]);
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

     
    
}
