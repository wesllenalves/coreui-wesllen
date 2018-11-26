<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use App\Projetos;

class ControllerConfiguracoes extends Controller
{
    public function usuarios()
    {
        $usuarios = User::all();
        return view('samples.ConfiguracoesUsuario', ['usuarios' => $usuarios]);
    }

    public function imgPrincipal()
    {
        return view('samples.ConfiguracoesImgPrincipal');
    }

    public function upload(Request $request)
    {
        $projetos = new Projetos;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $imagem = $request->file('image');
            $name = $request->file('image');
            $ImageName =  $name->getClientOriginalName();
            //($name);
            $extenstion = $imagem->getClientOriginalExtension();
            
            if($extenstion != 'jpg' && $extenstion != 'png')
            {
                return back()->with('erro', 'Erro: Este arquivo não é uma imagem');
            }
           $caminho = File::move($imagem, public_path().'/storage/principal/'.$ImageName);
           
           $projetos->titulo = 'teste';
           $projetos->preco = '00.00';
           $projetos->status = 'principal';
           $projetos->imagem =  '/storage/principal/'.$ImageName;
           $upload = $projetos->save();

           if($upload){
            return redirect('/sample/img/principal');
           }
        }
    }
}
