
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
                <a href="#areaexterna1"><img class="img-fluid" src="{{ asset('images/projetos/areaExterna/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#areaexterna1" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>

            <div class="thumbnail">
                <h4>
                    Banheiro                  
                </h4>
                <a href="#banheiro1"><img class="img-fluid" src="{{ asset('images/projetos/Banheiro/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#banheiro1" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>

            <div class="thumbnail">
                <h4>
                    Cozinha                 
                </h4>
                <a href="#cozinha1"><img class="img-fluid" src="{{ asset('images/projetos/Cozinha/img(1).jpg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cozinha1" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>

            <div class="thumbnail">
                <h4>
                    Decoração                  
                </h4>
                <a href="#decoracao1"><img class="img-fluid" src="{{ asset('images/projetos/Decoracao/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#decoracao" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>

            <div class="thumbnail">
                <h4>
                    Para Lojas                 
                </h4>
                <a href="#paralojas1"><img class="img-fluid" src="{{ asset('images/projetos/ParaLojas/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#paralojas" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
            <div class="thumbnail">
                <h4>
                    Quarto               
                </h4>
                <a href="#quarto1"><img class="img-fluid" src="{{ asset('images/projetos/Quarto/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#cama" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
            <div class="thumbnail">
                <h4>
                    Sala                
                </h4>
                <a href="#sala1"><img class="img-fluid" src="{{ asset('images/projetos/Sala/img(1).jpeg')}}" alt="..."  style="height:210px;"></a>
                <span href="#sala" class="btn btn-primary col-xs-12 disabled" >Clique na imagem para ver Mais</span>
                <div class="clearfix"></div>
            </div>
    </div>  
    
    

    <!-- Galeria Area Externa -->
            <?php 
            /*Quantidade de fotos */
            $q = 10;
            for($i=1; $i<$q; $i++){
            ?>
            <div class="lbox" id="areaexterna{{$i}}">
                <div class="controle-galeria">
                <div class="box_img">
                    <a href="#areaexterna<?php if($i === 1 ){ echo  $q - $i ; }elseif($i!=10 AND $i!=1){ echo $i-1;} ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <div class="imagem">
                    <img  class="img" src="{{ asset("images/projetos/areaExterna/img({$i}).jpeg")}}">
                    </div>
                    <a href="#areaexterna<?php if($i === 9) echo $q - $i;
                    elseif($i!=10) echo $i+1; ?>" class="but" id="next">&#187</a>
                </div>
                </div>
            </div>
            <?php
            }
            ?>

    <!-- Galeria Banheiro -->
            <?php 
            /*Quantidade de fotos */
            $q = 8;
            for($i=1; $i<$q; $i++){
            ?>
            <div class="lbox" id="banheiro{{$i}}">
                <div class="controle-galeria">
                <div class="box_img">
                    <a href="#banheiro<?php if($i === 1 ){ echo  $q - $i ; }elseif($i!=8 AND $i!=1){ echo $i-1;} ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <div class="imagem">
                    <img  class="img" src="{{ asset("images/projetos/banheiro/img({$i}).jpeg")}}">
                    </div>
                    <a href="#banheiro<?php if($i === 7) echo $q - $i;
                    elseif($i!=8) echo $i+1; ?>" class="but" id="next">&#187</a>
                </div>
                </div>
            </div>
            <?php
            }
            ?>

    <!-- Galeria Cozinha -->
            <?php 
            /*Quantidade de fotos */
            $q = 12;
            for($i=1; $i<$q; $i++){
            ?>
            <div class="lbox" id="cozinha{{$i}}">
                <div class="controle-galeria">
                <div class="box_img">
                    <a href="#cozinha<?php if($i === 1 ){ echo  $q - $i ; }elseif($i!=12 AND $i!=1){ echo $i-1;} ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <div class="imagem">
                    <img  class="img" src="{{ asset("images/projetos/Cozinha/img({$i}).jpg")}}">
                    </div>
                    <a href="#cozinha<?php if($i === 11) echo $q - $i;
                    elseif($i!=12) echo $i+1; ?>" class="but" id="next">&#187</a>
                </div>
                </div>
            </div>
            <?php
            }
            ?>

    <!-- Galeria Decoração -->
            <?php 
            /*Quantidade de fotos */
            $q = 26;
            for($i=1; $i<$q; $i++){
            ?>
            <div class="lbox" id="decoracao{{$i}}">
                <div class="controle-galeria">
                <div class="box_img">
                    <a href="#decoracao<?php if($i === 1 ){ echo  $q - $i ; }elseif($i!=26 AND $i!=1){ echo $i-1;} ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <div class="imagem">
                    <img  class="img" src="{{ asset("images/projetos/Decoracao/img({$i}).jpg")}}">
                    </div>
                    <a href="#decoracao<?php if($i === 25) echo $q - $i;
                    elseif($i!=26) echo $i+1; ?>" class="but" id="next">&#187</a>
                </div>
                </div>
            </div>
            <?php
            }
            ?>

    <!-- Galeria Para Lojas-->
            <?php 
            /*Quantidade de fotos */
            $q = 17;
            for($i=1; $i<$q; $i++){
            ?>
            <div class="lbox" id="paralojas{{$i}}">
                <div class="controle-galeria">
                <div class="box_img">
                    <a href="#paralojas<?php if($i === 1 ){ echo  $q - $i ; }elseif($i!=17 AND $i!=1){ echo $i-1;} ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <div class="imagem">
                    <img  class="img" src="{{ asset("images/projetos/ParaLojas/img({$i}).jpg")}}">
                    </div>
                    <a href="#paralojas<?php if($i === 16) echo $q - $i;
                    elseif($i!=17) echo $i+1; ?>" class="but" id="next">&#187</a>
                </div>
                </div>
            </div>
            <?php
            }
            ?>


    <!-- Galeria Quarto-->
            <?php 
            /*Quantidade de fotos */
            $q = 18;
            for($i=1; $i<$q; $i++){
            ?>
            <div class="lbox" id="quarto{{$i}}">
                <div class="controle-galeria">
                <div class="box_img">
                    <a href="#quarto<?php if($i === 1 ){ echo  $q - $i ; }elseif($i!=18 AND $i!=1){ echo $i-1;} ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <div class="imagem">
                    <img  class="img" src="{{ asset("images/projetos/Quarto/img({$i}).jpg")}}">
                    </div>
                    <a href="#quarto<?php if($i === 17) echo $q - $i;
                    elseif($i!=18) echo $i+1; ?>" class="but" id="next">&#187</a>
                </div>
                </div>
            </div>
            <?php
            }
            ?>

    <!-- Galeria Sala-->
            <?php 
            /*Quantidade de fotos */
            $q = 60;
            for($i=1; $i<$q; $i++){
            ?>
            <div class="lbox" id="sala{{$i}}">
                <div class="controle-galeria">
                <div class="box_img">
                    <a href="#sala<?php if($i === 1 ){ echo  $q - $i ; }elseif($i!=60 AND $i!=1){ echo $i-1;} ?>" class="but" id="prev">&#171;</a>
                    <a href="#project" class="but" id="close">X</a>
                    <div class="imagem">
                    <img  class="img" src="{{ asset("images/projetos/Sala/img({$i}).jpg")}}">
                    </div>
                    <a href="#sala<?php if($i === 59) echo $q - $i;
                    elseif($i!=60) echo $i+1; ?>" class="but" id="next">&#187</a>
                </div>
                </div>
            </div>
            <?php
            }
            ?>

    </div>
</div>
</div>