<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Produto;
use App\User;
use App\Produtos_vendas;
use Illuminate\Support\Facades\DB;

class ControllerOrcamento extends Controller
{
    private $venda;
    public function __construct(Venda $venda){
        $this->venda = $venda;
    }

    public function index()
    {
        $pivos = Produtos_vendas::get();
        
        
        $vendas = Venda::with('usuario', 'produtos')->where(function ($query) {
            $query->where('statusVenda', '=', 'Orcamento')
            ->orWhere('statusVenda', '=', 'Negociando');
        })->get();//toSql();//get(); 
          
        return view('samples.OrcamentoIndex', ['vendas' => $vendas, 'pivos' => $pivos]);
    }

    public function visualizar($id)
    {
        $vendas = $this->venda->with('usuario', 'produto')->where('idVenda', '=', $id)->get();
        
        return view('samples.OrcamentoVisualizar', ['vendas' => $vendas]);
    }
    public function editar($id)
    {   
        $produtos = Produto::select('idProduto','nome','valorMedio')->get();
        
        $users = User::select('id','name')->get();
        //dd($users);
        $vendas = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();
        
        

        return view('samples.OrcamentoEditar', ['vendas' => $vendas, 'produtos' => $produtos, 'users' => $users]);

        
    }

    public function editarSalvar(Request $request, $id)
    {   
       
        
        //traz todos os aray dos inputes e armazena em variaveis
        $produtos = $request->idProduto;
        $quantidade = $request->qtdProduto;
        $valores = $request->valorProduto;

       
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

        
        
        $attributes = [];

        foreach($produtos as  $index => $produ)
        {
            
             /// cria o array com indece da tabela
            $attributes = [
               'id_produto' => $produ,
                'qtd' => $quantidade[$index],
               'valor' => $valores[$index]
                

            ];

            //grava s produtos na tabela pivo
            $produto = $venda->produtos()->attach([$id => $attributes]);
            
           // print_r($produ.',');
            //$produto = $venda->produtos()->sync($produto, $attributes);
            //print_r($attributes);
        }     
        
        
           
        $produto = $venda->produtos()->sync([$id => ['id_produto' => 1, 'qtd' => 2, 'valor' => 50 ], ['id_produto' => 2, 'qtd' => 2, 'valor' => 50 ]]);
        $venda->update($dataForm);

        if($venda && $produto){
            
            return redirect('/sample/orcamento');
        }else{
            return redirect()->route('/sample/orcamento/editar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }
    }    
}
