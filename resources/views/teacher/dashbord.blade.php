@extends('layouts.master_auth')
<?php
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\teacherpost;
use App\Models\teacherclasse;
use Illuminate\Support\Facades\Auth;

          
        $teacher_info ;
        $teacher_prof = teacherprofile::find($teacher_info->id);
      $teacher_post = teacherpost::find($teacher_info->id);
      $teacher_class = teacherclasse::find($teacher_info->id);
        
       $users = DB::table('teacher_posts')->where('teacher_id', $teacher_info->id)->get();
       $class = DB::table('teacher_classe')->where('teacher_id', $teacher_info->id)->get();
       //dd($class );
        
        
        
?>
@section('content')


@endsection