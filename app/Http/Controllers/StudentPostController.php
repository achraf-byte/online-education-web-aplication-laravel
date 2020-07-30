<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\studentprofile;
use App\Models\studentpost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use DB;


use Illuminate\Support\Facades\Validator;



class StudentPostController extends Controller
{

    public function studentcreate()
    {
         
           
            return view('student.creat_post');
             
    }
    public function  showupdate($postid)
    {
        
        $post_info = studentpost::find($postid);
        
        
            return view('student.update_post' , compact('post_info'));
             
    }
    
    

    
    /*
    *  @param Request $request
    */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'student_id' => ['required'],
            'caption' => ['required', 'string', 'max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            
        ]);

        if ($validator->fails()) {
            return redirect('/student/post')
                        ->withErrors($validator)
                        ->withInput();
        }
        $idd=Auth::guard('student')->user()->id;
        
        $imagelink = request('image')->store('uploads','public');
        $studentPost = new studentPost;
        $studentPost->student_id = Auth::guard('student')->user()->id;   
        $studentPost->caption  = $request->caption;
        $studentPost->image = $imagelink;
        $studentPost->save();
        
        return redirect('/s/'.$idd);
        
    } 

    protected function update(Request $request , $post_info )
    {
    $validator = Validator::make($request->all(),[
        'student_id' => ['required'],
        'caption' => ['required', 'string', 'max:255'],
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        
    ]);

    if ($validator->fails()) {
        return redirect('/student/Edit/post/{postid}')
                    ->withErrors($validator)
                    ->withInput();
    }
    $idd=Auth::guard('student')->user()->id;
    
    $imagelink = request('image')->store('uploads','public');
    $post_info = studentpost::find($post_info);
    //dd($post_info->id);
    
     
    
    
    DB::table('student_posts')->where('id', $post_info->id)->update(['caption'=> $request->caption,'image'=>$imagelink]);
    return redirect('/s/'.Auth::guard('student')->user()->id);   
} 
   
}
