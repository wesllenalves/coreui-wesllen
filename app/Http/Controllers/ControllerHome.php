<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Projetos;
use App\Produto;
use App\User;
use App\Venda;
use Faker\Provider\zh_CN\DateTime;

class ControllerHome extends Controller
{
    //
    
    public function home()
    {
        $projetos = Projetos::all();
        $produtos = Produto::all();
        return view('home', ['projetos' => $projetos, 'produtos' => $produtos]);
    }
 
    public function orcamento(Request $request)
    {
        
        $data =   date('Y-m-d H:i');
        $senha = md5($data);
        $usuarios = new User;
        $usuarios->name = $request->name;
        $usuarios->cpf = $request->cpf;
        $usuarios->telefone = $request->telefone;
        $usuarios->email = $request->email;
        $usuarios->endereco = $request->endereco;
        $usuarios->cidade = $request->cidade;
        $usuarios->complemento = $request->complemento;
        $usuarios->password = $senha;
        $updateUsuario = $usuarios->save();
        $id =$usuarios->id;

        $venda = new Venda;
        $venda->FKUsers = $id;
        $venda->FKProdutos = $request->FKProdutos;
        $venda->descricao = $request->descricao;
        $updateVenda = $venda->save();

        if($updateUsuario)
        {
            return redirect('/#orcamento');
        }else{
            return redirect()->route('/#orcamento')->with(['errors' => 'Falha ao inserir orcamento']);
        }
    }
}
