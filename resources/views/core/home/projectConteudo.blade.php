
<div class="line4">		
        <div class="container">
            <div class="row Ama">
                <div class="col-md-12" >
                <h3>Projetos Feitos</h3>
                <p>Uma pequena amostra de projetos já realizados</p>
                </div>
            </div>			
        </div>
</div>
				<br><br>
				<br><br>
				<div class="container">			
                <div class="col-sm-12" style="heigth:0px;padding:0;height: 800px;">
                <div class="row">
            <div class="thumbnail">
                <h4>
                    Area Externa                    
                </h4>
                <a href="#cama1"><img class="img-fluid" src="{{ asset('images/projetos/areaExterna/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>

            <div class="thumbnail">
                <h4>
                    Banheiro                  
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/Banheiro/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>

            <div class="thumbnail">
                <h4>
                    Cozinha                 
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/Cozinha/img(1).jpg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>

            <div class="thumbnail">
                <h4>
                    Decoração                  
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/Decoracao/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>

            <div class="thumbnail">
                <h4>
                    Para Lojas                 
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/ParaLojas/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
            <div class="thumbnail">
                <h4>
                    Quarto               
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/Quarto/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
            <div class="thumbnail">
                <h4>
                    Sala                
                </h4>
                <a href="#cama"><img class="img-fluid" src="{{ asset('images/projetos/Sala/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
    </div>  
    
    <!--div class="lbox" id="cama">
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
        </div-->

                    <?php 
            /*Quantidade de fotos */
            $q = 10;
            for($i=1; $i<$q; $i++){
            ?>
            <div class="lbox" id="cama{{$i}}">
                <div class="box_img">
                    <a href="#cama<?php if($i === 1 ){ echo  $q - $i ; }elseif($i!=4 AND $i!=1){ echo $i-1;} ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <img  class="img" src="{{ asset("images/projetos/areaExterna/img({$i}).jpeg")}}">
                    <a href="#cama<?php if($i === 9) echo $q - $i;
                    elseif($i!=10) echo $i+1; ?>" class="but" id="next">&#187</a>
                </div>
            </div>
            <?php
            }
            ?>

    </div>
</div>
</div>