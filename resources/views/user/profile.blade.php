@extends('layouts.app')
@section('content')
@include('inc.userNavbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form method="post" action="/user/{Auth::user()->id}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

                                {{$errors->first('name')}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"  name="email" value="{{Auth::user()->email}}" required autocomplete="email">

                                {{$errors->first('email')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phoneNumber" type="text"  name="phoneNumber" value="{{Auth::user()->phoneNumber}}"  autocomplete="phoneNumber" autofocus>

                                {{$errors->first('phoneNumber')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input type="date"id="dob" name="dob" value="{{Auth::user()->dateOfBirth}}" required autocomplete="dob" autofocus>
                                {{$errors->first('dob')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Language') }}</label>

                            <div class="col-md-6">
                                    <select name="language" required>
                                        @if ($user_language==null)  
                                            @foreach($languages as $language)
                                                <option value="{{$language->name}}">{{$language->name}}</option>
                                            @endforeach
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                        @else 
                                            @foreach($languages as $language)
                                            @if ($user_language->name== $language->name )
                                            <option selected='selected'value="{{ $language->name }}">{{ $language->name }}</option> 
                                                
                                            @else
                                            <option value="{{ $language->name }}">{{ $language->name }}</option> 
                                            @endif
                                            @endforeach 
                                        @endif
                                            
                                    </select>{{$errors->first('language')}}<br>
                                </select>
                                {{$errors->first('language')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                City:<select name="city" required>
                                    <option selected="selected" value='{{$address->city}}'>{{$address->city}}</option>
                                    <option value="Traun">Traun</option>
                                    <option value="Bregenz">Bregenz</option>
                                </select>
                                {{$errors->first('city')}}

                                Country<select name="country" required>
                                    <option selected="selected" value='{{$address->country}}'>{{$address->country}}</option>
                                    <option value="Ausrtia">Ausrtia</option>
                                    <option value="England">England</option>
                                </select>
                                {{$errors->first('country')}}

                                PostCode<input type="text" name="postCode" required value="{{$address->postCode}}" >
                                {{$errors->first('postCode')}}

                                Street<input type="text" name="street" required value="{{$address->street}}" >
                                {{$errors->first('street')}}

                                House<input type="text" name="house" required value="{{$address->house}}" >
                                {{$errors->first('house')}}

                                Description<input type="text" name="description"  value="{{$address->description}}"><br>
                                {{$errors->first('description')}}


                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        @method('PATCH')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
