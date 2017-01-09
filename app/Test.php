<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
   public function isInputAnswerCorrect():bool
   {
       return true;
   }
}
