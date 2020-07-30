<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\teacherpost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;



use Illuminate\Support\Facades\Validator;



class teacherPostController extends Controller
{

    public function teachercreate()
    {
         
           
            return view('teacher.creat_post');
             
    }
    public function showupdate($postid)
    {
        
        $post_info = teacherpost::find($postid);
        
        
            return view('teacher.update_post' , compact('post_info'));
             
    }

    

    
    /*
    *  @param Request $request
    */
        
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(),[
                'teacher_id' => ['required'],
                'caption' => ['required', 'string', 'max:255'],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
                
            ]);
    
            if ($validator->fails()) {
                return redirect('/teacher/post')
                            ->withErrors($validator)
                            ->withInput();
            }
            $idd=Auth::guard('teacher')->user()->id;
            
            $imagelink = request('image')->store('uploads','public');
            $teacherPost = new teacherPost;
            $teacherPost->teacher_id = Auth::guard('teacher')->user()->id;   
            $teacherPost->caption  = $request->caption;
            $teacherPost->image = $imagelink;
            $teacherPost->save();
            
            return redirect('/t/'.$idd);
            
        }




        protected function update(Request $request , $post_info )
        {
        $validator = Validator::make($request->all(),[
            'teacher_id' => ['required'],
            'caption' => ['required', 'string', 'max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            
        ]);

        if ($validator->fails()) {
            return redirect('/teacher/Edit/post/{postid}')
                        ->withErrors($validator)
                        ->withInput();
        }
        $idd=Auth::guard('teacher')->user()->id;
        
        $imagelink = request('image')->store('uploads','public');
        $post_info = teacherpost::find($post_info);
        //dd($post_info->id);
        
         
        
        
        DB::table('teacher_posts')->where('id', $post_info->id)->update(['caption'=> $request->caption,'image'=>$imagelink]);
        return redirect('/t/'.Auth::guard('teacher')->user()->id);   
    } 
   
}
