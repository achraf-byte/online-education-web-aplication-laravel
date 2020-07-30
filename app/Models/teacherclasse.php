<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacherclasse extends Model
{
    protected $fillable = [
        'caption', 'image' ,'teacher_id'
    ];
    protected $table = 'teacher_classe';
    public function teacher (){
       return $this->belongsto(teacher::class);
    }
}