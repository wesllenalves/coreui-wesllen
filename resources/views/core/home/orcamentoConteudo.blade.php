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
				<div class="col-md-8 col-xs-11 forma">
				<div class="card">
                
                <div class="card-body">
				<form  method="POST" action="{{url("/orcamento")}}">
              
			  {{ csrf_field() }}
			  <div class="form-group row">
				  <div class="col-sm-6">
					  <label for="nome">Nome</label>
				  <input type="text" class="form-control" name="name" id="nome" value="">
				  </div>
				  <div class="col-sm-3">
					  <label for="cpf">CPF</label>
					  <input type="text" class="form-control" name="cpf" id="cpf" value="">
				  </div>
				  <div class="col-sm-3">
					  <label for="telefone">Telefone</label>
					  <input type="text" class="form-control" name="telefone" id="telefone" value="">
				  </div>
			  </div>

			  <div class="form-group row">
			  <div class="col-sm-4">
				<label for="email">E-mail</label>
				<input type="text" class="form-control" name="email" id="email" value="">
			  </div>
			  <div class="col-sm-5">
				<label for="endereco">Endereco</label>
				<input type="text" class="form-control" name="endereco" id="endereco" value="">
			  </div>
			  <div class="col-sm-3">
				<label for="cidade">Cidade</label>
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
												<option value="">Please select</option>
													@foreach($produtos as $produto)													
                          <option value="{{$produto->nome}}">{{$produto->nome}}</option>
													@endforeach
                        </select>
                      </div>
			  </div>
				<div class="form-group row">				
                      <div class="col-sm-12">
					  <label  for="textarea-input">Descricao do Orçamento</label>
                        <textarea id="textarea-input" name="descricao" rows="9" class="form-control" placeholder="Detalhe o maximo possivel..."></textarea>
                      </div> 
            	</div>
			  <div class="form-group row">
			  <div class="col-sm-6">
				<button type="submit" class="btn btn-primary">Adicionar</button>
				<a href="/sample/cliente"><button type="button" class="btn btn-warning">Cancelar</button></a>
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
		
		