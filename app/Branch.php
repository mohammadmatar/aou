<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function courses(){
        return $this->hasMany('App\Course','branch_id','id');
    } 
}
