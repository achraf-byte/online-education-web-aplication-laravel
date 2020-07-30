<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;



class student extends Authenticatable
{
    use Notifiable;

    

    protected $fillable = [
        'first_name', 'last_name','phone_number','adresse','school', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function StudentPost (){
       return $this->hasmany(StudentPost::class) ;
    }
    public function StudentProfile (){
        return $this->hasone(StudentProfile::class) ;
     }
}
