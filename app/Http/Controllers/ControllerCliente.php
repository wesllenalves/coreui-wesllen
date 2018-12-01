<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\ClienteFormRequest;


class ControllerCliente extends Controller
{
    private $user;
    private $totalPage = 5;

    /* ================================== Metodo de Construtor ================================================== */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /* ======================= Metodo de renderização da VieW com todos os  clientes ============================= */
    public function index() 
    {   
        /** traz todos os dados existente na model*/
        $users = $this->user->where('perfil', 'Cliente')->paginate($this->totalPage);
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
    public function adicionarCliente(ClienteFormRequest $request){
        /** recuperando os dados vindo do formulario e ignorando o campo de token */
       $dataFrom = $request->except('_token');
      
       
       /**usando help para fazer a validação, trazendo as regras da model USER */
       //$this->validate($request, $this->user->rules, $messages);
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
