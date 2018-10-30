<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class ControllerCliente extends Controller
{
    private $user;

    /* ================================== Metodo de Construtor ================================================== */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /* ======================= Metodo de renderização da VieW com todos os  clientes ============================= */
    public function index() 
    {   
        /** traz todos os dados existente na model*/
        $users = $this->user->all();
        /** retorna a view com todos os dados encontrado */
        return view('samples.ClienteIndex', ['users' => $users]);
    }

    /* ======================= Metodo de renderização da VieW de somente um cliente ============================= */
    public function cliente($id)
    {   
        /**traz somente os dados do id especifico*/
        $clientes = DB::table('users')->where('id', $id)->get();
        /** retorna a view com os dados do usuarios achado */
        return view('samples.ClienteVisualizar', ['clientes' => $clientes]);
    }

    /* ============================ Metodo de renderização da VieW de Editar cliente ========================== */
    public function clienteEditar($id)
    {   
        /**traz somente os dados do id especifico*/
        $clientes = DB::table('users')->where('id', $id)->get();
        /** retorna a view com os dados do usuarios achado */
        return view('samples.ClienteEditar', ['clientes' => $clientes]);
    }

    /* ============================== Metodo de atualização de um cliente ======================================= */
    public function editar(Request $request, $id)
    {   
        /**traz todos os dados vindo do formulario de atualização*/
        $dataForm = $request->all();
        /** retorna para a variavel o usuario especifico do id */
        $user = $this->user->find($id);
        /** realiza o update com os dados do formulario */
        $update = $user->update($dataForm);        
        /** faz a verificação para decidir para qual rota direcionar */
        if($update)
        {
            return redirect('/sample/cliente/visualizar/'.$id);
        }else{
            return redirect()->route('/sample/cliente/clienteEditar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }

    }

    /* ============================== Metodo de Renderização da View de clientes ======================================= */
    public function adicionar(){
        return view('samples.Adicionar-cliente');
    }

    /* ============================== Metodo de Inserção de clientes ======================================= */
    public function adicionarCliente(Request $request){
        /** recuperando os dados vindo do formulario e ignorando o campo de token */
       $dataFrom = $request->except('_token');
       /** mensagens de possiveis erros */
       $messages = [
           'name.required' => 'O campo nome é de preenchimento obrigatorio.',
           'name.min' => 'O campo nome é de preenchimento de pelo menos 3 caracteres.',
           'name.max' => 'O campo nome é de preenchimento de no maximo 100 caracteres.',
           'cpf.required' => 'O campo cpf é de preenchimento obrigatorio.',
           'cpf.numeric' => 'O campo cpf deve ser preenchido somente com numeros.',
           'cpf.min' => 'O campo cpf deve ter no minimo 11 numeros.',
           'cpf.max' => 'O campo cpf deve ter no maximo 11 numeros.',
           'telefone.required' => 'O campo telefone é de preenchimento obrigatorio.',
           'telefone.numeric' => 'O campo telefone é de preenchimento somente com  numeros.',
           'telefone.min' => 'O campo telefone deve possuir no minimo 11 numeros.',
           'telefone.max' => 'O campo telefone deve possuir no maximo 11 numeros.',
           'email.required' => 'O campo email é de preenchimento obrigatorio.',
           'endereco.required' => 'O campo endereco é de preenchimento obrigatorio.',
           'complemento.required' => 'O campo complemento é de preenchimento obrigatorio.',
       ];
       /**usando help para fazer a validação, trazendo as regras da model USER */
       $this->validate($request, $this->user->rules, $messages);
       /** inserindo os dados do formulario no banco */
       $insert = User::create($dataFrom);
       /** faz a verificação para decidir para qual rota direcionar */
       if($insert)
       {
             return redirect('/sample/cliente');
       }else{
             return redirect('/sample/cliente/adicionar');
       }
    }

    /* ============================== Metodo de Delete de clientes ======================================= */
    public function deletar($id){
        /** recupera os dados do id especifico */
        $user = $this->user->find($id);
        /** realiza a remoção dos dados do cliente achado */
        $delete =  $user->delete();
        /** faz a verificação para decidir para qual rota direcionar */
        if($delete)
        {
                return redirect('/sample/cliente');
        }else{
                return redirect('/sample/cliente');
        }
    }
}
