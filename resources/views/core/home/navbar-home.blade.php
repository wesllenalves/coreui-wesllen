
<!--home start-->
    

    	<div class="headerLine">
	<div id="menuF" class="default">
		<div class="container">
			<div class="row">
				<div class="logo col-md-4">
					<div>
						<h2 style="font-family: 'Roboto', sans-serif;
						font-family: 'Lato', sans-serif;
						font-family: 'Audiowide', cursive;">Paletes Brasília</h2>
					</div>
				</div>
				<div class="col-md-8">
					<div class="navmenu"style="text-align: center;">
						<ul id="menu">
							<li class="active" ><a href="#home">Home</a></li>
							<li><a href="#about">Sobre Nos</a></li>
							<li><a href="#project">Projetos</a></li>							
							<li><a href="#orcamento">Orçamento</a></li>
							<li><a href="/login">Login</a></li>
							
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row wrap">
				<div class="col-md-12 gallery"> 
						
						<div class="camera_wrap camera_white_skin" id="camera_wrap_1">
						@foreach ( $principais as $principal)
							<div data-thumb="" data-src='{{ asset("storage/principal/{$principal->imagem}")}}'>
								<div class="img-responsive camera_caption fadeFromBottom"     style="margin-left: 50px;">
									<img src='{{ asset("storage/principal/{$principal->imagem}")}}' style="margin-top:-100px; width:70%; margin-lef:100px; position:relative;">
								</div>
							</div>
						@endforeach
							<!--<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>We discuss.</h2>
								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>We develop.</h2>
								</div>
							</div>-->
						</div><!-- #camera_wrap_1 -->
				</div>
			</div>
		</div>
	</div>


	<div class="container">
			<div class="row">
				<br>
				<br>
				<br>
				<p style="font-family: 'Noto Serif SC', serif; text-align: justify;">&nbsp;&nbsp;&nbsp;A Paletes Brasília é uma empresa familiar que fabrica móveis personalizados feitos de
					paletes e outras madeiras reutilizáveis. Nosso objetivo é conscientizar outras pessoas
					sobre o potencial econômico que se pode obter com uso sustentável dos recursos naturais
					através do reuso e da reciclagem de materiais, no nosso caso madeiras. Para isso
					utilizamos as redes sociais como plataforma de divulgação dos nossos trabalhos e 
					também de outras boas ideias com o mesmo princípio, a sustentabilidade. 
					O sistema pode nos ajudar facilitando a administração da empresa, contribuindo para a 
					agilidade no setor de vendas e proporcionando uma visão mais clara dos clientes sobre 
					os móveis disponíveis
				</p>
			</div>
		</div>		