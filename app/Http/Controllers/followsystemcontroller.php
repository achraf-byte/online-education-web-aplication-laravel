<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\teacherclasse;
use App\Models\student;
use App\Models\studentprofile;
use App\Models\studentpost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;



use Illuminate\Support\Facades\Validator;



class followsystemcontroller extends Controller
{

    public function followme( $follower , $following)
    {
         
           //dd($follower , $following);
           DB::table('Followding')->insert(['being_Followd'=>  $following,'being_FollowdBy_id'=>$follower]); 
           return redirect('/s/' .$following); 
    }
    public function unfollowme( $follower , $following)
    {
         
           //dd($follower , $following);
           DB::table('Followding')->insert(['being_Followd'=>  $following,'being_FollowdBy_id'=>$follower]); 
           DB::table('Followding')->where([['being_FollowdBy_id', '=', $follower],['being_Followd', '=', $following]])->delete();
           return redirect('/s/' .$following); 
    }


    public function followclass( $follower , $following)
    {
         
           //dd($follower , $following);
           DB::table('followclass')->insert(['student_id'=>  $follower,'class_id'=>$following]); 
           return redirect('/s/' .$follower); 
    }
    public function unfollowclass( $follower , $following)
    {
         
           //dd($follower , $following);
           DB::table('followclass')->where([['class_id', '=', $following],['student_id', '=',$follower]])->delete();
           return redirect('/s/' .$follower); 
    }
   
}
