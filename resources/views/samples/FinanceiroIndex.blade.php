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
                    <a href="#/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-danger">Remover</button></a>
                    
                </td>                
              </tr>
              
              @endforeach
            </tbody>
          </table>
        </div>
          
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