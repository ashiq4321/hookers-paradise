<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sedcard extends Model
{
    protected $table = "Sedcards";
    use SoftDeletes;

}
