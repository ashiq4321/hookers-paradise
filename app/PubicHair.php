<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PubicHair extends Model
{
    protected $table = "pubichairs";
    public $timestamps = false;

    protected $fillable=[
        'name'
    ];
}
