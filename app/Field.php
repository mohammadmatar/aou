<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function courses(){
        return $this->hasMany('App\Course','field_id','id');
    }
}
