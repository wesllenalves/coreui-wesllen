@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Combined All Table
        </div>
        <div class="card-body">
          <table class="table table-responsive-sm table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Medidas</th>
                <th>Descricao</th>
                <th>Valor Medio</th>
                <th>Gasto Medio</th>
                <th>Lucro Medio</th>
                <th>Tempo de Fabricação</th>
                <th>Categoria</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($produtos as $produto)
                  
              
              <tr>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->medidas}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->valorMedio}}</td>
                <td>{{$produto->gastoMedio}}</td>
                <td>{{$produto->lucroMedio}}</td>
                <td>{{$produto->tempoFabricacao}}</td>
                <td>{{$produto->categoria}}</td>
                <td style="width:25%;">

                    <a href="/sample/produto/visualizar/{{$produto->idProduto}}"><button type="button" class="btn-sm btn-success">Mais Detalhes</button></a>
                    <a href="/sample/produto/produtoEditar/{{$produto->idProduto}}"><button type="button" class="btn-sm btn-primary">Editar</button></a>
                    <a href="/sample/produto/deletar/{{$produto->idProduto}}"><button type="button" class="btn-sm btn-danger">Remover</button></a>
                    
                </td>                
              </tr>
              @endforeach
              
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