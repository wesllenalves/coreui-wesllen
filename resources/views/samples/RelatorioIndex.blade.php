@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Financeiro
          
        </div>
        <div class="card-body">        
          <div id="dtHorizontalExample">
          <table  class="table table-responsive table-bordered table-striped table-sm">
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

</div>

@endsection