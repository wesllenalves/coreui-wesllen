@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
   
        @include('core.alerts')

        <div class="card">
            <div class="card-header">
                <strong>Produtos</strong>
                <small>Cadastrado</small>
            </div>
              <div class="card-body">
                <div class="recarrega">
                  @foreach ($vendas as $venda)

                  <form id="form-tabela">
                    <table class="table" >
                        <input id="id" type="hidden" value="{{$venda->idVenda}}" name="id">
                      <thead>
                        <p>Selecione somente um item por vez para deletar ou editar</p>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Produto</th>
                          <th scope="col">Quantidade</th>
                          <th scope="col">Gastos</th>
                          <th scope="col">Taxa de Entrega</th>
                          <th scope="col">Taxa Adicionais</th>
                          <th scope="col">Deletar</th>
                        </tr>
                      </thead>
                      @foreach ($venda->produtos as $value)
                      <div class="tabela-produtos">
                      <tbody id="produtos">
                        <tr>                  
                            <td>{{$value->idProduto}}</td>
                            <td>{{$value->nome}}</td>
                            <td>
                              <!--Editando modal Quantidade-->
                              <input type="number" class="form col-3" name="qtd" value="{{$value->pivot->qtd}}" id="qtd" disabled style="width: 100%;padding: 0;">
                              <button type="button" value="editar modal" id="bnt-editar-qtd" class="btn btn-default btn-sm" data-toggle="modal" data-target="#qtdModal" data-qtd="{{$value->pivot->qtd}}" data-idproduto="{{$value->pivot->id_produto}}" data-idpivo="{{$value->pivot->id}}" data-idvenda="{{$value->pivot->id_venda}}"><span class="fas fa-pen-square fa-2x"></span></button>
                            </td>
                            <td>
                              <!--Editando modal Gastos-->
                              <input type="text" class="form col-4" name="gasto" value="{{$value->pivot->gasto}}" id="input-gasto" disabled style="width: 100%;padding: 0;">
                              <button type="button" value="editar modal" id="bnt-editar-gasto" class="btn btn-default btn-sm" data-toggle="modal" data-target="#gastoModal" data-qtd="" data-idproduto="{{$value->pivot->id_produto}}" data-idpivo="{{$value->pivot->id}}" data-idvenda="{{$value->pivot->id_venda}}" data-gasto="{{$value->pivot->gasto}}"><span class="fas fa-pen-square fa-2x"></span></button>
                            </td>
                            <td>
                              <!--Editando modal Taxa de Entrega-->
                              <input type="number" class="form col-4" name="taxaEntrega" value="{{$value->pivot->taxaEntrega}}" id="input-taxaEntrega" disabled style="width: 100%;padding: 0;">
                              <button type="button" value="editar modal" id="bnt-editar-taxaEntrega" class="btn btn-default btn-sm" data-toggle="modal" data-target="#taxaEntregaModal"  data-idproduto="{{$value->pivot->id_produto}}" data-idpivo="{{$value->pivot->id}}" data-idvenda="{{$value->pivot->id_venda}}" data-taxa-entrega="{{$value->pivot->taxaEntrega}}"><span class="fas fa-pen-square fa-2x"></span></button>
                            </td>
                            <td>
                              <!--Editando modal Taxa Adicionais-->
                              <input type="number" class="form col-4" name="taxaAdd" value="{{$value->pivot->taxaAdd}}" id="input-taxaAdd" disabled style="width: 100%;padding: 0;">
                              <button type="button" value="editar modal" id="bnt-editar-taxaAdd" class="btn btn-default btn-sm" data-toggle="modal" data-target="#taxaAddModal"  data-idproduto="{{$value->pivot->id_produto}}" data-idpivo="{{$value->pivot->id}}" data-idvenda="{{$value->pivot->id_venda}}" data-taxa-add="{{$value->pivot->taxaAdd}}"><span class="fas fa-pen-square fa-2x"></span></button>
                            </td>
                            <td><input type="checkbox" name="checks[]" value="{{$value->idProduto}}" id="pro"></td>
                          </tr>     
                          
                                            
                      </tbody>
                      </div>
                      @endforeach
                      @endforeach 
                  </table>
                  <div class="text-right">
                      <input type="submit" id="deletar" class="btn btn-danger" value="Deletar">
                    </div>
                  </form>

                </div>
              </div>
        </div>
        {{-- Modal editar quantidade --}}
        <div class="modal fade" id="qtdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="recipient-name" class="col-form-label">Quantidade:</label>
                   
                    <input type="hidden" class="form-control" id="recipient-idProduto" name="id_produto" value="">
                    <input type="hidden" class="form-control" id="recipient-idPivo" name="id" value="">
                    <input type="hidden" class="form-control" id="recipient-idVenda" name="id_venda" value="">
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

        {{-- Modal editar Gasto --}}
        <div class="modal fade" id="gastoModal" tabindex="-1" role="dialog" aria-labelledby="gastoModalLabel" aria-hidden="true">
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
                    <label for="recipient-name" class="col-form-label">Gastos:</label>
                   
                    <input type="hidden" class="form-control" id="recipient-idProduto" name="id_produto" value="">
                    <input type="hidden" class="form-control" id="recipient-idPivo" name="id" value="">
                    <input type="hidden" class="form-control" id="recipient-idVenda" name="id_venda" value="">
                    <input type="number" class="form-control" id="recipient-gasto" name="gasto" value="">
                    
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

        {{-- Modal editar Taxa Entrega --}}
        <div class="modal fade" id="taxaEntregaModal" tabindex="-1" role="dialog" aria-labelledby="taxaEntregaModalLabel" aria-hidden="true">
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
                    <label for="recipient-name" class="col-form-label">Taxa de Entrega:</label>
                   
                    <input type="hidden" class="form-control" id="recipient-idProduto" name="id_produto" value="">
                    <input type="hidden" class="form-control" id="recipient-idPivo" name="id" value="">
                    <input type="hidden" class="form-control" id="recipient-idVenda" name="id_venda" value="">
                    <input type="number" class="form-control" id="recipient-taxaEntrega" name="taxaEntrega" value="">
                    
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

        {{-- Modal editar Taxa Adicionais --}}
        <div class="modal fade" id="taxaAddModal" tabindex="-1" role="dialog" aria-labelledby="taxaAddModalLabel" aria-hidden="true">
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
                    <label for="recipient-name" class="col-form-label">Taxa Adicional:</label>
                   
                    <input type="hidden" class="form-control" id="recipient-idProduto" name="id_produto" value="">
                    <input type="hidden" class="form-control" id="recipient-idPivo" name="id" value="">
                    <input type="hidden" class="form-control" id="recipient-idVenda" name="id_venda" value="">
                    <input type="number" class="form-control" id="recipient-taxaAdd" name="taxaAdd" value="">
                    
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



        
        
        <div class="card">  
            <div class="card-header">
                <strong>Detalhes</strong>
                <small>Cliente</small>
            </div>
              <div class="card-body">

              @foreach ($vendas as $venda)
              </form>
                
                <div class="form-group row">
                    <div class="form-inline"> 
                      
                        <label class="col-sm-2 col-form-label" style="padding: 0; width:50px;">Insira os produtos</label>                
                         <select class="form-control" id="nmProduto" style="max-width: 300px;" >
                           
                           <option value="">Selecione o Produto</option>
                           @foreach ($produtos as $produto)

                            <option  value="{{$produto->idProduto}}" data-param="{{$produto->valorMedio}}">{{$produto->nome}}</option>
                              
                        
                          @endforeach
                          
                         </select>
                         
                         <label class="sr-only" for="inlineFormInput">Quantidade</label>
                         <input style="margin-left:5px; border-radius: 20px;" type="text" class="form-control col-2" name='qtd[]' id="qtProduto" placeholder="Quant" >
                        
                         <label class="sr-only" for="inlineFormInput">Gastos</label>
                         <input style="margin-left:5px; border-radius: 20px;" type="text" class="form-control col-2" id="gastos" name="gastos[]" placeholder="Gastos">
                         <label class="sr-only" for="inlineFormInput">Taxa de Entrega</label>
                         <input style="margin-left:5px; border-radius: 20px;" type="text" class="form-control col-2" id="taxaEntrega" name="taxaEntrega[]" placeholder="Taxa de Entrega" >
                         <label class="sr-only" for="inlineFormInput">Taxa Adicionais</label>
                         <input style="margin-left:5px; border-radius: 20px;" type="text" class="form-control col-2" id="taxaAdd" name="taxaAdd[]" placeholder="Taxa Adicionais" >
                         
                         <label class="sr-only" for="inlineFormInput">Valor</label>                       
                         <input style="margin-left:5px; border-radius: 20px;" type="text" class="form-control col-2" id="vlProduto" name='vlProduto[]'  placeholder="Valor (R$)"  readonly>
                         <button style="margin-left:5px;" type="button" class="btn btn-primary" id="btnAdicionarProduto">+</button>
                         <p class="text-danger ml-3 pt-2 invisible" id="msgValidaForm">Favor preencher <strong>todos os campos</strong> do produto!</p>
                         
                        </div>
                        </form>
                        <form  class="col-md-12" method="POST" action="{{url("/sample/orcamento/OrcamentoEditar/{$venda->idVenda}")}}">
                     {{ csrf_field() }}     
                     <div class="col-md-12">
                     <table class="table table-sm table-striped table-produtos table-responsive">
                       <thead>
                         <tr>
                           <th style="max-width: 100px;">Produto</th>
                           <th>Quantidade</th>
                           <th>Gastos</th>
                           <th>Taxa de Entrega</th>
                           <th>Taxa Adicionais</th>
                           <th >Valor (R$)</th>
                           <th class="vlTotalProduto">Total</th>
                           <th>Ação</th>
                         </tr>
                       </thead>
                       <tbody id="produto-inserir">
                       </tbody >
                       <tfoot class="invisible table-sm">
                         <tr>                           
                           <th ></th>
                           <th ></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th class="text-right">SubTotal ❯</th>
                           <th class="text-right" id="vlTotalPedido"></th>
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
                
                
                </div>

                <div class="form-group row">                
                <div class="col-sm-2">
                  <label for="valorTotal">Valor Total</label>
                  <input type="number" class="form-control"  id="TotalPedido" name="valorTotal" value=""   readonly>
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
  $("#form-tabela").on("submit", function(e){
    
    e.preventDefault();
      var id = $("#id").val();
      var tabela = $(this);

      var checkeds = new Array();
      
      $("input[name='checks[]']:checked").each(function ()
      {
        // valores inteiros usa-se parseInt
        //checkeds.push(parseInt($(this).val()));
        // string
        checkeds.push( parseInt($(this).val()) );
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
          url: '/sample/orcamento/OrcamentoEditar/deletarProduto/'+ id,

          async: true, // link de exemplo
          data: { produto: ''+checkeds },      
          success: function( data ) {
            console.log(checkeds);
            console.log(data);
            $("#form-tabela").html(data);
          
          
          } 
      }); 

  });


  

});

</script>
@endsection