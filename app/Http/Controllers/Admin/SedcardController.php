<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Sedcard;
use App\User;
use App\Role;

use DB;
use App\Support\Collection;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class SedcardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = Sedcard::all();
        return view('admin.sedcards.list')->with('sedcards', $users);
    }

    public function show( Sedcard $user )
    {
        if (Gate::denies('sedcards-view'))
            Helpers::unauthorized();

        $roles = Role::all();
        return view('admin.sedcards.info')->with([
            'editable' => false,
            'sedcard' => $user,
            'roles' => $roles,
        ]);
    }

    public function edit(User $user) {
        if (Gate::denies('sedcards-edit'))
            Helpers::unauthorized();

    }

    public function update( Request $request, Sedcard $sedcard )
    {
        if (Gate::denies('sedcards-edit'))
            Helpers::unauthorized();

        return redirect()->route('admin.sedcards.index');
    }

    public function destroy(Sedcard $sedcard)
    {
        if (Gate::denies('users-delete'))
            Helpers::unauthorized();

        $sedcard->delete();
        return redirect()->rout('admin.sedcards.index');
    }
}
