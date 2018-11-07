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
         
          <form method="POST" action="{{url("/sample/relatorio/pesquisar")}}">
            {{ csrf_field() }}
            <div class="form-group row ">
            <div class="col-sm-4 offset-sm-4">
            <label for="">Informe o Mês</label>
            <select class="form-control" name="mes">
              <option value="1">Janeiro</option>
              <option value="2">Fevereiro</option>
              <option value="3">Março</option>
              <option value="4">Abril</option>
              <option value="5">Maio</option>
              <option value="6">Junho</option>
              <option value="7">Julho</option>
              <option value="8">Agosto</option>
              <option value="9">Setembro</option>
              <option value="10">Outubro</option>
              <option value="11">Novembro</option>
              <option value="12">Dezembro</option>
            </select>
            <label for="">Digite o Ano</label>
            <input class="form-control" type="number" name="ano"/>
            </div>
            </div>
            <div class="form-group row ">
            <div class="col-md-2 offset-md-10">  
            <input class="btn btn-primary" type="submit" value="Pesquisar"/>
            <div>
            </div>
            
          </form>
          
          
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection