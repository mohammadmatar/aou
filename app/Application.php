<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function courses(){
        return $this->hasOne('App\Course','course_id','id');
    } 
    public function students(){
        return $this->hasMany('App\Student','id','student_id');
    } 

}
