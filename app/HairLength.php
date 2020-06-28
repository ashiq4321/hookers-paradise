<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairLength extends Model
{
    protected $table = "hairlengths";
    public $timestamps = false;

    protected $fillable=[
        'name'
    ];
}
