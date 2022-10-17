<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*Relazione tra i 2 model (post e category)*/

      public function posts(){
        return $this->hasMany('App\post');
        
      }


}
