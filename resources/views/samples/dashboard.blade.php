@extends('dashboard')
@section('content')
<div class="container">
  <div class="animated fadeIn">
  <div class="col-md-12">
  <div class="row">    
      <div class="col-sm-6 col-md-3">
          <div class="card text-white bg-info">
            <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                <i class="icon-people"></i>
              </div>
              <div class="h4 mb-0">{{$usuario}}</div>
              <small class="text-muted text-uppercase font-weight-bold">Clientes Cadastrado</small>
              <div class="progress progress-white progress-xs mt-3">
                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <!--/.col-->
        <div class="col-sm-6 col-md-3">
          <div class="card text-white bg-warning">
            <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                <i class="icon-basket-loaded"></i>
              </div>
              <div class="h4 mb-0">{{$produtos}}</div>
              <small class="text-muted text-uppercase font-weight-bold">Produtos Cadastrados</small>
              <div class="progress progress-white progress-xs mt-3">
                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <!--/.col-->
        <div class="col-sm-6 col-md-3">
          <div class="card text-white bg-primary">
            <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                <i class="icon-pie-chart"></i>
              </div>
              <div class="h4 mb-0">{{$compras}}</div>
              <small class="text-muted text-uppercase font-weight-bold">Comprars Fechadas</small>
              <div class="progress progress-white progress-xs mt-3">
                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <!--/.col-->
        <div class="col-sm-6 col-md-3">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-speedometer"></i>
          </div>
          <div class="h4 mb-0">{{$orcamentos}}</div>
          <small class="text-muted text-uppercase font-weight-bold">Orçamento Abertos</small>
          <div class="progress progress-white progress-xs mt-3">
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
      </div>
  </div>
  </div>
</div>
<script src="{{ asset('js/views/charts.js') }}"></script>
<script src="{{ asset('js/views/widgets.js') }}"></script>

@endsection
