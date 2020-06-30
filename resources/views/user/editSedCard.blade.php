@extends('layouts.app')
@section('content')
@include('inc.userNavbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Owner SedCard information') }}</div>
              
                <div class="card-body">
                    <form method="post" action="{{route('sedcard.update',['id' => $sedcard->id])}}">
                        @csrf
                        Name: <input type="text" name="name" value="{{$sedcard->name}}"> {{$errors->first('name')}}<br>
                        Title: <input type="text" name="title" value="{{$sedcard->title}}">{{$errors->first('title')}} <br>
                        Language:
                        <select name="language" required>  
                            <option selected="selected" value='{{$sedcard_language->name}}'>{{$sedcard_language->name}}</option>
                            @if ($languages !=null)
                                @foreach($languages as $language)
                                    @if ($sedcard_language->name== $language->name )
                                        
                                    @else
                                    <option value="{{ $language->name }}">{{ $language->name }}</option> 
                                    @endif
                                @endforeach
                            @endif
                        </select>{{$errors->first('language')}}<br>
                        DateOFBirth: <input type="date"id="dob" name="dob" value="{{$sedcard->dateOfBirth}}" required autocomplete="dob" autofocus>
                        {{$errors->first('dob')}}<br>
                        Weight: <input type="text" name="weight"  value="{{$sedcard->weight}}" }}> pound {{$errors->first('weight')}}<br>
                        Tall: <input type="text" name="tall"  value="{{$sedcard->tall}}" > feet {{$errors->first('tall')}}<br>
                        Eye colour:
                        <select name="eyeColour" required>
                            <option selected="selected" value='{{$sedcard_eyeColor->name}}'>{{$sedcard_eyeColor->name}}</option>
                            @if ($colors !=null)
                                @foreach($colors as $color)
                                    @if ($sedcard_eyeColor->name== $color->name )
                                        
                                    @else
                                    <option value="{{ $color->name }}">{{ $color->name }}</option> 
                                    @endif
                                @endforeach
                            @endif
                        </select>{{$errors->first('eyeColour')}}<br>
                        Pubic hair:
                        <select name="pubichair" required>
                            <option selected="selected" value='{{$sedcard_pubichair->name}}'>{{$sedcard_pubichair->name}}</option>
                            @if ($pubichairs !=null)
                                    @foreach($pubichairs as $pubichair)
                                    @if ($sedcard_pubichair->name== $pubichair->name )
                                        
                                    @else
                                        <option value="{{$pubichair->name}}">{{$pubichair->name}}</option>
                                    @endif
                                    @endforeach
                                @endif
                        </select>{{$errors->first('pubichair')}}<br>
                        Hair length:
                        <select name="hairLength" required>scale
                            <option selected="selected" value='{{$sedcard_hairlength->name}}'>{{$sedcard_hairlength->name}}</option>
                            @if ($hairlengths !=null)
                            @foreach($hairlengths as $hairlength)
                                @if ($sedcard_hairlength->name== $hairlength->name )        
                                @else
                                <option value="{{$hairlength->name}}">{{$hairlength->name}}</option>
                                @endif
                            @endforeach
                        @endif
                        </select>{{$errors->first('hairLength')}}<br>
                        Body hair
                        <select name="bodyhair" required>
                            <option selected="selected" value='{{$sedcard_bodyhair->name}}'>{{$sedcard_bodyhair->name}}</option>
                            @if ($bodyhairs !=null)
                            @foreach($bodyhairs as $bodyhair)
                                @if ($sedcard_bodyhair->name== $bodyhair->name )        
                                @else
                                <option value="{{$bodyhair->name}}">{{$bodyhair->name}}</option>
                                @endif
                            @endforeach
                        @endif
                        </select>{{$errors->first('bodyhair')}}<br>
                        Skin color:
                        <select name="skinColour" required>
                            <option selected="selected" value='{{$sedcard_skinColor->name}}'>{{$sedcard_skinColor->name}}</option>
                            @if ($colors !=null)
                            @foreach($colors as $color)
                                @if ($sedcard_skinColor->name== $color->name )        
                                @else
                                <option value="{{$color->name}}">{{$color->name}}</option>
                                @endif
                            @endforeach
                        @endif
                        </select>{{$errors->first('skinColour')}}<br>
                        Hair color:
                        <select name="hairColour" required>
                            <option selected="selected" value='{{$sedcard_hairColor->name}}'>{{$sedcard_hairColor->name}}</option>
                            @if ($colors !=null)
                            @foreach($colors as $color)
                                @if ($sedcard_hairColor->name== $color->name )        
                                @else
                                <option value="{{$color->name}}">{{$color->name}}</option>
                                @endif
                            @endforeach
                        @endif
                        </select>{{$errors->first('hairColour')}}<br>
                        Bra size:
                        <select name="brasize" required>
                            <option selected="selected" value='{{$sedcard_brasize->name}}'>{{$sedcard_brasize->name}}</option>
                            @if ($brasizes !=null)
                                @foreach($brasizes as $brasize)
                                    @if ($sedcard_brasize->name== $brasize->name )        
                                    @else
                                    <option value="{{$brasize->name}}">{{$brasize->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>{{$errors->first('brasize')}}<br>

                        Has in time Piercings ?
                        @if ($sedcard->hasInTimePiercing=='yes')
                        <input type="radio" name="inTimePiercings" checked="checked" value="yes">
                        <label>yes</label>
                        <input type="radio" name="inTimePiercings"  value="no">
                        <label>no</label> 
                        @else
                        <input type="radio" name="inTimePiercings"  value="yes">
                        <label>yes</label> 
                        <input type="radio" name="inTimePiercings" checked="checked" value="no">
                        <label>no</label> 
                        @endif
                        {{$errors->first('inTimePiercings')}}<br>

                        Phone: <input type="text" name="phoneNumber" value='{{$sedcard->phoneNumber}}' > {{$errors->first('phoneNumber')}}<br>
                        
                        Tattoo Count: <input type="text" name="tattooCount" value='{{$sedcard->tattoCount}}'> {{$errors->first('tattooCount')}}<br>
                       
                        Piercings Count: <input type="text" name="piercingsCount" value='{{$sedcard->peircingsCount}}'>{{$errors->first('piercingsCount')}}<br>
                        
                        Does Smoking ?
                        @if ($sedcard->isSomking=='yes')
                        <input type="radio" name="somking" checked="checked" value="yes">
                        <label>yes</label>
                        <input type="radio" name="somking"  value="no">
                        <label>no</label> 
                        @else
                        <input type="radio" name="somking"  value="yes">
                        <label>yes</label> 
                        <input type="radio" name="somking" checked="checked" value="no">
                        <label>no</label> 
                        @endif
                        {{$errors->first('somking')}}<br>

                        Does Drinking ?
                        @if ($sedcard->isDrinking=='yes')
                        <input type="radio" name="drinking" checked="checked" value="yes">
                        <label>yes</label>
                        <input type="radio" name="drinking"  value="no">
                        <label>no</label> 
                        @else
                        <input type="radio" name="drinking"  value="yes">
                        <label>yes</label> 
                        <input type="radio" name="drinking" checked="checked" value="no">
                        <label>no</label> 
                        @endif
                        {{$errors->first('drinking')}}<br>
                      
                        Is Devote ?
                        @if ($sedcard->isDevote=='yes')
                        <input type="radio" name="devote" checked="checked" value="yes">
                        <label>yes</label>
                        <input type="radio" name="devote"  value="no">
                        <label>no</label> 
                        @else
                        <input type="radio" name="devote"  value="yes">
                        <label>yes</label> 
                        <input type="radio" name="devote" checked="checked" value="no">
                        <label>no</label> 
                        @endif
                        {{$errors->first('devote')}}<br>
                       
                        Is Dominant ?
                        @if ($sedcard->isDominant=='yes')
                        <input type="radio" name="dominant" checked="checked" value="yes">
                        <label>yes</label>
                        <input type="radio" name="dominant"  value="no">
                        <label>no</label> 
                        @else
                        <input type="radio" name="dominant"  value="yes">
                        <label>yes</label> 
                        <input type="radio" name="dominant" checked="checked" value="no">
                        <label>no</label> 
                        @endif
                       {{$errors->first('dominant')}}<br>
                       
                       Price description: <input type="text" name="priceDescription" value='{{$sedcard->priceDescription}}'> {{$errors->first('priceDescription')}}<br>
                       Service Time
                        <div class="table-responsive">
                             <table class="table table-bordered table-striped" id="user_table">
                           <thead>
                           </thead>
                           <tbody>
                            <select name="skinColour" required>
                                <option selected="selected" value='{{$sedcard_skinColor->name}}'>{{$sedcard_skinColor->name}}</option>
                                @if ($colors !=null)
                                @foreach($colors as $color)
                                    @if ($sedcard_skinColor->name== $color->name )        
                                    @else
                                    <option value="{{$color->name}}">{{$color->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                            </select>{{$errors->first('skinColour')}}<br>
                           </tbody>
                           <tfoot>
                            <tr>
                                            <td colspan="2" align="right">&nbsp;</td>
                                            <td>
                              
                             </td>
                            </tr>
                           </tfoot>
                       </table>
                        </div>
                       Availability description: <input type="text" name="availabilityDescription" value='{{$sedcard->availabilityDescription}}'> {{$errors->first('availabilityDescription')}}<br>
                      
                       Phone description: <input type="text" name="phoneDescription" value='{{$sedcard->phoneDescription}}'> {{$errors->first('phoneDescription')}}<br>
                      
                       SedCard Description: <input type="text" name="sedcarddescription" value='{{$sedcard->description}}' }}> <br>
                       
                        @if ($address!=null)
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                City:<select name="city" required>
                                    <option selected="selected" value='{{$address->city}} ?? "" '>{{$address->city}}</option>
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

                                Address Description<input type="text" name="description"  value="{{$address->description}}"><br>
                                {{$errors->first('description')}}

                                Location name: <input type="text" name="locationName" value="{{$location->name}}"}}> {{$errors->first('locationName')}}
                                Location title: : <input type="text" name="locationTitle" value="{{$location->title}}">{{$errors->first('locationTitle')}} 
                                location Description: <input type="text" name="locationdescription" value="{{$location->description}}" }}> 
                                {{$errors->first('locationdescription')}}<br>


                            </div>
                        </div>   
                        @endif
                          
                        Active status
                        @if ($sedcard->isActive=='yes')
                        <input type="radio" name="active" checked="checked" value="yes">
                        <label>yes</label>
                        <input type="radio" name="active"  value="no">
                        <label>no</label> 
                        @else
                        <input type="radio" name="active"  value="yes">
                        <label>yes</label> 
                        <input type="radio" name="active" checked="checked" value="no">
                        <label>no</label> 
                        @endif
                       
                        {{$errors->first('active')}}<br>
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
<script>
    $(document).ready(function(){
    
     var count = 0;
    
     dynamic_field(count);
    
     function dynamic_field(number)
     {
      html = '<tr>';
            html += '<td><select name="day[]" required ><option disabled="disabled" selected="selected">Days</option>@foreach($days as $day)<option value="{{$day->name}}">{{$day->name}}</option>@endforeach</td>';
            html += '<td><select name="from[]" required ><option disabled="disabled" selected="selected">From</option>@foreach($times as $time)<option value="{{$time->name}}">{{$time->name}}</option>@endforeach</td>';
            html += '<td><select name="to[]" required ><option disabled="disabled" selected="selected">To</option>@foreach($times as $time)<option value="{{$time->name}}">{{$time->name}}</option>@endforeach</td>';
            if(number > 0)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            }
            else
            {   
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>';
                html += '<td><input type="checkbox" id="everyday" name="everyday" value="everyday"><label for="everyday"> Check if you want  enable it for everyday</label></td></tr>';

                $('tbody').html(html);
                
                
            }
     }
    
     $(document).on('click', '#add', function(){
      count++;
      dynamic_field(count);
     });
    
     $(document).on('click', '.remove', function(){
      count--;
      $(this).closest("tr").remove();
     });
    
    });
    </script>
@endsection
