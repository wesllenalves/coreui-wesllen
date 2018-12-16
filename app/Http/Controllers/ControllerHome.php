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
    
    
 
    public function home(Request $request)
    {   
       /*$dataForm = [1,2];
        $vendas = Venda::find(1);
        echo "<b>".$vendas->usuario->name."</b><br>";
        $criar =  $vendas->produtos()->sync($dataForm);
        
        $produtos = $vendas->produtos;
        foreach ($produtos as $produto) {
            echo " {$produto->nome}, ";
        }*/ 
        //retorna as imagens da galeria
        $galerias = Projetos::where('status', '=', 'galeria')->get()->toArray();
        $principais = Projetos::where('status', '=', 'principal')->get();
        $produtos = Produto::all();
        return view('home', [
            'galerias' => $galerias,
            'produtos' => $produtos,
            'principais' => $principais
        ]);
    }
 
    public function orcamento(Request $request)
    {  
        //Faz o cadastro do usuario retornando o id do usuario cadastrado
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

        //faz o cadastro da venda retornando id do cadastro realizado
        $venda = new Venda;
        $venda->FKUsers = $id;
        $venda->descricao = $request->descricao;        
        $updateVenda = $venda->save();
        $id = $venda->idVenda;

        //faz o cadastro na tabela pivo produtos_vendas
        $vendas = Venda::find($id);
        $insertPivot = $vendas->produtos()->sync($request->FKProdutos);

        //se tudo ocorrer bem retorna para a rotar trazendo um mensagem de sucesso caso contratio
        //retorn mensagem de error
        if($updateUsuario && $updateVenda && $insertPivot)
        {
            return redirect('/#orcamento')->with(['success' => 'Parabéns Seu pedido foi feito. Logo entraremos em contato']);
        }else{
            return redirect()->route('/#orcamento')->with(['errors' => 'Falha ao inserir orcamento']);
        }
    }
}
