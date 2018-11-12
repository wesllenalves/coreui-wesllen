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
        @yield('financeiro')
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
                            <form id="formReceita" action="{{url("/sample/relatorio/adicionarDespesa")}}" method="post">
                                <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
                                <div class="modal-body">


                                    <div class="form-group" style="margin-left: 0"> 
                                    {{ csrf_field() }}
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
                                        <input class="form-control datepicker" id="data_vencimento" type="date" name="data_vencimento"  />
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
                                </div>
                                <div class="span12" style="margin-left: 0"> 
                                    <div class="form-group" style="margin-left: 0">
                                        <label for="recebido">Foi Pago?</label>
                                        &nbsp &nbsp &nbsp &nbsp
                                        <input  id="recebido" type="checkbox" name="status" value="Pago" />	
                                    </div>
                                    <div id="divRecebimento" name="formulario-oculto" class="span8" style=" display: none">

                                        <div class="form-group">
                                            <label for="recebimento">Data de Pagamento</label>
                                            <input class="form-control datepicker" id="data_pagamento" type="date" name="data_pagamento" />	
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
                    
                    <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" data-whateverid="{{$lancamento->id}}" data-whateverdescricao="{{$lancamento->descricao}}"
                    data-whatevertipo="{{$lancamento->tipo}}" data-whatevercliente="{{$lancamento->cliente}}" data-whateverdata_vencimento="{{$lancamento->data_vencimento}}" data-whateverdata_pagamento="{{$lancamento->data_pagamento}}"
                    data-whatevervalor="{{$lancamento->valor}}" data-whateverformaPgto="{{$lancamento->formaPgto}}">Editar</button>
                    <a href="/sample/cliente/deletar/"><button type="button" class="btn-sm btn-danger">Remover</button></a>
                    
                </td>                
              </tr>


             
              @endforeach
            </tbody>
          </table>
        </div> 
        <!-- Editar Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
        <form method="post" action="/sample/relatorio/editar" >
        
          <div class="form-group">
           <input type="hidden" class="form-control" name="id" id="recipient-id">
           <input type="hidden" class="form-control" name="status" >
            <label for="recipient-name" class="col-form-label">Descricao*:</label>
            <input type="text" class="form-control" name="descricao" id="recipient-descricao">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Cliente / Fornecedor / Empresa*:</label>
            <input type="text" class="form-control" name="cliente" id="recipient-cliente">
          </div>
          <div class="form-group" style="margin-left: 0">
                <label for="valor">Valor*</label>
                <input type="hidden" id="recipient-tipo" name="tipo" />	
                <input type="text" class="form-control money" id="recipient-valor"  name="valor"  />
            </div>
            <div class="form-group" >
                <label for="vencimento">Data Vencimento*</label>
                <input class="form-control datepicker" id="recipient-data_vencimento" type="date" name="data_vencimento"  />
            </div>
            <div class="form-group">
                <label for="formaPgto">Forma Pgto*</label>
                <select name="formaPgto" id="recipient-formaPgto" class="form-control">
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
        <div class="span12" style="margin-left: 0"> 
            <div class="form-group" style="margin-left: 0">
                <label for="recebido">Foi Pago?</label>
                &nbsp &nbsp &nbsp &nbsp
                <input  id="recebido" type="checkbox" name="status" value="Pago" />	
            </div>
            <div id="divRecebimento" name="formulario-oculto" class="span8" style=" display: none">

                <div class="form-group col-md-12">
                    <label for="recebimento">Data de Pagamento</label>
                    <input type="date" class="form-control datepicker" id="recipient-data_pagamento"  name="data_pagamento" />	
                </div>                                      
            </div>
        </div>
        <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
        </form>
      </div>
    </div>
  </div>
</div> 
</div>
</div>       
          
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

  
@endsection
