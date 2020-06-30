<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Address;
use App\Language;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneNumber'=>'required|unique:users',
            'dob'=>'required'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /* $validation = Validator::make($data->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phoneNumber'=>'required|unique:users',
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
			return redirect()->route('registration.index')
                            ->with('errors', $validation->errors())
							->withInput();		
        } */

        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'dateOfBirth' =>$data['dob'],
            'password' =>Hash::make($data['password']),
            'phoneNumber' =>$data['phoneNumber'],
            'language_id' =>null,
            'address_id' =>null
        ]);
    }
}
