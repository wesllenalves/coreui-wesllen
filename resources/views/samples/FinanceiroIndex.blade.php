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
        <div class="col-md-12 form-filtro">
        <form action="{{url('/sample/filtro/financeiro')}}" method="POST" > 
        <div class="form-group">
        {!! csrf_field() !!} 
            <label for="id" class="text-label">ID</label>        
            <input type="text" class="form-control-sm col-sm-1" name="id">
            <label for="id" class="text-label">Data Inicial</label>
            <input type="date" class="form-control-sm col-sm-3" name="dataInicial">
            <label for="id" class="text-label">Data Final</label>
            <input type="date" class="form-control-sm col-sm-3" name="dataFinal" >
            <label for="id" class="text-label">Valor Total</label>
            <input type="text" class="form-control-sm col-sm-1" name="valorTotal" >
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
        </form><br>
        </div>
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
              <?php $array=[];?>
            @foreach ($vendas as $venda)  
              
              <tr>
              <?php $array=[$venda];?>
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
          @if(isset($dataForm))
              {!! $vendas->appends($dataForm)->links("pagination::bootstrap-4") !!}
          @else
              {!! $vendas->links("pagination::bootstrap-4") !!}
          @endif
          <a href="/sample/filtro/relatorio"><button  class="btn btn-primary">Relatorio PDF</button></>
          </nav>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection