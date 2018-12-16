@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Orçamentos
        </div>
        <div class="card-body">
          <div id="dtHorizontalExample">
          <table  class="table table-responsive table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Produto</th>                
                <th>Unidades</th>
                <th>Status</th>                
                <th>Descricao</th>
                <th>Medidas</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              
            @foreach ($vendas as $venda)  
              
              <tr>
                
                
                <td>{{$venda->usuario->name}}</td>
                <td>
                @if(isset ($venda->produtos))
                  @foreach ($venda->produtos as $produto) 
                    <button type="button" class="btn btn-danger btn-sm" aria-disabled="true" disabled>{{$produto->nome}}</button>
                  @endforeach
                @endif
                </td>
                <td>{{$venda->qtd}}</td>
                <td>{{$venda->statusVenda}}</td>
                <td>{{$venda->descricao}}</td>
                <td>{{$venda->medidas}}</td>
                <td style="width:25%;">

                    <a href="/sample/orcamento/visualizar/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-success">Mais Detalhes</button></a>
                    <a href="/sample/orcamento/editar/{{$venda->idVenda}}"><button type="button" class="btn-sm btn-primary">Editar</button></a>
                                        
                </td>                
              </tr>
              
              @endforeach
            </tbody>
          </table>
        </div>
          
          <nav>
              
          </nav>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection