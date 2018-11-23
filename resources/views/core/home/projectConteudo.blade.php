
<div class="line4">		
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h3>Projetos Feitos</h3>
					<p>Uma pequena amostra de projetos já realizados</p>
					</div>
				</div>
			
</div>
				</div>
				<br><br>
				<div class="container">			
  <div class="col-sm-12">
  <div class="row">
  @foreach( $projetos as $projeto)

        <div class="col-sm-5 col-md-3">
            <div class="thumbnail">
                <h4>
                    Post Thumbnail List                    
                </h4>
                <img class="img-fluid" src="{{ asset('images/projetos')}}{{$projeto->imagem}}" alt="..."  style="height:210px;">
                <span href="#" class="btn btn-primary col-xs-12" >R$:00,00</span>
                <div class="clearfix"></div>
            </div>
        </div>

   @endforeach     
        
    </div>
</div>
</div>