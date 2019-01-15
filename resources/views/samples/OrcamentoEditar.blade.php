@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-sm-12">
        @include('core.alerts')

        <div class="card">
            <div class="card-header">
                <strong>Produtos</strong>
                <small>Cadastrado</small>
            </div>
              <div class="card-body">
                <div class="recarrega">
                  @foreach ($vendas as $venda)
                  <form id="form">                
                  
                    <table class="table" >
                        
                        <input id="id" type="hidden" value="{{$venda->idVenda}}" name="id">
                      <thead>
                         
                        <p>Seleciones os itens para deletar</p>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Produto</th>
                          <th scope="col">Editar Quantidade</th>
                          <th scope="col">Deletar</th>
                        </tr>
                      </thead>
                      <tbody id="produtos">
                          
                          @foreach ($venda->produtos as $value)
                        <tr>        
                            {{-- $value->pivot --}}                   
                            <td>{{$value->idProduto}}</td>
                            <td>{{$value->nome}}</td>
                            <td>
                              <!--Editando modal-->
                              <input type="number" class="form col-2" name="qtd" value="{{$value->pivot->qtd}}" id="qtd" disabled>
                              <button type="button" value="editar modal" id="bnt-editar-qtd" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal" data-qtd="{{$value->pivot->qtd}}" data-idproduto="{{$value->pivot->id_produto}}" data-idpivo="{{$value->pivot->id}}"><span class="fas fa-pen-square fa-2x"></span></button>
                              
                              
                            </td>
                            <td><input type="checkbox" name="checks[]" value="{{$value->idProduto}}" id="pro"></td>
                          </tr>     
                          @endforeach
                                            
                      </tbody>
                      
                      @endforeach 
                  </table>
                  <div class="text-right">
                      <input type="submit" class="btn btn-danger" value="Deletar">

                    </div>
                  </form>
                </div>
              </div>
        </div>
        {{-- Modal editar quantidade --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form  id="form-edit-quantidade" >
                  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Quantdade:</label>
                    <label for="recipient-name" class="col-form-label">Quantdade:</label>
                   
                    <input type="hidden" class="form-control" id="recipient-idProduto" name="id_produto" value="">
                    <input type="hidden" class="form-control" id="recipient-idPivo" name="id" value="">
                    <input type="number" class="form-control" id="recipient-qtd" name="qtd" value="">
                    
                  </div>
                  
              
              <div class="modal-footer">
                <button type="submit" id="btn-enviar" class="btn btn-primary">Enviar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        
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
                    <div class="form-inline"> 
                      
                        <label class="col-sm-2 col-form-label">Insira os produtos</label>                
                         <select class="form-control" id="nmProduto" style="max-width: 300px;" >
                           
                           <option value="">Selecione o Produto</option>
                           @foreach ($produtos as $produto)

                            <option  value="{{$produto->idProduto}}" data-param="{{$produto->valorMedio}}">{{$produto->nome}}</option>
                              
                        
                          @endforeach
                          
                         </select>

                         <label class="sr-only" for="inlineFormInput">Quantidade</label>
                         <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0 ml-sm-2" id="qtProduto" placeholder="Quant" style="width:70px">
                         <label class="sr-only" for="inlineFormInput">Valor</label>                       
                         <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="vlProduto" placeholder="Valor (R$)" style="width:98px" readonly>
                         <button type="button" class="btn btn-primary" id="btnAdicionarProduto">+</button>
                         <p class="text-danger ml-3 pt-2 invisible" id="msgValidaForm">Favor preencher <strong>todos os campos</strong> do produto!</p>
                         
                     
                     <table class="table table-sm table-striped mt-3 table-produtos">
                       <thead>
                         <tr>
                           <th style="max-width: 600px;">Produto</th>
                           <th>Quantidade</th>
                           <th class="pr-5">Valor (R$)</th>
                           <th class="pr-5 vlTotalProduto">Total</th>
                           <th>Ação</th>
                         </tr>
                       </thead>
                       <tbody id="produto-inserir">
                       </tbody >
                       <tfoot class="invisible">
                         <tr>
                           <th></th>
                           <th></th>
                           <th class="text-right">SubTotal ❯</th>
                           <th class="text-right pr-5" id="vlTotalPedido"></th>
                           <th></th>
                           
                         </tr>
                         
                       </tfoot>
                       
                     </table>
                     
                    </div>


                    <div class="col-sm-5">
                        <label for="name">Nome do Cliente</label>
                        <select class="form-control" name="FkUsers">                          
                          @foreach ($users as $user)  
                          <option value="{{$user->id}}" @if (isset($venda) && $venda->usuario->name == $user->name)
                          selected
                          @endif
                          </option>{{$user->name}}</option>                          
                          @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="qtd">Quantidade</label>
                        <input type="number" class="form-control input-teste" name="qtd" id="qtd" value="{{$venda->qtd}}" required>
                    </div>
                    
                </div>
                

                <div class="form-group row">
                <div class="col-3">
                  <label for="dataEntrega">Data de Entrega</label>
                  <input type="text" class="form-control" name="dataEntrega" id="dataEntrega" value="{{$venda->dataEntrega}}" required>
                </div>
                <div class="col-sm-2">
                  <label for="desconto">Desconto</label>
                  <input type="text" class="form-control input-teste" name="desconto" id="desconto" value="{{$venda->desconto}}" required>
                </div>
                <div class="col-sm-2">
                  <label for="gasto">Gastos</label>
                  <input type="text" class="form-control input-teste" name="gasto" id="gasto" value="{{$venda->gasto}}" required>
                </div>
                <div class="col-sm-2">
                  <label for="taxaEntrega">Taxa de Entrega</label>
                  <input type="text" class="form-control input-teste" name="taxaEntrega" id="taxaEntrega" value="{{$venda->taxaEntrega}}" required>
                </div>
                <div class="col-sm-2">
                  <label for="taxaAdd">Taxas Adicionais</label>
                  <input type="text" class="form-control input-teste" name="taxaAdd" id="taxaAdd" value="{{$venda->taxaAdd}}" required>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-2">
                  <label for="valorMedio">Valor unitario</label>
                  <input type="number" class="form-control" name="valorUnd" id="valorMedio" value="" readonly>
                </div>
                <div class="col-sm-2">
                  <label for="valorTotal">Valor Total</label>
                  <input type="number" class="form-control" name="valor" id="valor" value="" readonly>
                </div>
                
                <div class="col-sm-3">
                  <label for="statusVenda">Status da Venda</label>
                  <select class="form-control" name="statusVenda" required>
                      <option value="">Selecione Status</option>
                      <option value="Orcamento">Orçamento</option>
                      <option value="Negociando">Em Andamento</option>
                      <option value="Efetivada">Efetivada</option>
                      <option value="Cancelado">Cancelado</option>
                      <option value="Cancelado Estornado">Cancelado é Estornado</option>
                  </select>
                </div>
                <div class="col-sm-2">
                  <label for="entrada">Dinheiro de Entrada</label>
                  <input type="text" class="form-control" name="entrada" id="entrada" value="{{$venda->entrada}}" required>
                </div>
                <div class="col-sm-3">
                  <label for="medidas">Medidas</label>
                  <input type="text" class="form-control" name="medidas" id="medidas" value="{{$venda->medidas}}" required>
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
                  <a href="/sample/orcamento"><button type="button" class="btn btn-warning">Voltar</button></a>
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
@section('myscript')
<script type="text/javascript">
  
$(document).ready(function(){
    // o evento Ajax ocorrerá quando o usuário clicar no link
  $("#form").on("submit", function(e){
      e.preventDefault();
      var id = $("#id").val();
      var tabela = $(this);

      var checkeds = new Array();
      $("input[name='checks[]']:checked").each(function ()
      {
        // valores inteiros usa-se parseInt
        //checkeds.push(parseInt($(this).val()));
        // string
        checkeds.push( $(this).val());
      });
      
      //setup para o cscrf do laravel
      $.ajaxSetup({
          beforeSend: function(xhr, type) {
              if (!type.crossDomain) {
                  xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
              }
          },
      });      
      // agora iniciamos a requisição ajax
      $.post({        
         // url: '/sample/orcamento/OrcamentoEditar/deletarProduto/'+ id,

          async: true, // link de exemplo
          data: { produto: ''+checkeds },      
          success: function( data ) {
            $("#form").html(data);
          
          
          } 
      }); 

      
      
  });


  

});

</script>
@endsection