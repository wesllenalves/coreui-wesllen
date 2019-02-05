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
        <div class="col-md-12 form-filtro">
        <form action="{{url('/sample/filtro/venda')}}" method="POST" > 
        <div class="form-group">
        {!! csrf_field() !!} 
            <label for="id" class="text-label">ID</label>        
            <input type="text" class="form-control-sm col-sm-1" name="id">
            <label for="id" class="text-label">Data Inicial</label>
            <input type="date" class="form-control-sm col-sm-3" name="dataInicial">
            <label for="id" class="text-label">Data Final</label>
            <input type="date" class="form-control-sm col-sm-3" name="dataFinal" >
            <label for="id" class="text-label">Status</label>
            <select name="statusVenda" id="statusVenda" class="form-control-sm col-sm-3" >                
                <option value="Em aberto">Em aberto</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Fechado">Fechado</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Cancelado e estornado">Cancelado e estornado</option>
                <option value="/sample/vendas" id="todos">Todas</option>
            </select>
            <button type="submit" class="btn-sm btn-primary">Pesquisar</button>
        </div>
        </form><br>
        </div>
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
                
                <td>
                  @if(isset ($venda->produtos))
                  @foreach ($venda->produtos as $produto) 
                    <button type="button" class="btn btn-danger btn-sm" aria-disabled="true" disabled>{{$produto->nome}}</button>
                  
                  @endforeach
                  @endif
                </td>
               
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
          @if(isset($dataForm))
              {!! $vendas->appends($dataForm)->links("pagination::bootstrap-4") !!}
          @else
              {!! $vendas->links("pagination::bootstrap-4") !!}
          @endif
          </nav>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection