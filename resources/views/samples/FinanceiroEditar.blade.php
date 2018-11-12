@extends('dashboard')
@section('financeiro')

<!-- Modal Adicionar Receita-->
<div class="modal show" id="modalReceita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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