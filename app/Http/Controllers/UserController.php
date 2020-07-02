<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App;
use App\User;
use App\Language;
use App\Address;
use App\Group;
use App\GroupSedcard;
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
        return view('user.profile',['languages' => $languages,
                                    'user_language' => $user_language]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()//create group
    {
        return view('user.createGroup');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)// to add owner sedCard
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'title'=>'required',
            'phoneNumber'=>'required',
            'description'=>'required'
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
            return redirect()->route('user.createGroup')
                            ->with('errors', $validation->errors())
                            ->withInput();		
        }

        $group = new Group;

        $group->name = $request->name;
        $group->title = $request->title;
        $group->address_id = $request->address_id;
        $group->location_id = $request->location_id;
        $group->user_id = Auth::user()->id;
        $group->phoneNumber = $request->phoneNumber;
        $group->description = $request->description;
        $group->isActive = null;

        $group->save();
        return redirect()->route('user.show',Auth::user()->id);  


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//group list
    {
        $groups = DB::table('groups')->where([['user_id','=',$id],['deleted_at','=', null]])->get();
        return view('user.groupList', ['groups'=>$groups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//group edit view 
    {   
        $group= DB::table('groups')->where('id',$id)->first();
        return view('user.viewGroup', ['group' => $group]);
    }
    public function groupUpdate(Request $request, $id) //to update group info
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'title'=>'required',
            'phoneNumber'=>'required',
            'description'=>'required'
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
            return redirect()->route('user.edit',$id)
                            ->with('errors', $validation->errors())
                            ->withInput();		
        }
        DB::table('groups')
        ->where('id',$id)
        ->update(array('name' => $request->name,
                        'title' => $request->title,
                        'phoneNumber' => $request->phoneNumber,
                        'description' => $request->description));
        return redirect()->route('user.edit',$id);  
    }

    public function groupmember($id)//group member view 
    {   
        $members= DB::table('groupsedcard')->where([['group_id','=',$id],['isAccepted','=','yes']])->get();
        $a=[];
        foreach ($members as $member) {
            array_push($a,$member->sedcard_id);
          }
        $members=App\SedCard::find($a);

        $sedcards = DB::table('sedcards')->where('deleted_at', null)->paginate(05);

        return view('user.viewMember', ['members' => $members,'sedcards'=>$sedcards,'id'=>$id]);
    }
    public function memberSearch(Request $request,$id) { //to add member
        $members= DB::table('groupsedcard')->where('group_id',$request->id)->get();
        $a=[];
        foreach ($members as $member) {
            array_push($a,$member->sedcard_id);
          }
        $members=App\SedCard::find($a);
        $query = $request->get('search');
        $searches='';
        if($query != '')
        {
         $sedcards = DB::table('sedcards')
           ->where('name', 'like', '%'.$query.'%')
           ->orWhere('title', 'like', '%'.$query.'%')
           ->paginate(05);
           
        }
        else
        {
         $sedcards = DB::table('sedcards')->where('deleted_at', null)->paginate(05);

        }
        return view('user.viewMember', ['members' => $members,'sedcards'=>$sedcards,'id'=>$id]);

 
       }
       public function addMember($id,$sedcard)//group member delete 
    {   
        $groupSedcard = new GroupSedcard;
        $groupSedcard->group_id = $id;
        $groupSedcard->sedcard_id = $sedcard;
        $groupSedcard->isAccepted = 'no';
        $groupSedcard->save();
        
        return redirect()->route('user.groupmember',$id);  
    }
    
    public function acceptGroup($id,$member)//group member delete 
    {   
        DB::table('groupsedcard')
        ->where([['group_id','=',$id],['sedcard_id','=',$member]])
        ->update(array('isAccepted' =>'yes'));

         return redirect()->route('sedcard.list');  
    }
    public function declineGroup($id,$member)//group member delete 
    {   
        DB::table('groupsedcard')
        ->where([['group_id','=',$id],['sedcard_id','=',$member]])
        ->delete();

         return redirect()->route('sedcard.list');  
    }
    
       public function deleteMember($id,$member)//group member delete 
    {   
        DB::table('groupsedcard')->where([['group_id','=',$id],['sedcard_id','=',$member]])->delete();
        return redirect()->route('user.groupmember',$id);  
    }
    public function deleteGroup($id)//group delete
    {   
        DB::table('groupsedcard')->where('group_id',$id)->delete();
        Group::find($id)->delete();

        return redirect()->route('user.show',Auth::user()->id);  

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
        'language'=>'required'
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
        $user = DB::table('addresses')->where('id',Auth::user()->id)->first();
       
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
