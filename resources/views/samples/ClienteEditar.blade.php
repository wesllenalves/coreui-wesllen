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
              @foreach ($clientes as $cliente)
              <form  method="POST" action="{{url("/sample/cliente/editar/{$cliente->id}")}}">
              
                {{ csrf_field() }}
                <input type="hidden"  name="id"  value="{{$cliente->id}}">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="name" id="nome" value="{{$cliente->name}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" value="{{$cliente->cpf}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" value="{{$cliente->telefone}}">
                    </div>

                </div>

                

                <div class="form-group row">
                <div class="col-sm-4">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" id="email" value="{{$cliente->email}}">
                </div>
                <div class="col-sm-5">
                  <label for="endereco">Endereco</label>
                  <input type="text" class="form-control" name="endereco" id="endereco" value="{{$cliente->endereco}}">
                </div>
                <div class="col-sm-3">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" name="cidade" id="cidade" value="{{$cliente->cidade}}">
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-6">
                  <label for="complemento">Complemento</label>
                  <input type="text" class="form-control" name="complemento" id="complemento" value="{{$cliente->complemento}}">
                </div>
                </div>

                <div class="row btn-visualizar">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <a href="/sample/cliente"><button type="button" class="btn btn-warning">Cancelar</button></a>
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