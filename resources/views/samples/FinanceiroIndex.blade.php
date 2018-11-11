@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
  
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Relatorio
        </div>
        
        
        <div class="card-body">
          
            <div id="dtHorizontalExample">
          <table class="table table-responsive table-bordered table-striped table-sm">
            <thead>
              <div class="botao-financeiro" style="margin-bottom:10px;">
                
              <a href="#modalReceita" class="btn btn-primary" data-toggle="modal" data-target="#modalReceita" role="button" class="btn btn-success tip-bottom" title="Cadastrar nova receita"><i class="icon-plus icon-white"></i> Nova Receita</a>  
              <a href="#modalDespesa" data-toggle="modal" role="button" class="btn btn-danger tip-bottom" title="Cadastrar nova despesa"><i class="icon-plus icon-white"></i> Nova Despesa</a>

              </div>

                <!-- Modal Adicionar Receita-->
                <div class="modal fade" id="modalReceita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">                                
                                <h4 class="modal-title" id="myModalLabel">Adicionar Receita</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form id="formReceita" action="{{url("/sample/relatorio/adicionarReceita")}}" method="post">

                                    <div class="modal-body">

                                        <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
                                        
                                        <div class="form-group" style="margin-left: 0"> 
                                            {{ csrf_field() }}
                                            <input type="hidden" id="tipo" name="tipo" value="Receita" />	
                                            <label for="descricao">Descrição*</label>
                                            <input class="form-control" id="descricao" type="text" name="descricao"  />                                    
                                        </div>	
                                        <div class="form-group" style="margin-left: 0"> 

                                            <label for="cliente">Cliente/Produto/Fornecedor*</label>
                                            <input class="form-control" id="cliente" type="text" name="cliente"  />
                                        </div>

                                        <div class="form-group" style="margin-left: 0">
                                            <label for="valor">Valor*</label>
                                            
                                            <input class="form-control money" id="valor" type="text" name="valor" />
                                        </div>
                                        <div class="form-group" style="margin-left: 0">                                
                                            <label for="vencimento">Data Vencimento*</label>
                                            <input class="form-control" id="vencimento" type="date" name="data_vencimento"  />                              
                                        </div>
                                        <div class="form-group">
                                            <label for="formaPgto">Forma Pgto</label>
                                            <select name="formaPgto" id="formaPgto" class="form-control">
                                                <option value="Dinheiro">-</option>
                                                <option value="Dinheiro">Dinheiro</option>
                                                <option value="Cartão de Crédito">Cartão de Crédito</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Boleto">Boleto</option>
                                                <option value="Depósito">Depósito</option>
                                                <option value="Débito">Débito</option>  			
                                            </select>
                                        </div>
                                        <div class="span12" style="margin-left: 0"> 
                                            <div class="span4" style="margin-left: 0">
                                                <label for="recebido">Recebido?</label>
                                                &nbsp &nbsp &nbsp &nbsp
                                                <input  id="recebido" type="checkbox" name="status" value="Pago" />	
                                            </div>
                                            <div id="divRecebimento" name="formulario-oculto" class="span8" style=" display: none">
                                                <div class="form-group">
                                                    <label for="recebimento">Data Recebimento</label>
                                                    <input class="form-control" id="recebimento" type="date" name="data_pagamento" />	
                                                </div>
                                                
                                            </div>
                                        </div> 
                                    </div>
                            
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                <button class="btn btn-success">Adicionar Receita</button>
                            </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Modal Adicionar Despesa -->
            <div class="modal fade" id="modalDespesa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">                            
                            <h4 class="modal-title" id="myModalLabel">Adicionar Despesa</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="formReceita" action="http://localhost:8080/financeiro/lancamentos/adicionarDespesa" method="post">
                                <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
                                <div class="modal-body">


                                    <div class="form-group" style="margin-left: 0"> 
                                        <label for="descricao">Descrição*</label>
                                        <input class="form-control" id="descricao" type="text" name="descricao"  />                                    
                                    </div>	
                                    <div class="form-group" style="margin-left: 0">

                                        <label for="fornecedor">Cliente / Fornecedor / Empresa*</label>
                                        <input class="form-control" id="fornecedor" type="text" name="cliente"  />

                                    </div>
                                    <div class="form-group" style="margin-left: 0"> 

                                        <label for="valor">Valor*</label>
                                        <input type="hidden" id="tipo" name="tipo" value="Despesa" />	
                                        <input class="form-control money" id="valor" type="text" name="valor"  />
                                    </div>

                                    <div class="form-group" >
                                        <label for="vencimento">Data Vencimento*</label>
                                        <input class="form-control datepicker" id="vencimento" type="date" name="vencimento"  />
                                    </div>

                                </div>
                                <div class="span12" style="margin-left: 0"> 
                                    <div class="form-group" style="margin-left: 0">
                                        <label for="recebido">Foi Pago?</label>
                                        &nbsp &nbsp &nbsp &nbsp
                                        <input  id="recebido" type="checkbox" name="recebido" value="sim" />	
                                    </div>
                                    <div id="divRecebimento" name="formulario-oculto" class="span8" style=" display: none">

                                        <div class="form-group col-md-6">
                                            <label for="recebimento">Data de Pagamento</label>
                                            <input class="form-control datepicker" id="recebimento" type="date" name="recebimento" />	
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="formaPgto">Forma Pgto</label>
                                            <select name="formaPgto" id="formaPgto" class="form-control">
                                                <option value="Dinheiro">-</option>
                                                <option value="Dinheiro">Dinheiro</option>
                                                <option value="Cartão de Crédito">Cartão de Crédito</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Boleto">Boleto</option>
                                                <option value="Depósito">Depósito</option>
                                                <option value="Débito">Débito</option>  			
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                
                                <div class="modal-footer">
                                    <br>
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                    <button class="btn btn-danger">Adicionar Despesa</button>
                                </div>
                            </form>
                        

              
              <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Cliente/produto/Fornecedor</th>
                <th>Vencimento</th>
                <th>Pagamento</th>
                <th>status</th>
                <th>Valor</th>
                <th>Forma de pagamento</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              
                  @foreach ($lancamentos as $lancamento)
                
              <tr>
              <td>{{$lancamento->id}}</td>
                <td>{{$lancamento->descricao}}</td>
                <td>{{$lancamento->tipo}}</td>
                <td>{{$lancamento->cliente}}</td>
                <td>{{$lancamento->data_vencimento}}</td>
                <td>{{$lancamento->data_pagamento}}</td>
                <td>{{$lancamento->status}}</td>
                <td>{{$lancamento->valor}}</td>
                <td>{{$lancamento->formaPgto}}</td>                
                <td style="width:25%;">
                    
                    <a href="/sample/cliente/clienteEditar/"><button type="button" class="btn-sm btn-primary">Editar</button></a>
                    <a href="/sample/cliente/deletar/"><button type="button" class="btn-sm btn-danger">Remover</button></a>
                    
                </td>                
              </tr>
             
              @endforeach
            </tbody>
          </table>
        </div>
          
          
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

  
@endsection
<script>
$('[name="recebido"]').change(function () {
        $('[name="formulario-oculto"]').toggle(200);
    });
    //script para passar o id para modal de excluir
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
</script>