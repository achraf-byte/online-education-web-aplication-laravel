<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\studentprofile;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    public function __construct()
        {
            
            
        }
        
    public function studentdashbord($the_user_is)
        {
           
            
            $the_user_is = student::findorfail($the_user_is);
        
            
            return view('student.dashbord' , [
                'student_info' =>$the_user_is
            ]);
        }
}
