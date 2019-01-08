<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\User;
use File;
use App\Projetos;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class ControllerConfiguracoes extends Controller
{
    public function usuarios()
    {
        $usuarios               = User::all();
        return view('samples.ConfiguracoesUsuario', ['usuarios' => $usuarios]);
    }

    public function imgPrincipal()
    {
        $projetos               = Projetos::where('status', '=', 'principal')->get();
        return view('samples.ConfiguracoesImgPrincipal', ['projetos' => $projetos]);
    }

    public function upload(Request $request)
    {
        $projetos               = new Projetos;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $imagem             = $request->file('image');
            $ImageName          = $imagem->getClientOriginalName();
            
            $extenstion         = $imagem->getClientOriginalExtension();
            
            if($extenstion != 'jpg'  && $extenstion != 'jpeg' && $extenstion != 'png')
            {
                    return redirect('/sample/img/principal')
                    ->withErrors(['valide'=>'Formato de imagem invalido. Os formatos suportados são: JPG JPEG PNG']);
            }

           //$caminho = File::move($imagemRed, public_path().'/storage/principal/'.$ImageName);
           $save_path           = public_path().'/storage/principal/';
           
            

           if (!file_exists($save_path)) {
            mkdir($save_path, 666, true);
        }



           $img                 = Image::make(
                            $request->file('image'))
                            ->resize(464, 660)
                            ->save($save_path.$ImageName
                                );
           // dd($img);
          
                                // $caminho = File::move($img, );

           $projetos->titulo    = 'teste';
           $projetos->status    = 'principal';
           $projetos->imagem    = $ImageName;
           $insert              = $projetos->save();

           if($insert){
            return redirect('/sample/img/principal')->with('mensagem', 'Upload da imagem realizado com sucesso');
           }
        }
    }

    public function imgEditar(Request $request, $id)
    {
        $projetos               = new Projetos;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $imagem             = $request->file('image');$name = $request->file('image');
            $ImageName          = $imagem->getClientOriginalName();
            $extenstion         = $imagem->getClientOriginalExtension();
            
            if($extenstion != 'jpg'  && $extenstion != 'jpeg' && $extenstion != 'png')
            {
                return back()->withErrors(['valide'=>'Formato de imagem invalido. Os formatos suportados são: JPG JPEG PNG']);
            }

            $img                = Projetos::find($id);
            
            $status             = unlink('storage/principal/'.$img->imagem);

            Image::make(
                                $request->file('image'))
                                ->resize(464, 660)
                                ->save(public_path().'/storage/principal/'.$ImageName
                                );

            
            $dados = [
                'titulo' => 'teste de update',
                'imagem' => $ImageName                
            ];

            $update             = $img->update($dados);

            return back()
                    ->with('mensagem', 'Sucesso: Imagem editada com sucesso');
        }
    }

    public function imgDeletar($id)
    {
        // Recupera o nome da imagen pelo seu id
        if ( !$imgens = Projetos::find($id) )
        return redirect()->back();

        // Deleta o registro do usuário
    if ( $imgens->delete() ) {
        // Deleta a imagem (Não esqueça: use Illuminate\Support\Facades\Storage;)
        $path_deletar           = "principal/{$imgens->imagem}";
        $deleta                 = Storage::delete($path_deletar); // true ou falses
        // Redireciona, informando que deu tudo certo!
        return redirect('/sample/img/principal')
        ->with('mensagem', 'Sucesso imagem deletada!');
    }
        // Em caso de falhas redireciona o usuário de vola e informa que não foi possível deletar
        return back()
        ->withErrors(['valide'=>'Não foi possivel deletar a imagem']);;
    }
}
