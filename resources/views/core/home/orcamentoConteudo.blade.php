
<div class="line5">					
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h3>Quer saber Quanto Ficaria?</h3>
					<p>Essa é a hora. Faça seu orçamento que entaremos em contato para mais detalhes.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
					@include('core.home.alerts') 
				<div class="col-md-8 col-xs-11 forma">
				<div class="card">
          <br>      
          <br>      
          <br>      
          <br>      
					<div class="card-body">
				<form  method="POST" action="{{url("/orcamento")}}">
					    
				{{ csrf_field() }}
				<span id="text-requerid">Todos os campos com * são obrigatorios</span>
			  <div class="form-group row">
				  <div class="col-sm-8">
					  <label for="nome">Nome</label><span id="text-requerid">*</span>
				  <input type="text" class="form-control" name="name" id="nome" value="">
				  </div>
				  <div class="col-sm-4">
					  <label for="telefone">Telefone Celular</label><span id="text-requerid">*</span>
					  <input type="text" class="form-control" name="telefone" id="telefone" value="">
				  </div>
			  </div>

			  <div class="form-group row">
			  <div class="col-sm-4">
				<label for="email">E-mail</label><span id="text-requerid">*</span>
				<input type="text" class="form-control" name="email" id="email" value="">
			  </div>
			  <div class="col-sm-5">
				<label for="endereco">Endereco</label><span id="text-requerid">*</span>
				<input type="text" class="form-control" name="endereco" id="endereco" value="">
			  </div>
			  <div class="col-sm-3">
				<label for="cidade">Cidade</label><span id="text-requerid">*</span>
				<input type="text" class="form-control" name="cidade" id="cidade" value="">
			  </div>
			  </div>
			  

			  <div class="form-group row">
			  <div class="col-sm-6">
				<label for="complemento">Complemento</label>
				<input type="text" class="form-control" name="complemento" id="complemento" value="">
				</div>
			</div>

			  <div class="col-sm-12">
					<div class="form-inline"> 
                      
						<label class="col-sm-2 col-form-label">Selecione os produtos</label>                
						 <select class="form-control" id="nmProduto" style="max-width: 300px;" >
							 
							 <option value="">Selecione o Produto</option>
							 @foreach ($produtos as $produto)

								<option  value="{{$produto->idProduto}}" data-param="{{$produto->valorMedio}}">{{$produto->nome}}</option>
									
						
							@endforeach
							
						 </select>

						 <label class="sr-only" for="inlineFormInput">Quantidade</label>
						 <input type="text" class="form-control mb-4 mr-sm-4 mb-sm-0 m3-sm-4" id="qtProduto" placeholder="Quant" style="width:70px">
						 <input type="hidden" class="form-control mb-2 mr-sm-2 mb-sm-0" id="vlProduto" placeholder="Valor (R$)" style="width:98px" readonly>
						 <button type="button" class="btn btn-primary" id="btnAdicionarProduto">+</button>
						 <p class="text-danger ml-3 pt-2 invisible" id="msgValidaForm">Favor preencher <strong>todos os campos</strong> do produto!</p>
						 
				 
				 <table class="table table-sm table-striped mt-3 table-produtos">
					 <thead>
						 <tr>
							 <th style="max-width: 600px;">Produto</th>
							 <th>Quantidade</th>							 
							 <th>Ação</th>
						 </tr>
					 </thead>
					 <tbody id="produto-inserir">
					 </tbody >
					 <tfoot class="invisible">
						 <tr>
							 <th></th>
							 <th></th>							 
							 <th></th>
							 <th><input class='form-control col-4' id='vlTotalPedido' type='hidden' value='' name='valorTotal' readonly></th>
							 
						 </tr>
						 
					 </tfoot>
					 
				 </table>
				 
				</div>
					</div>
			  
				<div class="form-group row">				
                      <div class="col-sm-12">
					  <label  for="textarea-input">Descricao do Orçamento</label><span id="text-requerid">*</span>
                        <textarea id="textarea-input" name="descricao" rows="9" class="form-control" placeholder="Detalhe o maximo possivel..."></textarea>
                      </div> 
            	</div>
			  <div class="form-group row">
			  <div class="col-sm-6">
				<button type="submit" class="btn btn-primary">Solicitar</button>
			  </div>
			  </div>
			  <!--/.row-->			  
			</form>
                </div>                
              </div>
				</div>
				<div class="col-md-4 col-xs-10 cont" >
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
					<ul>
						<li><i class="fa fa-home"></i>Samambaia Sul, Quadra 508 - Distrito Federal</li>
						<li><i class="fa fa-phone"></i>(61) 98148-6492</li>
						<li><a href="#"><i class="fa fa-envelope"></i>bbwell.gto@hotmail.com</li></a>
						<li><a href="https://www.instagram.com/paletesbrasilia_oficial/"><i class="fa fa-instagram"></i>Instagran</li></a>
						<li><a href="https://www.facebook.com/paletesbrasilia/"><i class="fa fa-facebook-square"></i>Facebook</li></a>
					</ul>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		