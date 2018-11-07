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
          <div id="dtHorizontalExample">
          <table  class="table table-responsive table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Produto</th>
                <th>Data de Entrega</th>
                <th>Unidades</th>
                <th>Valor Total</th>
                <th>Desconto</th>
                <th>Gasto</th>
                <th>taxa de Entrega</th>
                <th>Taxa Adicional</th>
                <th>Status de Venda</th>
                <th>Entrada</th>
                <th>Descricao</th>
                <th>Medidas</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vendas as $venda)
                  
              
              <tr>
                <td>{{$venda->usuario->name}}</td>
                <td>{{$venda->produto->nome}}</td>                
                <td>{{$venda->dataEntrega}}</td>
                <td>{{$venda->qtd}}</td>
                <td>{{$venda->valorTotal}}</td>
                <td>{{$venda->desconto}}</td>
                <td>{{$venda->gasto}}</td>
                <td>{{$venda->taxaEntrega}}</td>
                <td>{{$venda->taxaAdd}}</td>
                <td>{{$venda->statusVenda}}</td>
                <td>{{$venda->entrada}}</td>
                <td>{{$venda->descricao}}</td>
                <td>{{$venda->medidas}}</td>
                <td style="width:25%;">

                    <a href="/sample/cliente/visualizar/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-success">Mais Detalhes</button></a>
                    <a href="/sample/cliente/clienteEditar/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-primary">Editar</button></a>
                    <a href="/sample/cliente/deletar/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-danger">Remover</button></a>
                    
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