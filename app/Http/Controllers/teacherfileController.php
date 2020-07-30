<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\teacherfile;
use App\Models\teacherclasse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;




use Illuminate\Support\Facades\Validator;



class teacherfileController extends Controller
{

    public function show($the_classe)
    {
         
        $teacher_class = teacherclasse::findorfail($the_classe);
       
            return view('teacher.creat_file' , compact('teacher_class' ));
             
    }

    

    
    
        
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(),[
                'teacher_id' => ['required'],
                'classe_id' => ['required'],
                'titel' => ['required'],
                'description' => ['required', 'string', 'max:255'],
                'document' => ['required'],
    
                
            ]);
    
            if ($validator->fails()) {
                //dd($request);
                return redirect('/teacher/file')
                            ->withErrors($validator)
                            ->withInput();
            }
            $idd=Auth::guard('teacher')->user()->id;
            
            $documentlink = request('document')->store('uploads','public');
            $teacherfile = new teacherfile;
            $teacherfile->teacher_id = Auth::guard('teacher')->user()->id;   
            $teacherfile->classe_id  = $request->classe_id;   
            $teacherfile->description  = $request->description;
            $teacherfile->titel  = $request->titel;
            $teacherfile->document = $documentlink;
            $teacherfile->save();
            
            return redirect('/teacher/c/'.$request->classe_id);
            
        }
   
}
