@extends('../layouts.app')
@include('../admin.layouts.adminNavbar')
@section('title')
    <h5>{{ __('Userinformation') }}</h5>
@endsection
@section('breadcrumbs')
    <a href="{{route('admin.')}}">{{__('Admincenter')}}</a> >
    <a href="{{route('admin.users.index')}}">{{__('Users')}}</a> >
    {{__('Userinformation')}}
@endsection
@section('content')
    <form method="POST" action="{{ route('admin.users.update', $user) }}" {{ $editable === true ? "" : "disabled" }}>
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" name="name" value="{{$user->name}}" required autocomplete="name" autofocus {{ $editable === true ? "" : "disabled" }}>

                {{$errors->first('name')}}
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email"  name="email" value="{{$user->email}}" required autocomplete="email" {{ $editable === true ? "" : "disabled" }}>

                {{$errors->first('email')}}
            </div>
        </div>
        <div class="form-group row">
            <label for="phoneNumber" class="col-md-5 col-form-label text-md-right">{{ __('Phone') }}</label>

            <div class="col-md-6">
                <input id="phoneNumber" type="text"  name="phoneNumber" value="{{$user->phoneNumber}}"  autocomplete="phoneNumber" autofocus {{ $editable === true ? "" : "disabled" }}>

                {{$errors->first('phoneNumber')}}
            </div>
        </div>
        <div class="form-group row">
            <label for="dob" class="col-md-5 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

            <div class="col-md-6">
                <input type="date"id="dob" name="dob" value="{{$user->dateOfBirth}}" required autocomplete="dob" autofocus {{ $editable === true ? "" : "disabled" }}>
                {{$errors->first('dob')}}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right">{{ __('Roles') }}</label>

            <div class="col-md-6">
            @foreach($roles as $role)
                <div class="form-check">
                    <input id="role_{{$role->id}}" type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $editable === true ? "" : "disabled" }}
                    @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                    <label for="role_{{$role->id}}">{{ $role->name }}</label>
                </div>
            @endforeach
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-12 offset-md-5">
                <a href="{{ URL::previous() }}">
                    <button type="button" class="btn btn-danger">
                        {{ __('Back') }}
                    </button>
                </a>
                @if ($editable === true)
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                    @method('PATCH')
                @endif
            </div>
        </div>
    </form>

@endsection
