
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
  @foreach( $galerias as $galeria)

        <div class="col-sm-5 col-md-3">
            <div class="thumbnail">
                <h4>
                    Post Thumbnail List                    
                </h4>
                <img class="img-fluid" src="{{ asset('images/projetos')}}{{$galeria->imagem}}" alt="..."  style="height:210px;">
                <span href="#" class="btn btn-primary col-xs-12" >R$:00,00</span>
                <div class="clearfix"></div>
            </div>
        </div>

   @endforeach 


   <div class="col-sm-5 col-md-3">
            <div class="thumbnail">
                <h4>
                    Camas                    
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/img1.jpg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="lbox" id="cama">
        <div class="box_img">
            <a href="" class="but" id="prev">&#171;</a>
            <a href="#project" class="but" id="close">X</a>
            <img  class="img" src="{{ asset('images/projetos/img1.jpg')}}">
            <a href="#img2" class="but" id="next">&#187</a>
        </div>
    </div>

    <div class="lbox" id="img2">
        <div class="box_img">
            <a href="#cama" class="but" id="prev">&#171;</a>
            <a href="#project" class="but" id="close">X</a>
            <img class="img" src="{{ asset('images/projetos/img2.jpg')}}">
            <a href="" class="but" id="next">&#187</a>
        </div>
    </div>
</div>
</div>