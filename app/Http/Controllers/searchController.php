<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\teacherprofile;
use App\Models\studentprofile;
use App\Models\teacher;
use App\Models\studentpost;
use App\Models\teacherclasse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use DB;


use Illuminate\Support\Facades\Validator;



class searchController extends Controller
{

    
    
    
    

    
    /*
    *  @param Request $request
    */
    public function search(Request $request)
    {
        //dd($request->search);
        //$id =  DB::table('teacher_classe')->select('id')->where('code', $request->search)->get()->toArray(); 
    
       // $rsult = DB::table('teacher_classe')->where('code', $request->search)->get(); 
       $class1 = teacherclasse::where('code', '=', $request->search)->first();
       if($class1==null){
       
    
        return view('student.dashbord' , [
            'student_info' =>student::findorfail(Auth::guard('student')->user()->id)
            ]);
       }
       $class_code = teacherclasse::where('code', '=', $request->search)->first()->code;
       $class_id = teacherclasse::where('code', '=', $request->search)->first()->id;
       $class = teacherclasse::where('code', '=', $request->search)->first();
      
        //dd(teacherprofile::find($rsult->teacher_id));
       $teacher_infoo =  teacherprofile::where('teacher_id', '=', $class->teacher_id)->first()->image_profile;
       $teacher_in =  teacher::where('id', '=', $class->teacher_id)->first();
       //return view('student.dashbord' , compact('class_code' , 'teacher_infoo'));
        //dd($teacher_infoo);
         
       return view('student.dashbord' , [
        'student_info' =>student::findorfail(Auth::guard('student')->user()->id),
        'class_code' =>$class_code,
        'teacher_infoo' =>$teacher_infoo,
        'teacher_in' =>$teacher_in,
        'class_id' =>$class_id

    ]);
    } 
    
    
    
    public function searchuser(Request $request)
    {
        $user = student::where('first_name', '=', $request->search)->first();
        if($user==null){
       
    
            return view('student.dashbord' , [
                'student_info' =>student::findorfail(Auth::guard('student')->user()->id)
                ]);
           }
        
       $user_id = student::where('first_name', '=', $request->search)->first()->id;
       $user_prof = studentprofile::where('id', '=', $user_id)->first();
       
      
       return view('student.dashbord' , [
        'student_info' =>student::findorfail(Auth::guard('student')->user()->id),
        'user' =>$user,
        
        'user_prof' =>$user_prof,
        

    ]);
    } 

   

    
     
    
    
     
} 
   

