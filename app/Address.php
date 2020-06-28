<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    public $timestamps = false;
    protected $fillable=[
        "city",
        "postCode",
        "country",
        "street",
        "house",
        "description",
    ];
}
