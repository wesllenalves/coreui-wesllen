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
                <td style="width:25%;">

                    <a href="/sample/cliente/visualizar/{{$user->id}}"><button type="button" class="btn-sm btn-success">Mais Detalhes</button></a>
                    <a href="/sample/cliente/clienteEditar/{{$user->id}}"><button type="button" class="btn-sm btn-primary">Editar</button></a>
                    <a href="/sample/cliente/deletar/{{$user->id}}"><button type="button" class="btn-sm btn-danger">Remover</button></a>
                    
                </td>                
              </tr>
              @endforeach
              
            </tbody>
          </table>
          
          
          <nav>
            {!! $users->render("pagination::bootstrap-4") !!}            
          </nav>
          
        </div>
        
      </div>
    </div>
    <!--/.col-->
  </div>

</div>

</div>

@endsection