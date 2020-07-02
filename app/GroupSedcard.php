<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupSedcard extends Model
{
    protected $table = "groupsedcard";
    public $timestamps = false;

    protected $fillable=[
        'group_id',	'sedcard_id',	'isAccepted'	
    ];
}
