<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPost extends Model
{
    protected $fillable = [
        'caption', 'image' ,'Student_id'
    ];
    public function student (){
       return $this->belongsto(student::class);
    }
}
