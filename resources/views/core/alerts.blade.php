@if ($errors->has('valide'))
    <div class="alert alert-danger">
        <ul>
                <li><strong>{{ $errors->first('valide') }}</strong></li>
        </ul>
    </div>
@endif
@if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{session('mensagem')}}</p>
    </div>
@endif


