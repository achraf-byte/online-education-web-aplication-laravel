<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\teacherpost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use DatabaseMigrations;

class teacherprofilecontroller extends Controller
{
    public function show()
    {
         
           
            return view('teacher.edit_profile');
             
    }
    public function showupdate()
    {
         
           
            return view('teacher.update_profile');
             
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'teacher_id' => ['required'],
            'url' => ['required', 'url'],
            'image_couvert' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'image_profile' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],

            
        ]);
    
    }

    protected function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'teacher_id' => ['required'],
            'url' => ['required', 'url'],
            'image_couvert' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            
        ]);

        if ($validator->fails()) {
            return redirect('/teacher/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $idd=Auth::guard('teacher')->user()->id;
        
        $imageClink = request('image_couvert')->store('uploads','public');
        $imagePlink = request('image_profile')->store('uploads','public');
        
        $teacher_profile = new teacherprofile;
        $teacher_profile->teacher_id = Auth::guard('teacher')->user()->id;   
        $teacher_profile->url  = $request->url;
        $teacher_profile->image_couvert = $imageClink;
        $teacher_profile->image_profile = $imagePlink;
        $teacher_profile->save();
        
        return redirect('/teacher/post');
    } 
    protected function Update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'teacher_id' => ['required'],
            'url' => ['required', 'url'],
            'image_couvert' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            
        ]);

        if ($validator->fails()) {
            return redirect('/teacher/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $idd=Auth::guard('teacher')->user()->id;
        
        $imageClink = request('image_couvert')->store('uploads','public');
        $imagePlink = request('image_profile')->store('uploads','public');
        
         
        
        
        DB::table('teacher_profiles')->where('teacher_id', $idd)->update(['teacher_id' => $idd,'url'=> $request->url,'image_couvert'=>$imageClink,'image_profile'=>$imagePlink]);
        return redirect('/t/'.Auth::guard('teacher')->user()->id);   
    } 
}
