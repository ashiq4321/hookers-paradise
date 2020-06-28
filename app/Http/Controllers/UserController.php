<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Language;
use App\Address;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//to view user profile
    {
        $languages = DB::table('languages')->get();
        $user_language = DB::table('languages')->where('id',Auth::user()->language_id)->first();
        $address = DB::table('addresses')->where('id',Auth::user()->address_id)->first();
        return view('user.profile',['languages' => $languages,
                                    'address' => $address,
                                    'user_language' => $user_language]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)// to add owner sedCard
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//to view owner sedCard 
    {
        $sedcard = DB::table('sedcards')->where('id',$id)->first();
        $sedcard_bodyhair = DB::table('bodyhairs')->where('id',$sedcard->bodyHairs_id)->first();
        $sedcard_brasize = DB::table('brasizes')->where('id',$sedcard->braSize_id)->first();
        $sedcard_eyeColor = DB::table('colors')->where('id',$sedcard->eyeColor_id)->first();
        $sedcard_hairColor = DB::table('colors')->where('id',$sedcard->hairColor_id)->first();
        $sedcard_skinColor = DB::table('colors')->where('id',$sedcard->skinColor_id)->first();
        $sedcard_hairlength = DB::table('hairlengths')->where('id',$sedcard->hairlengths_id)->first();
        $sedcard_pubichair = DB::table('pubichairs')->where('id',$sedcard->pubicHair_id)->first();
        $address = DB::table('addresses')->where('id',$sedcard->address_id)->first();
        $location = DB::table('locations')->where('id',$sedcard->location_id)->first();

        return view('user.viewSedcard',['sedcard_bodyhair'=>$sedcard_bodyhair,
                                            'sedcard_brasize'=>$sedcard_brasize,
                                            'sedcard_eyeColor'=>$sedcard_eyeColor,
                                            'sedcard_skinColor'=>$sedcard_skinColor,
                                            'sedcard_hairColor'=>$sedcard_hairColor,
                                            'sedcard_hairlength'=>$sedcard_hairlength,
                                            'sedcard_pubichair'=>$sedcard_pubichair,
                                            'sedcard'=>$sedcard,
                                            'address'=>$address,
                                            'location'=>$location,
                                            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) //to update user profile
    {
        $validation = Validator::make($request->all(), [
        'name'=>'required',
        'email'=>'required|email',
        'phoneNumber'=>'required',
        'dob'=>'required',
        'language'=>'required',
        'city'=>'required',
        'postCode'=>'required',
        'country'=>'required',
        'street'=>'required',
        'house'=>'required',
        'description'=>'required',
    ]);
    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();
        return redirect()->route('user.index')
                        ->with('errors', $validation->errors())
                        ->withInput();		
    }
         

        $language = DB::table('languages')->where('name',$request->language)->first();
        $address = DB::table('addresses')->where('id',Auth::user()->address_id)->first();
        $user = DB::table('addresses')->where('id',Auth::user()->id)->first();
       

        DB::table('addresses')
        ->where('id', Auth::user()->address_id)
        ->update(array('city' => $request->city,
                       'postCode' => $request->postCode,
                       'country' => $request->country,
                       'street' => $request->street,
                       'house' => $request->house,
                       'description' => $request->description));
        DB::table('users')
        ->where('id',Auth::user()->id)
        ->update(array('name' => $request->name,
                        'email' => $request->email,
                        'phoneNumber' => $request->phoneNumber,
                        'language_id' => $language->id,
                        'dateOfBirth' => $request->dob));
        return redirect()->route('user.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
