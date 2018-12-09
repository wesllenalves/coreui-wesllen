
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
                
                <div class="card-body">
				<form  method="POST" action="{{url("/orcamento")}}">
					    
				{{ csrf_field() }}
				<span id="text-requerid">Todos os campos com * são obrigatorios</span>
			  <div class="form-group row">
				  <div class="col-sm-6">
					  <label for="nome">Nome</label><span id="text-requerid">*</span>
				  <input type="text" class="form-control" name="name" id="nome" value="">
				  </div>
				  <div class="col-sm-3">
					  <label for="cpf">CPF</label><span id="text-requerid">*</span>
					  <input type="text" class="form-control" name="cpf" id="cpf" value="">
				  </div>
				  <div class="col-sm-3">
					  <label for="telefone">Telefone</label><span id="text-requerid">*</span>
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
			  <div class="col-sm-6">
					  <label  for="select">Produto</label>
                        <select id="select" name="FKProdutos" class="form-control">
												<option value="">Selecione o Produto</option>
													@foreach($produtos as $produto)													
                          <option value="{{$produto->idProduto}}">{{$produto->nome}}</option>
													@endforeach
                        </select>
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
					<ul>
						<li><i class="fa fa-home"></i>5512 Lorem Ipsum Vestibulum 666/13</li>
						<li><i class="fa fa-phone"></i>+1 800 789 50 12, +1 800 450 6935</li>
						<li><a href="#"><i class="fa fa-envelope"></i>mail@compname.com</li></a>
						<li><i class="fa fa-skype"></i>compname</li>
						<li><a href="#"><i class="fa fa-twitter"></i>Twitter</li></a>
						<li><a href="#"><i class="fa fa-facebook-square"></i>Facebook</li></a>
						<li><a href="#"><i class="fa fa-dribbble"></i>Dribbble</li></a>
						<li><a href="#"><i class="fa fa-flickr"></i>Flickr</li></a>
						<li><a href="#"><i class="fa fa-youtube-play"></i>YouTube</li></a>
					</ul>
				</div>
			</div>
		</div>
		
		