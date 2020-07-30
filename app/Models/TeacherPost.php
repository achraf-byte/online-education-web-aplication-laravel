<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacherPost extends Model
{
    protected $fillable = [
        'caption', 'image' ,'teacher_id'
    ];
    public function teacher (){
       return $this->belongsto(teacher::class);
    }
}
