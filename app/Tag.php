<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{    

   /*Relazione tra i 2 model ( tag e post )*/

    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
