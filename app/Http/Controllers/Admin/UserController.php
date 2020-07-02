<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

use DB;
use App\Support\Collection;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::all();
        return view('admin.user.list')->with('users', $users);
    }

    public function show( User $user )
    {
        if (Gate::denies('users-view'))
            Helpers::unauthorized();

        $roles = Role::all();
        return view('admin.user.info')->with([
            'editable' => false,
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function edit(User $user) {
        if (Gate::denies('users-edit'))
            Helpers::unauthorized();


        $roles = Role::all();
        return view('admin.user.info')->with([
            'editable' => true,
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update( Request $request, User $user )
    {
        if (Gate::denies('users-edit'))
            Helpers::unauthorized();

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required',
            'dob' => 'required',
        ]);
        if ($validation->fails()) {
            return back()->with('errors', $validation->errors())->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->dateOfBirth = $request->dob;
        $user->roles()->sync($request->roles);

        if ( $user->save())
            $request->session()->flash('success', "User has been updated");
        else
            $request->session()->flash('errors', ["Error while updating"]);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        if (Gate::denies('users-delete'))
            Helpers::unauthorized();

        $user->roles()->detach();
        $user->delete();
        return redirect()->rout('admin.users.index');
    }
}
