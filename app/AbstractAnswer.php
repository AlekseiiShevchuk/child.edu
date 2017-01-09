<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbstractAnswer extends Model
{
    public $timestamps = false;
    protected $table = 'answers';
}
