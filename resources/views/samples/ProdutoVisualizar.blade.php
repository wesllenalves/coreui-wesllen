@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>Detalhes</strong>
                <small>Cliente</small>
              </div>
              <div class="card-body">
              @foreach ($produtos as $produto)
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{$produto->nome}}" disabled>
                    </div>
                    <div class="col-sm-3">
                        <label for="medidas">Medidas</label>
                        <input type="text" class="form-control" name="medidas" id="medidas" value="{{$produto->medidas}}" disabled>
                    </div>
                    <div class="col-sm-3">
                        <label for="descricao">Descricao</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{{$produto->descricao}}" disabled>
                    </div>

                </div>

                

                <div class="form-group row">
                <div class="col-sm-4">
                  <label for="valorMedio">Valor Medio</label>
                  <input type="text" class="form-control" name="valorMedio" id="valorMedio" value="{{$produto->valorMedio}}" disabled>
                </div>
                <div class="col-sm-5">
                  <label for="gastoMedio">Gasto Medio</label>
                  <input type="text" class="form-control" name="gastoMedio" id="gastoMedio" value="{{$produto->gastoMedio}}" disabled>
                </div>
                <div class="col-sm-3">
                  <label for="lucroMedio">lucro Medio</label>
                  <input type="text" class="form-control" name="lucroMedio" id="lucroMedio" value="{{$produto->lucroMedio}}" disabled>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-6">
                  <label for="tempoFabricacao">Tempo de fabricação</label>
                  <input type="text" class="form-control" name="tempoFabricacao" id="tempoFabricacao" value="{{$produto->tempoFabricacao}}" disabled>
                </div>
                <div class="col-sm-6">
                  <label for="categoria">Categoria</label>
                  <input type="text" class="form-control" name="categoria" id="categoria" value="{{$produto->categoria}}" disabled>
                </div>
                </div>

                <div class="row btn-visualizar">
                  <a href="/sample/produto/produtoEditar/{{$produto->idProduto}}"><button type="button" class="btn btn-primary">Editar</button></a>
                  <a href="/sample/produto"><button type="button" class="btn btn-warning">Voltar</button></a>
                </div>
                <!--/.row-->
                @endforeach
              
              </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection