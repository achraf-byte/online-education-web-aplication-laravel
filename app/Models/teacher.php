<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class teacher extends Authenticatable
{
    use Notifiable;

    

    protected $fillable = [
        'first_name', 'last_name','phone_number','adresse','subject', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teacherPost (){
        return $this->hasMany(teacherPost::class)->orderby('created_at' , 'desc') ;
     }
     public function teacherProfile (){
         return $this->hasOne(teacherProfile::class) ;
      }
     public function teacherclasse (){
         return $this->hasMany(teacherclasse::class) ;
      }
     public function Teacherfile (){
         return $this->hasMany(Teacherfile::class) ;
      }
}

