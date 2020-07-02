<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Helpers {

    public static function unauthorized() {
        Auth::logout();
        return abort(403, 'Unauthorized action.');
    }
}
