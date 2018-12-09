<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
        protected $table='courses';

    public function instructor(){
    	return $this->hasOne('App\Instructor','id','instuctor_id');
    }

    public function branch(){
    	return $this->hasOne('App\Branch','id','branch_id');
    }

    public function field(){
    	return $this->hasOne('App\Field','id','field_id');
    }

    public function applications(){
        return $this->hasMany('App\Application','id','course_id');
    }
}
