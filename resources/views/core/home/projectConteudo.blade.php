
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
  

     


   <div class="col-sm-5 col-md-3">
            <div class="thumbnail">
                <h4>
                    Camas                    
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/img1.jpg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
            <div class="thumbnail">
                <h4>
                    Camas  2                  
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/img1.jpg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>  
    
    <div class="lbox" id="cama">
        <div class="box_img">
            <a href="#img3" class="but" id="prev">&#171;</a>
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
            <a href="#img3" class="but" id="next">&#187</a>
        </div>
    </div>
    <div class="lbox" id="img3">
        <div class="box_img">
            <a href="#img2" class="but" id="prev">&#171;</a>
            <a href="#project" class="but" id="close">X</a>
            <img class="img" src="{{ asset('images/projetos/img3.jpg')}}">
            <a href="#cama" class="but" id="next">&#187</a>
        </div>

                    <?php 

            for($i=1; $i<4; $i++){
            ?>
            <div class="lbox" id="cama2">
                <div class="box_img">
                    <a href="<?php if($i!=3) echo $i+1;
                    else $i; ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <img  class="img" src="{{ asset('images/projetos/img<?php echo $i;?>.jpg')}}">
                    <a href="<?php if($i!=3) echo $i+1;
                    else $i; ?>" class="but" id="next">&#187</a>
                </div>
            </div>
            <?php
            }
            ?>

    </div>
</div>
</div>