<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class ControllerCliente extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index() 
    {
        $users = $this->user->all();
        return view('samples.ClienteIndex', ['users' => $users]);
    }

    public function cliente($id)
    {
        $clientes = DB::table('users')->where('id', $id)->get();

        return view('samples.ClienteVisualizar', ['clientes' => $clientes]);
    }

    public function clienteEditar($id)
    {
        
        $clientes = DB::table('users')->where('id', $id)->get();

        return view('samples.ClienteEditar', ['clientes' => $clientes]);

    }

    public function editar(Request $request, $id)
    {
        $dataForm = $request->all();      

        $user = $this->user->find($id);
        $update = $user->update($dataForm);        

        if($update)
        {
            return redirect('/sample/cliente/visualizar/'.$id);
        }else{
            return redirect()->route('/sample/cliente/clienteEditar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }

    }

    public function adicionar(){
        return view('samples.Adicionar-cliente');
    }

    public function adicionarCliente(Request $request){
       $dataFrom = $request->except('_token');
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
       $this->validate($request, $this->user->rules, $messages);

       $insert = User::create($dataFrom);
       
       if($insert)
       {
             return redirect('/sample/cliente');
       }else{
             return redirect('/sample/cliente/adicionar');
       }
    }

    public function deletar($id){

        $user = $this->user->find($id);
       $delete =  $user->delete();
       
       if($delete)
       {
             return redirect('/sample/cliente');
       }else{
             return redirect('/sample/cliente');
       }
    }
}
