@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Vendas
        </div>
        <div class="card-body">
          <div id="dtHorizontalExample">
          <table  class="table table-responsive table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Produto</th>                
                <th>Valor Total</th>
                <th>Status</th>                
                <th>Data da Entrega</th>
                
                <th></th>
              </tr>
            </thead>
            <tbody>
              
            @foreach ($vendas as $venda)  
              
              <tr>
                
                
                <td>{{$venda->usuario->name}}</td>
                <td>{{$venda->produto->nome}}</td>
                <td>{{$venda->valorTotal}}</td>
                <td>{{$venda->statusVenda}}</td>
                <td>{{$venda->dataEntrega}}</td>
                
                <td style="width:25%;">

                    
                    <a href="/sample/vendas/visualizar/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-primary">Editar</button></a>
                    <a href="/sample/vendas/deletar/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-danger">Remover</button></a>
                    
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