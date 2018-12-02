@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Financeiro
          
        </div>
        <div class="card-body">
        <form action="{{url('/sample/filtro/financeiro')}}" method="POST" class="form form-inline"> 
        <div class="form-group">
        {!! csrf_field() !!}           
            <input type="text" class="form-control col-sm-1" name="id" placeholder="ID">&nbsp;&nbsp;
            <input type="date" class="form-control col-sm-4" name="dataInicial" placeholder="Data Inicial">&nbsp;&nbsp;
            <input type="date" class="form-control col-sm-4" name="dataFinal" placeholder="Data Inicial">&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
        </form><br>
          <div id="dtHorizontalExample">
          <table  class="table table-responsive table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Produto</th>                
                
                                
                <th>Data da Entrega</th>
                <th>Status</th>
                <th>Gastos</th>
                <th>Valor Total</th>
                
                <th></th>
              </tr>
            </thead>
            <tbody>
              
            @foreach ($vendas as $venda)  
              
              <tr>
                
                <td>{{$venda->idVenda}}</td>
                <td>{{$venda->usuario->name}}</td>
                <td>{{$venda->produto->nome}}</td>               
                
                <td>{{$venda->dataEntrega}}</td>
                <td>{{$venda->statusVenda}}</td>
                <td>{{$venda->gasto}}</td>
                <td>{{$venda->valorTotal}}</td>
                
                <td style="width:25%;">
                    <a href="#/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-primary">Editar</button></a>
                </td>                
              </tr>
              
              @endforeach
            </tbody>
          </table>
        </div>
          
          <nav>
              {!! $vendas->render("pagination::bootstrap-4") !!}
          </nav>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection