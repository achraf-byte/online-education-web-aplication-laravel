<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class teacherprofile extends Model
{
    protected $table = 'teacher_profiles';
    public function teacher (){
        return $this->belongsto(teacher::class);
     }
}
