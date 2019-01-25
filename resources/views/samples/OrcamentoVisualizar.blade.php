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
              @foreach ($vendas as $venda)

                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for="name">Nome do Cliente</label>
                    <input type="text" class="form-control" name="nome" id="name" value="{{$venda->usuario->name}}" disabled>
                    </div>
                    <div class="col-sm-5">
                        <label for="nome">Nome do Produto</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="@foreach ($venda->produtos as $produto) {{$produto->nome}} @endforeach" disabled>
                    </div>
                    <div class="col-sm-2">
                        <label for="qtd">Quantidade</label>
                        <input type="text" class="form-control" name="qtd" id="qtd" value="{{$venda->qtd}}" disabled>
                    </div>
                </div>
                

                <div class="form-group row">
                <div class="col-sm-2">
                  <label for="dataEntrega">Data de Entrega</label>
                  <input type="text" class="form-control" name="dataEntrega" id="dataEntrega" value="{{$venda->dataEntrega}}" disabled>
                </div>
                <div class="col-sm-2">
                  <label for="valorUnd">Valor unitario</label>
                  <input type="text" class="form-control" name="valorUnd" id="valorUnd" value="" disabled>
                </div>
                <div class="col-sm-2">
                  <label for="valorTotal">Valor Total</label>
                  <input type="text" class="form-control" name="valorTotal" id="valorTotal" value="" disabled>
                </div>
                <div class="col-sm-2">
                  <label for="desconto">Desconto</label>
                  <input type="text" class="form-control" name="desconto" id="desconto" value="" disabled>
                </div>
                <div class="col-sm-2">
                  <label for="gasto">Gastos</label>
                  <input type="text" class="form-control" name="gasto" id="gasto" value="" disabled>
                </div>
                <div class="col-sm-2">
                  <label for="taxaEntrega">Taxa de Entrega</label>
                  <input type="text" class="form-control" name="taxaEntrega" id="taxaEntrega" value="" disabled>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-2">
                  <label for="taxaAdd">Taxas Adicionais</label>
                  <input type="text" class="form-control" name="taxaAdd" id="taxaAdd" value="" disabled>
                </div>
                <div class="col-sm-2">
                  <label for="statusVenda">Status da Venda</label>
                  <input type="text" class="form-control" name="statusVenda" id="statusVenda" value="" disabled>
                </div>
                <div class="col-sm-2">
                  <label for="entrada">Dinheiro de Entrada</label>
                  <input type="text" class="form-control" name="entrada" id="entrada" value="" disabled>
                </div>
                <div class="col-sm-3">
                  <label for="medidas">Medidas</label>
                  <input type="text" class="form-control" name="medidas" id="medidas" value="" disabled>
                </div>
                </div>
                
                <div class="form-group row">
                <div class="col-sm-6">
                    <label for="descricao">Descrição</label>                    
                    <textarea class="form-control" name='descricao' rows="6" cols="120" style="text-align:justify;" disabled>{{$venda->descricao}}</textarea>
                </div>
                </div>

                

                <div class="row btn-visualizar">
                  <a href="/sample/orcamento/editar/{{$venda->idVenda}}"><button type="button" class="btn btn-primary">Editar</button></a>
                  <a href="/sample/orcamento"><button type="button" class="btn btn-warning">Voltar</button></a>
                </div>

                <!--/.row-->
                @endforeach
              
              </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection