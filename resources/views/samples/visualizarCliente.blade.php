@extends('dashboard')
@section('content')
<div class="container-fluid">
<div class="animated fadeIn">

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Combined All Table
        </div>
        <div class="card-body">
          <table class="table table-responsive-sm table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Detalhes</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                  
              
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->perfil}}</td>
                <td>
                    <label class="switch switch-text-editar switch-info">
                        <input type="checkbox" class="switch-input" checked="" onclick="clicar('menu_cliente');">
                        <span class="switch-label" data-on="Editar" data-off="Off"></span>
                        <span class="switch-handle"></span>
                    </label>
                </td>                
              </tr>
              @endforeach
              
            </tbody>
          </table>
          <div id="menu_cliente" style="display:none;">
                   <input type="text" name="teste" value="text">
                   <input type="text" name="teste" value="text">
                </div>
          <nav>
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Prev</a></li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection