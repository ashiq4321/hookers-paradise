@extends('layouts.app')
@section('content')
<br>
            <b>Name:</b> {{$sedcard->name}}<br>
            <b>Title:</b>  {{$sedcard->title}} <br>
            <b>DateOFBirth:</b>{{$sedcard->dateOfBirth}}
            <b>Weight:</b>{{$sedcard->weight}}<br>
            <b>Tall:</b> {{$sedcard->tall}}<br>
            <b>Eye colour:</b>{{$sedcard_eyeColor->name}}<br>
            <b>Pubic hair:</b>{{$sedcard_pubichair->name}}<br>
            <b>Hair length:</b>{{$sedcard_hairlength->name}}<br>
            <b>Body hair:</b>{{$sedcard_bodyhair->name}}<br>
            <b>Skin color:</b>{{$sedcard_skinColor->name}}<br>
            <b>Hair color:</b>$sedcard_hairColor->name}}<br>
            <b>Bra size:</b>{{$sedcard_brasize->name}}<br>
            {{$sedcard->hasInTimePiercing}} in time Piercings<br>
            <b>Phone:</b> {{$sedcard->phoneNumber}}<br>
            <b>Tattoo Count:</b> {{$sedcard->tattoCount}}<br>
            <b>Piercings Count:</b> {{$sedcard->peircingsCount}}<br>
            <b>Smoking:</b> {{$sedcard->isSomking }}<br>
            <b>Drinking :</b> {{$sedcard->isDrinking}}<br>
            <b>Devote: </b>{{$sedcard->isDevote}}<br>
            <b>Dominant:</b>{{$sedcard->isDominant}}<br>
            
            <b>Price description:</b>{{$sedcard->priceDescription}}<br>
            
            <b>Availability description:</b>{{$sedcard->availabilityDescription}}<br>
            
            <b>Phone description:</b>{{$sedcard->phoneDescription}}<br>
            
            <b>SedCard Description:</b> {{$sedcard->description}}<br>
            
            @if ($address!=null)
            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right"><b>{{ __('Address') }}</b></label>

                <div class="col-md-6">
                    <b>City:</b>{{$address->city}} |

                    <b>Country:</b>{{$address->country}}| 

                    <b>PostCode:</b>{{$address->postCode}}|

                    <b>Street:</b>{{$address->street}}|

                    <b>House:</b>{{$address->house}}|

                    <b>Address Description:</b>{{$address->description}}<br>

                    <b>Location name:</b> {{$location->name}}|
                    <b>Location title:</b>  {{$location->title}}|
                    <b>location Description:</b> {{$location->description}}<br>


                </div>
            </div>   
            @endif
                
            <b>Active status:</b> $sedcard->isActive
            
                       
@endsection