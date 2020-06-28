<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "languages";
    public $timestamps = false;

    protected $fillable=[
        'name'
    ];
    public function user(){
    return $this->hasOne('App\User');
    }
}
