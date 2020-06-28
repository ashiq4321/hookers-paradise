<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyHair extends Model
{
    protected $table = "bodyhairs";
    public $timestamps = false;

    protected $fillable=[
        'name'
    ];
}
