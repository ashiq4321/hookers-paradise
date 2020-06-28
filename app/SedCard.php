<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedCard extends Model
{
    protected $table = "sedcards";
    use SoftDeletes;
    
}
