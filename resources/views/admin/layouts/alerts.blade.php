@if( Request::is('HPAC*'))
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <h5>{{__('Success')}}</h5>
            {{ session('success') }}
        </div>
    @endif
    @if(session('warning'))
        <h5>{{__('Warning')}}</h5>
        <div class="alert alert-warning" role="alert">
            {{ session('warning') }}
        </div>
    @endif
    @if(session('errors'))
        <div class="alert alert-danger" role="alert">
            <h5>{{__('Error')}}</h5>
            <ul>
            @foreach(session('errors')->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
@endif
