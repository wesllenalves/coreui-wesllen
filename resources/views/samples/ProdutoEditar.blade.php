@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>Detalhes</strong>
                <small>Produto</small>
              </div>
              <div class="card-body">
              @foreach ($produtos as $produto)
              <form  method="POST" action="{{url("/sample/produto/editar/{$produto->idProduto}")}}">
              
                {{ csrf_field() }}
               
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{$produto->nome}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="medidas">Medidas</label>
                        <input type="text" class="form-control" name="medidas" id="medidas" value="{{$produto->medidas}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="descricao">Descricao</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{{$produto->descricao}}">
                    </div>

                </div>

                

                <div class="form-group row">
                <div class="col-sm-4">
                  <label for="valorMedio">Valor Medio</label>
                  <input type="text" class="form-control" name="valorMedio" id="valorMedio" value="{{$produto->valorMedio}}">
                </div>
                <div class="col-sm-5">
                  <label for="gastoMedio">Gasto Medio</label>
                  <input type="text" class="form-control" name="gastoMedio" id="gastoMedio" value="{{$produto->gastoMedio}}">
                </div>
                <div class="col-sm-3">
                  <label for="lucroMedio">Lucro Medio</label>
                  <input type="text" class="form-control" name="lucroMedio" id="lucroMedio" value="{{$produto->lucroMedio}}">
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-6">
                  <label for="tempoFabricacao">Tempo de Fabricacao</label>
                  <input type="text" class="form-control" name="tempoFabricacao" id="tempoFabricacao" value="{{$produto->tempoFabricacao}}">
                </div>
                </div>

                <div class="row btn-visualizar">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <a href="/sample/produto"><button type="button" class="btn btn-warning">Cancelar</button></a>
                </div>
                <!--/.row-->
                @endforeach
              </form>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection