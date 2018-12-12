<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><h5 style="font-size:20px;  font-family:Impact, Charcoal, sans-serif">Paletes Brasília</h5></a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav d-md-down-none">
    <li class="nav-item px-3">
      <a class="nav-link" href="/"></a>
    </li>
{{-- 
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Users</a>
    </li>    
 --}}
  </ul>
  <ul class="nav navbar-nav ml-auto">    
    <li class="nav-item dropdown" style="margin-right:10px;">
      <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        @if (Auth::check())
          <img src="https://www.gravatar.com/avatar/{{md5(strtolower(trim(Auth::user()->email)))}}?s=160&d=retro" class="img-avatar" alt="{{ Auth::user()->email }}">
        @else
          <img src="{{ asset('img/avatars/6.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-right" >
        <div class="dropdown-header text-center">
          <strong>{{ auth()->user()->name }} Conta</strong>
        </div>
        
        <div class="divider"></div>
        
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i>
          Logout
        </a>
        {{-- <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-lock"                                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i> Logout</a> --}}
      </div>
    </li>
  </ul>  
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>
</header>
