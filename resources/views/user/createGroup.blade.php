@extends('layouts.app')
@section('content')
@include('inc.userNavbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Group Form') }}</div>
                <div class="card-body">
                    <form method="post" action="{{route('user.store')}}" id="dynamic_form">
                        @csrf
                        Name: <input type="text" name="name" value={{old('name')}}> {{$errors->first('name')}}<br>
                        Title: <input type="text" name="title" value={{old('title')}}>{{$errors->first('title')}} <br>
                        phoneNumber: <input type="text" name="phoneNumber" value={{old('phoneNumber')}}>{{$errors->first('phoneNumber')}} <br>
                        description: <input type="text" name="description" value={{old('description')}}>{{$errors->first('description')}} <br>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"name="save" id="save" value="Save" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @foreach ($errors as $error)
                        {{$error}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
