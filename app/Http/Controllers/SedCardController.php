<?php

namespace App\Http\Controllers;

use DB;

use App\SedCard;
use App\User;
use App\Location;
use App\Language;
use App\Address;
use App\Color;
use App\PubicHair;
use App\HairLength;
use App\BraSize;
use App\BodyHair;
use App\SedCardLanguage;
use App\SedcardAvailability;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SedCardController extends Controller
{
    public function listSedCard()
    { 
        $id =  Auth::user()->id;
        $sedcards = DB::table('sedcards')->where([
            ['user_id', '=', $id],
            ['deleted_at', '=', null],
        ])->get();
        return view('user.sedCardList', ['sedcards'=>$sedcards]);
        
    }

    public function createSedCard()
    {
        $bodyhairs = DB::table('bodyhairs')->get();
        $brasizes = DB::table('brasizes')->get();
        $colors = DB::table('colors')->get();
        $hairlengths = DB::table('hairlengths')->get();
        $pubichairs = DB::table('pubichairs')->get();
        $languages = DB::table('languages')->get();
        $times = DB::table('times')->get();
        $days = DB::table('days')->get();
        return view('user.createSedCard', ['bodyhairs'=>$bodyhairs,
                                            'brasizes'=>$brasizes,
                                            'colors'=>$colors,
                                            'hairlengths'=>$hairlengths,
                                            'pubichairs'=>$pubichairs,
                                            'languages'=>$languages,
                                            'times'=>$times,
                                            'days'=>$days,
                                             ]);
        
    }
  public function editSedCard( Request $request)
    {
        //list
        $bodyhairs = DB::table('bodyhairs')->get();
        $brasizes = DB::table('brasizes')->get();
        $colors = DB::table('colors')->get();
        $hairlengths = DB::table('hairlengths')->get();
        $languages = DB::table('languages')->get();
        $pubichairs = DB::table('pubichairs')->get();

        //sedcard's
        $sedcard = DB::table('sedcards')->where('id',$request->id)->first();
        $sedcard_bodyhair = DB::table('bodyhairs')->where('id',$sedcard->bodyHairs_id)->first();
        $sedcard_brasize = DB::table('brasizes')->where('id',$sedcard->braSize_id)->first();
        $sedcard_eyeColor = DB::table('colors')->where('id',$sedcard->eyeColor_id)->first();
        $sedcard_hairColor = DB::table('colors')->where('id',$sedcard->hairColor_id)->first();
        $sedcard_skinColor = DB::table('colors')->where('id',$sedcard->skinColor_id)->first();
        $sedcard_hairlength = DB::table('hairlengths')->where('id',$sedcard->hairlengths_id)->first();
        $sedcard_pubichair = DB::table('pubichairs')->where('id',$sedcard->pubicHair_id)->first();
        $sedcard_language = DB::table('sedcardlanguages')->where('sedcard_id',$sedcard->id)->first();
        $sedcard_language = DB::table('languages')->where('id',$sedcard_language->language_id)->first();
        $address = DB::table('addresses')->where('id',$sedcard->address_id)->first();
        $location = DB::table('locations')->where('id',$sedcard->location_id)->first();
        return view('user.editSedCard', ['sedcard_bodyhair'=>$sedcard_bodyhair,
                                            'sedcard_brasize'=>$sedcard_brasize,
                                            'sedcard_eyeColor'=>$sedcard_eyeColor,
                                            'sedcard_skinColor'=>$sedcard_skinColor,
                                            'sedcard_hairColor'=>$sedcard_hairColor,
                                            'sedcard_hairlength'=>$sedcard_hairlength,
                                            'sedcard_pubichair'=>$sedcard_pubichair,
                                            'sedcard_language'=>$sedcard_language,
                                            'bodyhairs'=>$bodyhairs,
                                            'brasizes'=>$brasizes,
                                            'colors'=>$colors,
                                            'hairlengths'=>$hairlengths,
                                            'pubichairs'=>$pubichairs,
                                            'languages'=>$languages,
                                            'sedcard'=>$sedcard,
                                            'address'=>$address,
                                            'location'=>$location
                                             ]); 
        
    } 

    public function update( Request $request )// To update sedCard
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'title'=>'required',
            'phoneNumber'=>'required',
            'dob'=>'required',
            'weight'=>'required',
            'tall'=>'required',
            'eyeColour'=>'required',
            'pubichair'=>'required',
            'hairLength'=>'required',
            'bodyhair'=>'required',
            'skinColour'=>'required',
            'hairColour'=>'required',
            'brasize'=>'required',
            'tattooCount'=>'required',
            'piercingsCount'=>'required',
            'inTimePiercings'=>'required',
            'somking'=>'required',
            'drinking'=>'required',
            'devote'=>'required',
            'dominant'=>'required',
            'priceDescription'=>'required',
            'availabilityDescription'=>'required',
            'phoneDescription'=>'required',
            'sedcarddescription'=>'required',
            'active'=>'required',
            'locationName'=>'required',
            'locationTitle'=>'required',
            'locationdescription'=>'required',
            'language'=>'required'

        ]);
        																
        if($validation->fails()){
                return back()
                        ->with('errors', $validation->errors())
                        ->withInput();
                return redirect()->route('sedcard.view')
                                ->with('errors', $validation->errors())
                                ->withInput();	
	
        }
            $id =  Auth::user()->id;

            $sedcard = DB::table('sedcards')->where('id',$request->id)->first();

            $sedcard_bodyhair = DB::table('bodyhairs')->where('name',$request->bodyhair)->first();
            $sedcard_brasize = DB::table('brasizes')->where('name',$request->brasize)->first();
            $sedcard_eyeColor = DB::table('colors')->where('name',$request->eyeColour)->first();
            $sedcard_hairColor = DB::table('colors')->where('name',$request->hairColour)->first();
            $sedcard_skinColor = DB::table('colors')->where('name',$request->skinColour)->first();
            $sedcard_hairlength = DB::table('hairlengths')->where('name',$request->hairLength)->first();
            $sedcard_pubichair = DB::table('pubichairs')->where('name',$request->pubichair)->first();
            $language = DB::table('languages')->where('name',$request->language)->first();
            
            DB::table('sedcardlanguages')
            ->where('sedcard_id',$sedcard->id)
            ->update(['language_id' => $language->id
                    ]);

            DB::table('locations')
            ->where('id',$sedcard->location_id)
            ->update(['name' => $request->locationName,
                    'title' => $request->locationTitle,
                    'phoneNumber' => $request->phoneNumber,
                    'description' => $request->locationdescription
                    ]);

            DB::table('addresses')
            ->where('id',$sedcard->address_id)
            ->update(['city' => $request->city,
                    'postCode' => $request->postCode,
                    'country' => $request->country,
                    'street' => $request->street,
                    'house' => $request->house,
                    'description' => $request->description
                    ]);

            DB::table('sedcards')
            ->where('id',$request->id)
            ->update(['name' => $request->name,
                    'title' => $request->title,
                    'dateOfBirth' => $request->dob,
                    'weight' => $request->weight,
                    'tall' => $request->tall,
                    'phoneNumber' => $request->phoneNumber,
                    'tattoCount' => $request->tattooCount,
                    'peircingsCount' => $request->piercingsCount,
                    'hasInTimePiercing' => $request->inTimePiercings,
                    'isSomking' => $request->somking,
                    'isDrinking' => $request->drinking,
                    'isDevote' => $request->devote,
                    'isDominant' => $request->dominant,
                    'priceDescription' => $request->priceDescription,
                    'availabilityDescription' => $request->availabilityDescription,
                    'phoneDescription' => $request->phoneDescription,
                    'description' => $request->sedcarddescription,
                    'isActive' => $request->active
                    ]);				
        
            return redirect()->route('sedcard.edit',$request->id);
        
        
    }
    
    
    public function sedCardCreated( Request $request )// To Create sedCard
    {
      
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'title'=>'required',
            'phoneNumber'=>'required|unique:sedcards',
            'dob'=>'required',
            'weight'=>'required',
            'tall'=>'required',
            'eyeColour'=>'required',
            'pubichair'=>'required',
            'hairLength'=>'required',
            'bodyhair'=>'required',
            'skinColour'=>'required',
            'hairColour'=>'required',
            'brasize'=>'required',
            'tattooCount'=>'required',
            'piercingsCount'=>'required',
            'inTimePiercings'=>'required',
            'somking'=>'required',
            'drinking'=>'required',
            'devote'=>'required',
            'dominant'=>'required',
            'priceDescription'=>'required',
            'availabilityDescription'=>'required',
            'phoneDescription'=>'required',
            'sedcarddescription'=>'required',
            'city'=>'required',
            'postCode'=>'required',
            'country'=>'required',
            'street'=>'required',
            'house'=>'required',
            'description'=>'required',//address description
            'locationName'=>'required',
            'locationTitle'=>'required',
            'locationdescription'=>'required',
            'day'=>'required',
            'from'=>'required',
            'to'=>'required',



        ]);
        																
        if($validation->fails()){
                return back()
                        ->with('errors', $validation->errors())
                        ->withInput();
                return redirect()->route('sedcard.create')
                                ->with('errors', $validation->errors())
                                ->withInput();	
	
        }

        $bodyhair = DB::table('bodyhairs')->where('name',$request->bodyhair)->first();
        $brasize = DB::table('brasizes')->where('name',$request->brasize)->first();
        $eyecolor = DB::table('colors')->where('name',$request->eyeColour)->first();
        $skincolor = DB::table('colors')->where('name',$request->skinColour)->first();
        $haircolor = DB::table('colors')->where('name',$request->hairColour)->first();
        $hairLength = DB::table('hairlengths')->where('name',$request->hairLength)->first();
        $pubichair = DB::table('pubichairs')->where('name',$request->pubichair)->first();
        $language = DB::table('languages')->where('name',$request->language)->first();

        
       
        $sedcard = new SedCard();

        $address = new Address();
        $address->city 	= $request->city;
        $address->postCode 	= $request->postCode;
        $address->country	= $request->country;
        $address->street 	= $request->street;
        $address->house 	= $request->house	;			
        $address->description 	= $request->description	;
        

        if ($address->save()) {

            $location = new Location();
            $location->address_id 	= $address->id;
            $location->name 	= $request->locationName;
            $location->title 	= $request->locationTitle;
            $location->phoneNumber 	= $request->phoneNumber;
            $location->description 	= $request->locationdescription;

            if($location->save()){
                $sedcard->address_id= $address->id;
                $sedcard->location_id= $location->id;
                $sedcard->user_id 	=  Auth::user()->id;
                $sedcard->eyecolor_id 	=  $eyecolor->id;
                $sedcard->pubicHair_id 	=  $pubichair->id;
                $sedcard->hairlengths_id 	=  $hairLength->id;
                $sedcard->bodyHairs_id 	=  $bodyhair->id;
                $sedcard->skinColor_id 	=  $skincolor->id;
                $sedcard->hairColor_id 	=  $haircolor->id;
                $sedcard->braSize_id 	=  $brasize->id;
                $sedcard->name 	=  $request->name;
                $sedcard->title 	=  $request->title;
                $sedcard->dateOfBirth 	=  $request->dob;
                $sedcard->weight 	=  $request->weight;
                $sedcard->tall 	=  $request->tall;
                $sedcard->phoneNumber 	=  $request->phoneNumber;
                $sedcard->tattoCount 	=  $request->tattooCount;
                $sedcard->peircingsCount 	=  $request->piercingsCount;
                $sedcard->hasInTimePiercing 	=  $request->inTimePiercings;
                $sedcard->isSomking 	=  $request->somking;
                $sedcard->isDrinking 	=  $request->drinking;
                $sedcard->isDevote 	=  $request->devote;
                $sedcard->isDominant 	=  $request->dominant;
                $sedcard->priceDescription 	=  $request->priceDescription;
                $sedcard->availabilityDescription 	=  $request->availabilityDescription;
                $sedcard->phoneDescription 	=  $request->phoneDescription;
                $sedcard->description 	=  $request->sedcarddescription;
                $sedcard->isVerified 	=  $request->verified;
                $sedcard->isPhoneVerified 	=  $request->phoneVerified;
                $sedcard->isActive 	=  $request->active;
                
            }
            if ($sedcard->save()) {
                $SedCardLanguage = new SedCardLanguage();	
                $SedCardLanguage->language_id 	= $language->id;
                $SedCardLanguage->sedcard_id 	= $sedcard->id;
                $SedCardLanguage->save();

                $days  = $request->day;
                $froms = $request->from;
                $tos = $request->to;
                if($request->everyday==''){
                for($count = 0; $count < count( $days); $count++)
                {
                    $day = DB::table('days')->where('name',$days[$count])->first();
                    $from = DB::table('times')->where('name',$froms[$count])->first();
                    $to = DB::table('times')->where('name',$tos[$count])->first();
                $data = array(
                    'sedcard_id'  => $sedcard->id,
                    'day_id' => $day->id,
                    'from_id' => $from->id,
                    'to_id' => $to->id
                ); 
                SedcardAvailability::insert($data);
                }
                
        
                }
                else{
                    $days = DB::table('days')->get();
                    $from = DB::table('times')->where('name',$request->from)->first();
                    $to = DB::table('times')->where('name',$request->to)->first();
                    foreach ($days as $day) {
                        $day = DB::table('days')->where('name',$day->name)->first();
                        $data = array(
                            'sedcard_id'  => $sedcard->id,
                            'day_id' => $day->id,
                            'from_id' => $from->id,
                            'to_id' => $to->id
                        );
                        $insert_data[] = $data; 
                    } 
                    SedcardAvailability::insert($insert_data);
        
        
                }

                return redirect()->route('sedcard.list');
            }
            
            
        } 
        
    } 
    public function delete(Request $request)
    { 
        SedCard::find($request->id)->delete();
        return redirect()->route('sedcard.list');
        
    }

}

