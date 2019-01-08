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
        $produtos = Produto::select('idProduto','nome','valorMedio')->get();

        //$pivos = Produtos_vendas::where('id_venda', $id)->get();

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
        //procurar saber se esse produto ja foi cadastrado anteriomente
        $verificacao = Produtos_vendas::where('id_venda',  $id)
        ->whereIn('id_produto', $produtos)
        ->exists();
        
        

        //verifica se a variavel traz valor boolean true se existir retorna uma mensagem
        if( $verificacao == TRUE){
            return redirect('/sample/orcamento/editar/'.$id)->with(['error' => 'Já existe dados iguais cadastrados.Para não obter dados duplicados apague todos os produtos é insira com todos os produtos pretendidos']);
            
        }

        
       
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
                      
        }     
            
           
        //$produto = $venda->produtos()->sync([$id => ['id_produto' => 1, 'qtd' => 2, 'valor' => 50 ], ['id_produto' => 2, 'qtd' => 2, 'valor' => 50 ]]);
        $venda->update($dataForm);

        if($venda){
            
            return redirect('/sample/orcamento');
        }else{
            return redirect()->route('/sample/orcamento/editar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }
    } 
    
    public function deletarProduto(Request $request, $id)
    {
        $venda = Venda::find($id);

        $venda->produtos()->detach($request->produto);
        $response = array("success" => true);

        $vendas = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();

        
        
        
        
    

        foreach ($vendas as  $venda) {

        $resultado = 
        
        "<form id='form'>                
                  
        <table class='table' >
            <input id='url' type='hidden' value='{$venda->idVenda}' name='url'>
          <thead>
            <p>Seleciones os itens para deletar</p>
            <tr>
              <th scope='col'>#</th>
              <th scope='col'>Produto</th>
              <th scope='col'>Deletar</th>
            </tr>
          </thead>
          <tbody id='produtos'>"; 
          
          
            foreach ($venda->produtos as $value){
                
                    $resultado .= "<tr>
                    <td>{$value->idProduto}</td>
                    <td>{$value->nome}</td>
                    <td><input type='checkbox' name='checks[]' value='{$value->idProduto}' id='pro'></td>
                </tr>  ";     
              
                }
            }
          
          
          
            $resultado .="                
          </tbody>  
      </table>
      <div class='text-right'>
          <input type='submit' class='btn btn-danger' value='Deletar'>

        </div>
      </form>";
    
        return $resultado;
    }
}
