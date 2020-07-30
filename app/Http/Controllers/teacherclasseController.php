<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\teacherclasse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;



use Illuminate\Support\Facades\Validator;



class teacherclasseController extends Controller
{

    public function teachercreate()
    {
         
           
            return view('teacher.creat_classe');
             
    }
    public function show($the_class)
    {
         
        $class = DB::table('teacher_classe')->where('id', $the_class)->get();
        $class =teacherclasse::where('id', '=', $the_class)->first();
        $teacher_class = teacherclasse::findorfail($the_class);
        $teacher_prof = teacherprofile::findorfail($teacher_class->teacher_id);
        $teacher_info = teacher::findorfail($teacher_class->teacher_id);
        
        
            return view('teacher.class' , compact('teacher_class','class','teacher_prof','teacher_info' ));
             
    }

    

    
    /*
    *  @param Request $request
    */
        
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(),[
                'teacher_id' => ['required'],
                'code' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'subject' => ['required', 'string', 'max:255'],
                'school' => ['required', 'string', 'max:255'],
                
            ]);
    
            if ($validator->fails()) {
                return redirect('/teacher/class')
                            ->withErrors($validator)
                            ->withInput();
            }
            $idd=Auth::guard('teacher')->user()->id;
            
            
            $teacherclass = new teacherclasse;
            $teacherclass->teacher_id = Auth::guard('teacher')->user()->id;   
            $teacherclass->code  = $request->code;
            $teacherclass->name  = $request->name;
            $teacherclass->subject  = $request->subject;
            $teacherclass->school  = $request->school;
            $teacherclass->save();
            
            return redirect('/t/'.$idd);
            
        }
   
}
