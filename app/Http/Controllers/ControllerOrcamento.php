<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Produto;
use App\User;
use Illuminate\Support\Facades\DB;

class ControllerOrcamento extends Controller
{
    private $venda;
    public function __construct(Venda $venda){
        $this->venda = $venda;
    }

    public function index()
    {
        $vendas = Venda::with('usuario', 'produtos')->where(function ($query) {
            $query->where('statusVenda', '=', 'Orcamento')
            ->orWhere('statusVenda', '=', 'Negociando');
        })->get();//toSql();//get(); 
          
        return view('samples.OrcamentoIndex', ['vendas' => $vendas]);
    }

    public function visualizar($id)
    {
        $vendas = $this->venda->with('usuario', 'produto')->where('idVenda', '=', $id)->get();
        
        return view('samples.OrcamentoVisualizar', ['vendas' => $vendas]);
    }
    public function editar($id)
    {   
        $produtos = Produto::select('idProduto','nome')->get();
        
        $users = User::select('id','name')->get();
        //dd($users);
        $vendas = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();
        
        

        return view('samples.OrcamentoEditar', ['vendas' => $vendas, 'produtos' => $produtos, 'users' => $users]);

        
    }

    public function editarSalvar(Request $request, $id)
    {
        $dataForm = [
            "FkUsers" => $request->FkUsers,
            "qtd" => $request->qtd,
            "dataEntrega" => $request->dataEntrega,
            "desconto" => $request->desconto,
            "gasto" => $request->gasto,
            "taxaEntrega" => $request->taxaEntrega,
            "taxaAdd" => $request->taxaAdd,
            "valorUnd" => $request->valorUnd,
            "valorTotal" => $request->valorTotal,
            "statusVenda" => $request->statusVenda,
            "entrada" => $request->entrada,
            "medidas" => $request->medidas,
            "descricao" => $request->descricao,
        ];


        $venda = Venda::find($id);        
        $produto = $venda->produtos()->sync($request->FKProdutos);
        
        $venda->update($dataForm);

        if($venda && $produto){
            
            return redirect('/sample/orcamento');
        }else{
            return redirect()->route('/sample/orcamento/editar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }
    }    
}
