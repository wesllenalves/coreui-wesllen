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
                <form  method="POST" action="{{url("/sample/orcamento/OrcamentoEditar/{$venda->idVenda}")}}">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for="name">Nome do Cliente</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$venda->usuario->name}}" >
                    </div>
                    <div class="col-sm-5">
                        <label for="nome">Produto</label>
                        <select class="form-control" name="FkProdutos">
                        <option value="">Selecione Produto</option>
                        @foreach ($produtos as $produto)

                        <option value="{{$produto->idProduto}}" @if (isset($venda) && $venda->produto->nome == $produto->nome)
                        selected
                        @endif
                        </option>{{$produto->nome}}</option>
                        
                        @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="qtd">Quantidade</label>
                        <input type="text" class="form-control" name="qtd" id="qtd" value="{{$venda->qtd}}" >
                    </div>
                </div>
                

                <div class="form-group row">
                <div class="col-sm-2">
                  <label for="dataEntrega">Data de Entrega</label>
                  <input type="text" class="form-control" name="dataEntrega" id="dataEntrega" value="{{$venda->dataEntrega}}" >
                </div>
                <div class="col-sm-2">
                  <label for="valorMedio">Valor unitario</label>
                  <input type="text" class="form-control" name="" id="valorMedio" value="{{$venda->produto->valorMedio}}" disabled>
                </div>
                <div class="col-sm-2">
                  <label for="valorTotal">Valor Total</label>
                  <input type="text" class="form-control" name="valorTotal" id="valorTotal" value="{{$venda->valorTotal}}" >
                </div>
                <div class="col-sm-2">
                  <label for="desconto">Desconto</label>
                  <input type="text" class="form-control" name="desconto" id="desconto" value="{{$venda->desconto}}" >
                </div>
                <div class="col-sm-2">
                  <label for="gasto">Gastos</label>
                  <input type="text" class="form-control" name="gasto" id="gasto" value="{{$venda->gasto}}" >
                </div>
                <div class="col-sm-2">
                  <label for="taxaEntrega">Taxa de Entrega</label>
                  <input type="text" class="form-control" name="taxaEntrega" id="taxaEntrega" value="{{$venda->taxaEntrega}}" >
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-2">
                  <label for="taxaAdd">Taxas Adicionais</label>
                  <input type="text" class="form-control" name="taxaAdd" id="taxaAdd" value="{{$venda->taxaAdd}}" >
                </div>
                <div class="col-sm-2">
                  <label for="statusVenda">Status da Venda</label>
                  <input type="text" class="form-control" name="statusVenda" id="statusVenda" value="{{$venda->statusVenda}}" >
                </div>
                <div class="col-sm-2">
                  <label for="entrada">Dinheiro de Entrada</label>
                  <input type="text" class="form-control" name="entrada" id="entrada" value="{{$venda->entrada}}" >
                </div>
                <div class="col-sm-3">
                  <label for="medidas">Medidas</label>
                  <input type="text" class="form-control" name="" id="medidas" value="{{$venda->medidas}}" disabled>
                </div>
                </div>
                
                <div class="form-group row">
                <div class="col-sm-6">
                    <label for="descricao">Descrição</label>                    
                    <textarea class="form-control" name='descricao' rows="6" cols="120" style="text-align:justify;" >{{$venda->descricao}}</textarea>
                </div>
                </div>

                

                <div class="row btn-visualizar">
                <button type="submit" class="btn btn-primary">Salvar</button>
                  <a href="/sample/cliente"><button type="button" class="btn btn-warning">Voltar</button></a>
                </div>
                </form>
                <!--/.row-->
                @endforeach
              
              </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection