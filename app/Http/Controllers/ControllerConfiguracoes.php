<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use App\Projetos;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ControllerConfiguracoes extends Controller
{
    public function usuarios()
    {
        $usuarios = User::all();
        return view('samples.ConfiguracoesUsuario', ['usuarios' => $usuarios]);
    }

    public function imgPrincipal()
    {
        $projetos = Projetos::where('status', '=', 'principal')->get();
        return view('samples.ConfiguracoesImgPrincipal', ['projetos' => $projetos]);
    }

    public function upload(Request $request)
    {
        $projetos = new Projetos;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $imagem = $request->file('image');
            $ImageName =  $imagem->getClientOriginalName();
            
            $extenstion = $imagem->getClientOriginalExtension();
            
            if($extenstion != 'jpg' && $extenstion != 'png')
            {
                return back()->with('erro', 'Erro: Este arquivo não é uma imagem');
            }

           //$caminho = File::move($imagemRed, public_path().'/storage/principal/'.$ImageName);
           $save_path= public_path().'/storage/principal/';
           
            

           if (!file_exists($save_path)) {
            mkdir($save_path, 666, true);
        }



           $img = Image::make(
                            $request->file('image'))
                            ->resize(464, 660)
                            ->save($save_path.$ImageName
                                );
           // dd($img);
          
                                // $caminho = File::move($img, );

           $projetos->titulo = 'teste';
           $projetos->status = 'principal';
           $projetos->imagem =  $ImageName;
           $insert = $projetos->save();

           if($insert){
            return redirect('/sample/img/principal');
           }
        }
    }

    public function imgEditar(Request $request, $id)
    {
        $projetos = new Projetos;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $imagem = $request->file('image');$name = $request->file('image');
            $ImageName =  $imagem->getClientOriginalName();
            $extenstion = $imagem->getClientOriginalExtension();
            
            if($extenstion != 'jpg' && $extenstion != 'png')
            {
                return back()->with('erro', 'Erro: Este arquivo não é uma imagem');
            }

            $img = Projetos::find($id);
            
            $status = unlink('storage/principal/'.$img->imagem);

            Image::make(
                                $request->file('image'))
                                ->resize(464, 660)
                                ->save(public_path().'/storage/principal/'.$ImageName
                                );

            
            $dados = [
                'titulo' => 'teste de update',
                'imagem' => $ImageName                
            ];

            $update = $img->update($dados);

            return back()->with('success', 'Sucesso: Imagem editada com sucesso');
        }
    }
}
