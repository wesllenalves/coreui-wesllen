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
        <form method="POST" enctype="multipart/form-data" action='{{url("/sample/img/upload")}}'>
        {{ csrf_field() }}
        <div class="form-group row">            
            <div class="col-md-4">
            <label  for="file-multiple-input">Seleciona as imagens</label>
              <input class="form-control" type="file" id="file-multiple-input" name="image" multiple="Procurar">
            </div>
        </div>
        <div class="form-group row">
            <div class="row btn-visualizar">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <a href="/sample/cliente"><button type="button" class="btn btn-warning">Cancelar</button></a>
            </div>
        </div>
        </form>

        <table class="table table-responsive-sm table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Foto</th>
                <th>Caminho</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              
                  
              
              <tr>
                <td></td>
                <td></td>
                <td style="width:25%;">                    
                    <a href="/sample/cliente/clienteEditar/"><button type="button" class="btn-sm btn-primary">Editar</button></a>
                    <a href="/sample/cliente/deletar/"><button type="button" class="btn-sm btn-danger">Remover</button></a>                    
                </td>                
              </tr>
              
              
            </tbody>
          </table> 
          
          <nav>
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Prev</a></li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection