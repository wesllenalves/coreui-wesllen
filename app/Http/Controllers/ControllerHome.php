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
    
    public function home(Request $request)
    {   
       
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
        //instancia a variaveis com os arrays vindo do formulario
        $produtos = $request->idProduto;
        $quantidade = $request->qtdProduto;
        $valores = $request->valorProduto;

        //Faz o cadastro do usuario retornando o id do usuario cadastrado
        $data =   date('Y-m-d H:i');
        $senha = md5($data);
        $usuarios = new User;
        $usuarios->name = $request->name;
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
        $venda->valorTotal = $request->valorTotal;        
        $updateVenda = $venda->save();
        $id = $venda->idVenda;
        
        //faz o cadastro na tabela pivo produtos_vendas
        $vendas = Venda::find($id);

        //instancia uma variavel de array vazia
        $attributes = [];   
        //percorer os arrays com um laco de repetição 
        foreach($produtos as  $index => $produ)
        {
            // cria o array com indice da tabela
            $attributes = [
               'id_produto' => $produ,
               'qtd' => $quantidade[$index],
               'valor' => $valores[$index]
            ];

            //grava os produtos na tabela pivo
            $produto = $venda->produtos()->attach([$id => $attributes]);            
        }
         
        //se tudo ocorrer bem retorna para a rotar trazendo um mensagem de sucesso caso contratio
        //retorn mensagem de error
        if($updateUsuario && $updateVenda)
        {
            return redirect('/#orcamento')->with(['success' => 'Parabéns Seu pedido foi feito. Logo entraremos em contato']);
        }else{
            return redirect()->route('/#orcamento')->with(['error' => 'Falha ao inserir orcamento']);
        }
    }
}