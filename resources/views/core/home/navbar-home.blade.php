
<!--home start-->
    

    	<div class="headerLine">
	<div id="menuF" class="default">
		<div class="container">
			<div class="row">
				<div class="logo col-md-4">
					<div>
						<a href="#">
							<img src="images/logo.png">
						</a>
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
				<p>Em linguística, a noção de texto é ampla e ainda aberta a uma definição mais precisa. Grosso modo, pode ser entendido como manifestação linguística das ideias de um autor, que serão interpretadas pelo leitor de acordo com seus conhecimentos linguísticos e culturais. Seu tamanho é variável.

“Conjunto de palavras e frases articuladas, escritas sobre qualquer suporte”[1].

“Obra escrita considerada na sua redação original e autêntica (por oposição a sumário, tradução, notas, comentários, etc.)”[2].</p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12 cBusiness">
					<h3>The Best Way to Create Business Site &ndash; Attractive One Page</h3>
					<h4>Discover elegant solution for your online business fast, reliable, affordable.</h4>
				</div>
			</div>
		</div>