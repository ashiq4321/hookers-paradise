@extends('layouts.app')
@section('content')
@include('inc.userNavbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Owner SedCard information') }}</div>
              
                <div class="card-body">
                    <form method="post" action="{{route('user.groupUpdate',['id' => $group->id])}}">
                        @csrf
                        Name: <input type="text" name="name" value="{{$group->name}}"> {{$errors->first('name')}}<br>
                        Title: <input type="text" name="title" value="{{$group->title}}">{{$errors->first('title')}} <br>
                        phoneNumber: <input type="text" name="phoneNumber" value="{{$group->phoneNumber}}">{{$errors->first('phoneNumber')}} <br>
                        description: <input type="text" name="description" value="{{$group->description}}">{{$errors->first('description')}} <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        @method('PATCH')
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
