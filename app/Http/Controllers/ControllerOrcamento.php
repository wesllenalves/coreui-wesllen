<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Produto;
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
    public function editar($id)
    {   
        $produtos = Produto::select('idProduto','nome')->get();
        $vendas = $this->venda->with('usuario', 'produto')->where('idVenda', '=', $id)->get();
        return view('samples.OrcamentoEditar', ['vendas' => $vendas], ['produtos' => $produtos]);
    }
    public function editarSalvar(Request $request, $id)
    {
        $dataForm = $request->except('_token');
        $venda = $this->venda->find($id);

        if($venda){
            DB::table('vendas')->update($dataForm);
            //$venda->update(['FkProdutos' => 2]);

            //dd($venda);
            //$venda->usuario->update($dataForm);
            //$venda->produto->update($dataForm);
        
            return redirect('/sample/orcamento');
        }else{
            return redirect()->route('/sample/orcamento/editar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }
    }
}
