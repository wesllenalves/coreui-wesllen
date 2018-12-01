@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>Detalhes</strong>
                <small>venda</small>
              </div>
              <div class="card-body">
              @foreach ($vendas as $venda)
              <form  method="POST" action="{{url("/sample/vendas/editar/{$venda->idVenda}")}}">
              
                {{ csrf_field() }}
                <input type="hidden"  name="id"  value="{{$venda->id}}">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="nome">Nome</label>
                        <select class="form-control" name="FkUsers">
                          @foreach ($usuarios as $usuario)
                          <option value="{{$usuario->id}}">{{$usuario->name}}</option> 
                         @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
                        <label for="telefone">Data de Entrega</label>
                        <input type="date" class="form-control" name="dataEntrega" id="dataEntrega" value="{{$venda->dataEntrega}}">
                    </div>
                    <div class="col-sm-2">
                        <label for="email">Unidades</label>
                        <input type="text" class="form-control" name="qtd" id="qtd" value="{{$venda->qtd}}">
                    </div>

                </div>

                

                <div class="form-group row">
                
                <div class="col-sm-3">
                  <label for="endereco">Valor Total</label>
                  <input type="text" class="form-control" name="valorTotal" id="valorTotal" value="{{$venda->valorTotal}}">
                </div>
                <div class="col-sm-2">
                  <label for="cidade">Desconto</label>
                  <input type="text" class="form-control" name="desconto" id="desconto" value="{{$venda->desconto}}">
                </div>
                <div class="col-sm-2">
                  <label for="complemento">Gastos</label>
                  <input type="text" class="form-control" name="gasto" id="gasto" value="{{$venda->gasto}}">
                </div>
                <div class="col-sm-2">
                  <label for="complemento">Taxa de entrega</label>
                  <input type="text" class="form-control" name="taxaEntrega" id="taxaEntrega" value="{{$venda->taxaEntrega}}">
                </div>
                <div class="col-sm-2">
                  <label for="complemento">Taxa Adicionais</label>
                  <input type="text" class="form-control" name="taxaAdd" id="taxaAdd" value="{{$venda->taxaAdd}}">
                </div>
                </div>

                <div class="form-group row">                
                <div class="col-sm-3">
                    <label for="statusVenda">Status da Venda</label>
                    <select class="form-control" name="statusVenda">
                        <option value="">Selecione Status</option>
                        <option value="Orcamento">Orçamento</option>
                        <option value="Negociando">Em Andamento</option>
                        <option value="Efetivada">Efetivada</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="Cancelado Estornado">Cancelado é Estornado</option>
                    </select>
                  </div>
                
                <div class="col-sm-3">
                  <label for="complemento">Entrada</label>
                  <input type="text" class="form-control" name="entrada" id="entrada" value="{{$venda->entrada}}">
                </div>
                <div class="col-sm-3">
                    <label for="medidas">Medidas</label>
                    <input type="text" class="form-control" name="medidas" id="medidas" value="{{$venda->medidas}}" >
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
                  <a href="/sample/vendas"><button type="button" class="btn btn-warning">Cancelar</button></a>
                </div>
                <!--/.row-->
                @endforeach
              </form>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection