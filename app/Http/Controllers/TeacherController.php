<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\teacherpost;

class TeacherController extends Controller
{
    public function __construct()
    {

        
        
    }
public function teacherdashbord($the_user_is)
    {
        $the_user_is = Teacher::findorfail($the_user_is);
        

        return view('teacher.dashbord' , [
            'teacher_info' =>$the_user_is
        ]);
    }
public function showclass()
    {

        return view('teacher.class');
    }
}
