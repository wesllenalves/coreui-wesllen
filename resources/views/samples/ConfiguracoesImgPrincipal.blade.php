@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Configurações Imagem principal
        </div>
        <div class="card-body">
        @include('core.alerts')
        <div class="formulario-imagem">
        <form method="POST" enctype="multipart/form-data" action='{{url("/sample/img/upload")}}'>
        {{ csrf_field() }}
        <div class="form-group row">            
            <div class="col-md-4">
            <label  for="file-multiple-input">Seleciona as imagens</label> <br>
            <span>Selecione imagens de preferencias com tamanho de 464  X660</span>
              <input class="form-control" type="file" id="file-multiple-input" name="image" multiple="Procurar">
            </div>
        </div>
        <div class="form-group row">
            <div class="row btn-visualizar">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="reset" class="btn btn-warning">Limpar</button>
            </div>
        </div>
        </form>
        </div>
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Foto</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              
                  
            @foreach( $projetos as $projeto)
              <tr>
                
                <td style=""><img src='{{ asset("storage/principal/{$projeto->imagem}")}}' style="width: 20%; margin-left: auto;
    margin-right: auto;"></td>
                <td style="width:25%;">                    
                    <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#ModalEditarImg">Editar</button>
                    <a href="/sample/img/editar/{{$projeto->id}}"><button type="button" class="btn-sm btn-danger">Remover</button></a>                    

                    <!-- Modal -->
                    <div class="modal fade" id="ModalEditarImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Imagem</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action='{{url("/sample/img/editar/{$projeto->id}")}}'>
                            {{ csrf_field() }}
                            <div class="form-group row">            
                                <div class="col-md-12">
                                <label  for="file-multiple-input">Selecionar a imagem</label>
                                  <input class="form-control" type="file" id="file-multiple-input" name="image" multiple="Procurar">
                                </div>
                            </div>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>  
                             
              </tr>
              @endforeach 
              
            </tbody>
          </table> 
          
          
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection