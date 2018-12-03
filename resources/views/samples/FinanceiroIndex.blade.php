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
          <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"><button class="btn btn-primary">
          Relatorio PDF</button></a>



          <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Selecione o intervalo de datas</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body mx-2">
                  <form action="{{url('/sample/filtro/relatorio')}}" method="POST" >
                    <div class="md-form mb-2">
                    
                    {!! csrf_field() !!}
                      <i class="fa fa-user prefix grey-text"></i>
                      <label data-error="wrong" data-success="right" for="form34">Data Inicial</label>
                      <input type="date" class="form-control validate" name="dataInicial">                    
                    </div>

                    <div class="md-form mb-5">
                      <i class="fa fa-envelope prefix grey-text"></i>
                      <label data-error="wrong" data-success="right" for="form29">Data Final</label>
                      <input type="date" class="form-control validate" name="dataFinal">                    
                    </div>
                    
                  </div>
                <div class="modal-footer d-flex justify-content-center">
                  <button type="submit" class="btn btn-unique">Gerar Relatorio <i class="fa fa-paper-plane-o ml-1"></i></button>
                </div>
                </form>
              </div>
            </div>
          </div>

<div class="text-center">
  
</div>



          </nav>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection