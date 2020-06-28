<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BraSize extends Model
{
    protected $table = "brasizes";
    public $timestamps = false;

    protected $fillable=[
        'name'
    ];
}
