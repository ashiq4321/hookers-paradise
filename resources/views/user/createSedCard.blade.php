@extends('layouts.app')
@include('layouts.userNavbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('SedCard Form') }}</div>
                <div class="card-body">
                    <form method="post" action="{{route('sedcard.created')}}">
                        @csrf
                        Name: <input type="text" name="name" value={{old('name')}}> {{$errors->first('name')}}<br>
                        Title: <input type="text" name="title" value={{old('title')}}>{{$errors->first('title')}} <br>
                        DateOFBirth: <input type="date"id="dob" name="dob" value={{old('dateOfBirth')}}value="{{Auth::user()->dateOfBirth}}" required autocomplete="dob" autofocus>
                        {{$errors->first('dob')}}<br>
                        Language:
                        <select name="language" required>  
                        <option disabled="disabled" selected="selected">Choose option</option> 
                            @if ($languages !=null)
                                @foreach($languages as $language)
                                    <option value="{{ $language->name }}">{{ $language->name }}</option>
                                @endforeach
                            @endif
                        </select>{{$errors->first('language')}}<br>
                        Weight: <input type="text" name="weight"  value={{old('weight') }}> pound {{$errors->first('weight')}}<br>
                        Tall: <input type="text" name="tall"  value={{old('tall')}} > feet {{$errors->first('tall')}}<br>
                        Eye colour:
                        <select name="eyeColour" required>  
                        <option disabled="disabled" selected="selected">Choose option</option> 
                            @if ($colors !=null)
                                @foreach($colors as $color)
                                    <option value="{{ $color->name }}">{{ $color->name }}</option>
                                @endforeach
                            @endif
                        </select>{{$errors->first('eyeColour')}}<br>
                        Pubic hair:
                        <select name="pubichair" required>
                                @if ($pubichairs !=null)
                                    @foreach($pubichairs as $pubichair)
                                        <option value="{{$pubichair->name}}">{{$pubichair->name}}</option>
                                    @endforeach
                                @endif
                                <option disabled="disabled" selected="selected">Choose option</option>
                        </select>{{$errors->first('pubichair')}}<br>
                        Hair length:
                        <select name="hairLength" required>scale
                            @if ($hairlengths !=null)
                                @foreach($hairlengths as $hairlength)
                                    <option value="{{$hairlength->name}}">{{$hairlength->name}}</option>
                                @endforeach
                            @endif
                        <option disabled="disabled" selected="selected">Choose option</option>
                        </select>{{$errors->first('hairLength')}}<br>
                        Body hair
                        <select name="bodyhair" required>
                            @if ($bodyhairs !=null)
                            @foreach($bodyhairs as $bodyhair)
                                <option value="{{$bodyhair->name}}">{{$bodyhair->name}}</option>
                            @endforeach
                        @endif
                        <option disabled="disabled" selected="selected">Choose option</option>
                        </select>{{$errors->first('bodyhair')}}<br>
                        Skin color:
                        <select name="skinColour" required>
                            @if ($colors !=null)
                                @foreach($colors as $color)
                                    <option value="{{$color->name}}">{{$color->name}}</option>
                                @endforeach
                            @endif
                            <option disabled="disabled" selected="selected">Choose option</option>
                        </select>{{$errors->first('skinColour')}}<br>
                        Hair color:
                        <select name="hairColour" required>
                            @if ($colors !=null)
                                @foreach($colors as $color)
                                    <option value="{{$color->name}}">{{$color->name}}</option>
                                @endforeach
                            @endif
                            <option disabled="disabled" selected="selected">Choose option</option>
                        </select>{{$errors->first('hairColour')}}<br>
                        Bra size:
                        <select name="brasize" required>
                            @if ($brasizes !=null)
                                @foreach($brasizes as $brasize)
                                    <option value="{{$brasize->name}}">{{$brasize->name}}</option>
                                @endforeach
                            @endif
                            <option disabled="disabled" selected="selected">Choose option</option>
                        </select>{{$errors->first('brasize')}}<br>
                        Has in time Piercings ?
                            <input type="radio" name="inTimePiercings" value="yes">
                            <label>yes</label>
                            <input type="radio" name="inTimePiercings" value="no">
                            <label>no</label>
                            {{$errors->first('inTimePiercings')}}<br>
                        Phone: <input type="text" name="phoneNumber" value={{old('phoneNumber')}}> {{$errors->first('phoneNumber')}}<br>
                        Tattoo Count: <input type="text" name="tattooCount"  value={{old('tattooCount')}}> {{$errors->first('tattooCount')}}<br>
                        Piercings Count: <input type="text" name="piercingsCount" value={{old('piercingsCount')}}>{{$errors->first('piercingsCount')}}<br>
                        Does Smoking ?
                        <input type="radio" name="somking" value="yes">
                        <label>yes</label>
                        <input type="radio" name="somking" value="no">
                        <label>no</label>
                        {{$errors->first('somking')}}<br>
                        Does Drinking ?
                        <input type="radio" name="drinking" value="yes">
                        <label>yes</label>
                        <input type="radio" name="drinking" value="no">
                        <label>no</label>
                        {{$errors->first('drinking')}}<br>
                        Is Devote ?
                        <input type="radio" name="devote" value="yes">
                        <label>yes</label>
                        <input type="radio" name="devote" value="no">
                        <label>no</label>
                        {{$errors->first('devote')}}<br>
                        Is Dominant ?
                        <input type="radio" name="dominant" value="yes">
                        <label>yes</label>
                        <input type="radio" name="dominant" value="no">
                        <label>no</label>
                        {{$errors->first('dominant')}}<br>
                        Price description: <input type="text" name="priceDescription" value={{old('priceDescription')}}> {{$errors->first('priceDescription')}}<br>
                        Availability description: <input type="text" name="availabilityDescription" value={{old('availabilityDescription')}} > {{$errors->first('availabilityDescription')}}<br>
                        Phone description: <input type="text" name="phoneDescription" value={{old('phoneDescription')}}> {{$errors->first('phoneDescription')}}<br>
                        SedCard Description: <input type="text" name="sedcarddescription" value={{old('sedcarddescription') }}> <br>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                City:<select name="city" required>
                                   <option disabled="disabled" selected="selected">Choose option</option>
                                   <option value="Traun">Traun</option>
                                    <option value="Bregenz">Bregenz</option>
                                </select>
                                {{$errors->first('city')}}

                                Country<select name="country" required>
                                   <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="Ausrtia">Ausrtia</option>
                                    <option value="England">England</option>
                                </select>
                                {{$errors->first('country')}}
                                PostCode<input type="text" name="postCode" required value={{old('postCode')}} >
                                {{$errors->first('postCode')}}

                                Street<input type="text" name="street" required value={{old('street')}} >
                                {{$errors->first('street')}}

                                House<input type="text" name="house" required value={{old('house')}} >
                                {{$errors->first('house')}}

                                Address Description<input type="text" name="description"  value={{old('description')}}><br>
                                {{$errors->first('description')}}<br>
                                Location name: <input type="text" name="locationName" value={{old('locationName')}}> {{$errors->first('locationName')}}
                                Location title: : <input type="text" name="locationTitle" value={{old('locationTitle')}}>{{$errors->first('locationTitle')}} 
                                location Description: <input type="text" name="locationdescription" value={{old('locationdescription') }}> 
                                {{$errors->first('locationdescription')}}<br>
                                
                            </div>
                        </div>
                        Is verified ?
                        <input type="radio" name="verified" value="yes">
                        <label>yes</label>
                        <input type="radio" name="verified" value="no">
                        <label>no</label>
                        {{$errors->first('verified')}}<br>
                        Is phone verified ?
                        <input type="radio" name="phoneVerified" value="yes">
                        <label>yes</label>
                        <input type="radio" name="phoneVerified" value="no">
                        <label>no</label>
                        {{$errors->first('phoneVerified')}}<br>
                        Is Active?
                        <input type="radio" name="active" value="yes">
                        <label>yes</label>
                        <input type="radio" name="active" value="no">
                        <label>no</label>
                        {{$errors->first('active')}}<br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
