<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produto;

class ControllerProduto extends Controller
{   
    private $produto;
    private $totalPage = 5;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(){
        $produtos = $this->produto->paginate($this->totalPage);
        return view('samples.ProdutoIndex', ['produtos' => $produtos]);
    }

    public function produto($id){

        $produtos = DB::table('produtos')->where('idProduto', $id)->get();
         
        return view('samples.ProdutoVisualizar', ['produtos' => $produtos]);
    }

    public function produtoEditar($id)
    {
        
        $produtos = DB::table('produtos')->where('idProduto', $id)->get();

        return view('samples.ProdutoEditar', ['produtos' => $produtos]);

    }

    public function editar(Request $request, $id)
    {
        
        $dataForm = $request->all();      

        $produto = $this->produto->find($id);
       
        $update = $produto->update($dataForm);        
        
        if($update)
        {
            return redirect('/sample/produto/visualizar/'.$id);
        }else{
            return redirect()->route('/sample/produto/produtoEditar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }

    }
    
    public function adicionar(){
        
        return view('samples.Adicionar-produto');
    }

    public function adicionarProduto(Request $request){
        $dataFrom = $request->except('_token');
    
        $insert = Produto::create($dataFrom);
        
        if($insert)
        {
              return redirect('/sample/produto');
        }else{
              return redirect('/sample/produto/adicionar');
        }
     }

    public function deletar($id){

        $produto = $this->produto->find($id);
       $delete =  $produto->delete();
       
       if($delete)
       {
             return redirect('/sample/produto');
       }else{
             return redirect('/sample/produto');
       }
    }
}
