<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use Illuminate\Support\Facades\DB;

class ControllerVendas extends Controller
{   
    private $venda;
    public function __construct(Venda $venda){
        $this->venda = $venda;
    }

    public function index()
    {   
        $vendas = $this->venda->with('usuario', 'produto')->get();

        

        /*$users = $vendas;
        foreach ($users as $use){
           print_r($use->usuario->name); die();
        }*/
    
        return view('samples.VendasIndex', ['vendas' => $vendas]);
    }
    
    public function editarIndex($id)
    {
        $usuarios = DB::table('users')->get();
        
        $produtos = DB::table('produtos')->select('idProduto', 'nome')->get();
        
        
        $vendas = $this->venda->with('usuario', 'produto')->where('idVenda', $id)->get();
        
        return view('samples.VendasEditar', ['vendas' => $vendas], ['usuarios' => $usuarios], compact('produtos'));
    }
    
    public function editar(Request $request, $id)
    {
        $dataForm = $request->all();
        $venda = $this->venda->find($id);
        $update = $venda->update($dataForm);        
        /** faz a verificação para decidir para qual rota direcionar */
        if($update)
        {
            return redirect('/sample/vendas');
        }else{
            return redirect()->route('/sample/vendas/visualizar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }
    }
    
     public function deletar($id)
    {
        $venda = $this->venda->find($id);
        $update = $venda->delete();        
        /** faz a verificação para decidir para qual rota direcionar */
        if($update)
        {
            return redirect('/sample/vendas');
        }else{
            return redirect()->route('/sample/vendas')->with(['errors' => 'Falha ao Deletar']);
        }
    }
}
