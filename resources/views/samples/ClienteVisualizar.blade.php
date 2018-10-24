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
                
               
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" value="{{$cliente->name}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" value="{{$cliente->cpf}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" value="{{$cliente->telefone}}">
                    </div>

                </div>

                

                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" value="">
                </div>

                <div class="form-group">
                  <label for="street">Street</label>
                  <input type="text" class="form-control" id="street" placeholder="Enter street name">
                </div>

                <div class="row">

                  <div class="form-group col-sm-8">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" placeholder="Enter your city">
                  </div>

                  <div class="form-group col-sm-4">
                    <label for="postal-code">Postal Code</label>
                    <input type="text" class="form-control" id="postal-code" placeholder="Postal Code">
                  </div>

                </div>
                <!--/.row-->

                <div class="form-group">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" id="country" placeholder="Country name">
                </div>

                @endforeach
                
              </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection