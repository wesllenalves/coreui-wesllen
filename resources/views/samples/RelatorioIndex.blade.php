<?php
          $aquivo = '<table  class="table table-responsive table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Produto</th>                
               
                                
                <th>Data da Entrega</th>
                <th>Status</th>
                <th>Gastos</th>
                <th>Valor Total</th>
                
                <th></th>
              </tr>
            </thead>
            <tbody>
             
            
            </tbody>
          </table>
        </div>         
          
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>';?>

 <?php 
                use Mpdf\Mpdf;
                 $mpdf = new Mpdf();

                 $mpdf->Output($aquivo, 'I');
                ?>