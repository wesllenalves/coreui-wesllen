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
