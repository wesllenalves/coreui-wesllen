@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>Adicionar</strong>
                <small>Produto</small>
              </div>
              <div class="card-body">
              
              <form  method="POST" action="{{url("/sample/produto/adicionarProduto")}}">
              
                {{ csrf_field() }}                
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="nome" value="">
                    </div>
                    <div class="col-sm-3">
                        <label for="medidas">Medidas</label>
                        <input type="text" class="form-control" name="medidas" id="medidas" value="">
                    </div>
                    <div class="col-sm-3">
                        <label for="descricao">Descricao</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="">
                    </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-4">
                  <label for="valorMedio">Valor Medio</label>
                  <input type="text" class="form-control" name="valorMedio" id="valorMedio" value="">
                </div>
                <div class="col-sm-5">
                  <label for="GastoMedio">Gasto Medio</label>
                  <input type="text" class="form-control" name="GastoMedio" id="GastoMedio" value="">
                </div>
                <div class="col-sm-3">
                  <label for="lucroMedio">Lucro Medio</label>
                  <input type="text" class="form-control" name="lucroMedio" id="lucroMedio" value="">
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-6">
                  <label for="tempoFabricacao">Tempo de Fabricação</label>
                  <input type="text" class="form-control" name="tempoFabricacao" id="tempoFabricacao" value="">
                </div>
                </div>

                <div class="row btn-visualizar">
                  <button type="submit" class="btn btn-primary">Adicionar</button>
                  <a href="/sample/produto"><button type="button" class="btn btn-warning">Cancelar</button></a>
                </div>
                <!--/.row-->
                
              </form>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection