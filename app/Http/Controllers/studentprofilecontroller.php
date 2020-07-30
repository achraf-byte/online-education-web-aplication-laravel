<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\studentprofile;
use App\Models\studentpost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB; 
class studentprofilecontroller extends Controller
{
    public function show()
    {
         
           
            return view('student.edit_profile');
             
    }
    public function showupdate()
    {
         
           
            return view('student.update_profile');
             
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'student_id' => ['required'],
            'url' => ['required', 'url'],
            'image_couvert' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'image_profile' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],

            
        ]);
    
    }

    protected function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'student_id' => ['required'],
            'url' => ['required', 'url'],
            'image_couvert' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            
        ]);

        if ($validator->fails()) {
            return redirect('/student/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $idd=Auth::guard('student')->user()->id;
        
        $imageClink = request('image_couvert')->store('uploads','public');
        $imagePlink = request('image_profile')->store('uploads','public');
        
        $studentprofile = new studentprofile;
        $studentprofile->Student_id = Auth::guard('student')->user()->id;   
        $studentprofile->url  = $request->url;
        $studentprofile->image_couvert = $imageClink;
        $studentprofile->image_profile = $imagePlink;
        $studentprofile->save();
        
        return redirect('/student/post');
    } 
    protected function Update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'student_id' => ['required'],
            'url' => ['required', 'url'],
            'image_couvert' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            
        ]);

        if ($validator->fails()) {
            return redirect('/student/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $idd=Auth::guard('student')->user()->id;
        
        $imageClink = request('image_couvert')->store('uploads','public');
        $imagePlink = request('image_profile')->store('uploads','public');
        
         
        
        
        DB::table('student_profiles')->where('student_id', $idd)->update(['Student_id' => $idd,'url'=> $request->url,'image_couvert'=>$imageClink,'image_profile'=>$imagePlink]);
        return redirect('/s/'.Auth::guard('student')->user()->id);   
    } 

}
