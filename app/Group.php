<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    protected $table = "groups";
    public $timestamps = false;

    protected $fillable=[
        'name','user_id','address_id','location_id,','title','phoneNumber', 'description'
    ];
    use SoftDeletes;
}
