@extends('layouts.master_auth')
<?php
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\studentprofile;
use App\Models\student;
use App\Models\teacherpost;
use App\Models\teacherfile;
use App\Models\teacherclasse;
use Illuminate\Support\Facades\Auth;

          
        $teacher_info ;
        //dd(Auth::guard('teacher')->check());
        $teacher_prof = teacherprofile::where('id', '=', $class->teacher_id)->first();
      $teacher_post = teacherpost::find($teacher_info->id);
      $teacher_class = teacherclasse::find($class->id);
      $teacher_file = DB::table('teacherfiles')->where('classe_id', $class->id)->get();
      if(Auth::guard('student')->check()){
         $teacher_class_id_folowd = DB::table('followclass')->select('class_id')->where([['class_id', '=', $class->id],['student_id', '=', Auth::guard('student')->user()->id]])->count();

      }

      
      $teacher_class_followers = DB::table('followclass')->select('student_id')->where('class_id', $class->id)->get();
   // $teacher_class_followers);  
       $users = DB::table('teacher_posts')->where('teacher_id', $teacher_info->id)->get();
       $class 
       //dd($teacher_info->id);
        
        
        
?>
@section('content')
           
            <div class="d-flex w-100 flex-row ">
               <div class=" border d-flex overflow-hidden justify-content-center  radiois radis  w-25 ml-3 mr-3  bg-white">
                    <div class=" d-block  w-100">
                       <div class="d-flex justify-content-center">
                           <div class="card-header w-100 headerd  pb-4 mb-4 d-flex justify-content-center">
                           <img class="prof_pic_class " src="/storage/{{ $teacher_prof->image_profile}}" alt="">
                           </div>
                       </div>
                       <div class="d-flex mb-2 justify-content-center">
                           <h3 class="text-uppercase mr-2 ">
                              <strong>{{ $teacher_info->first_name }} </strong>
                           </h3>
                           <h3 class=" ">
                                 {{ $teacher_info->last_name }} 
                           </h3>
                       </div>
                       <div class="d-flex pb-4 border-bottom  mb-4 justify-content-center  ">
                       @auth("student")
                          <h1></h1> <a class="btn btn-outline-primary pr-3 pl-3 rounded-pill mr-2 ml-2  pt-3 pt-3 xfont-weight-bolder" href="/t/{{ $teacher_info->id }}"><h4>Vieus Profile</h4></a>
                          @endauth   
                          @auth("student")
                          @if ($teacher_class_id_folowd==1)
                          <h1></h1> <a class="btn btn-outline-primary pr-3 pl-3 rounded-pill mr-2 ml-2  pt-3 pt-3 xfont-weight-bolder" href="/unfollowclass/{{Auth::guard('student')->user()->id}}/{{($teacher_class->id)}}"><h4>unFollow this class</h4></a>
                          @endif
                          @if ($teacher_class_id_folowd!=1)
                          <h1></h1> <a class="btn btn-outline-primary pr-3 pl-3 rounded-pill mr-2 ml-2  pt-3 pt-3 xfont-weight-bolder" href="/followclass/{{Auth::guard('student')->user()->id}}/{{($teacher_class->id)}}"><h4>Follow this class</h4></a>
                          @endif
                          @endauth
                          
                          
                          
                          @auth("teacher")
                          @if ($teacher_info->id==Auth::guard('teacher')->user()->id)
                          <h1></h1> <a class="btn btn-outline-primary pr-3 pl-3 rounded-pill mr-2 ml-2  pt-3 pt-3 xfont-weight-bolder" href="/teacher/{{($teacher_class->id)}}/file"><h4>Add a file</h4></a>
                          @endif
                          @endauth
                       </div>
                       
                       
                        <div class="d-flex ml-5 flex-start ">
                        <h4 class=" ml-5  " ><strong>Code    :</strong></h4> <h4 class="ml-5 " >{{($teacher_class->code)}}</h4>
                        </div>
                        <div class="d-flex ml-5 flex-start ">
                        <h4 class=" ml-5  " ><strong>Le nom  :</strong></h4> <h4 class="ml-5 " >{{($teacher_class->name)}}</h4>
                        </div>
                        <div class="d-flex ml-5 flex-start ">
                        <h4 class=" ml-5  " ><strong>Subject :</strong></h4> <h4 class="ml-5 " >{{($teacher_class->subject)}}</h4>
                        </div>
                        <div class="d-flex ml-5 flex-start ">
                        <h4 class=" ml-5  " ><strong>School  :</strong></h4> <h4 class="ml-5 " >{{($teacher_class->school)}}</h4>
                        </div>
                        
                        <div class="card-footer w-100 h-100 headerd2  d-flex justify-content-center">
                              <h4 class=" mt-3" ><strong class="mr-1">Classe created at :</strong>{{($teacher_class->created_at)}}</h4>
                        </div>

                    </div>
                    
               </div> 
               
            <div class="p-2 border radiois  w-50   ml-3 mr-3 bg-white">
               
                  <div class="card-columns">
                  @foreach ($teacher_file as $file)
                     <div class="card border-0">
                        <div class="single-services border p-2 radiois text-center  wow fadeIn" >
                                 <div class="services-icon ">
                                    <img class="shape" src="{{ asset('assets/images/services-shape.svg') }}" alt="shape">
                                    <img class="shape-1" src="{{ asset('assets/images/services-shape-3.svg') }}" alt="shape">
                                    <i class="fas fa-cloud-download-alt"></i>
                                 </div>
                                 <div class="services-content ">
                                    <h4 class="services-title"><a href="#">{{($file->titel)}}</a></h4>
                                    <p class="text">{{($file->description)}}</p>
                                    <a class="more" href="/storage/{{ $file->document}}">Telecharger le document</a>
                                 </div>
                        </div> <!-- single services -->
                     </div>
                  @endforeach 
                  </div>
               
            </div>
            <div class="d-block ">
               <div class="p-2 border-0   d-flex justify-content-center mb-4 ml-3 mr-3  radiois  w-100    bg-white">
               
                  <h2 class="ml-auto pt-3 pb-3 mr-auto">students on this classe</h2>
            
               </div>
               @foreach ($teacher_class_followers as $followers)
               <a href="/s/{{ student::find($followers->student_id)->id}}"> 
               
            <div class=" border-0   d-flex justify-content-center mb-4 ml-3 mr-3  radiois  w-100    bg-white">
                            
                                
                                
                            
                  <div class=" p-2 pt-3 pb-3 d-flex">
                  <img class="pic_nav mt-auto mb-auto redift mr-4  p-0 " src="/storage/{{ studentprofile::find($followers->student_id)->image_profile  }}" alt="">

                        
                     <div class="mb-auto mt-auto d-flex"> 
                        <h5 class=" d-flex justify-content-between mr-3 " ><strong>{{ student::find($followers->student_id)->first_name}}</strong></h5> 
                        <h5 class="mr-2" >{{ student::find($followers->student_id)->last_name}}</h5> 
                     </div>
                  </div>
            
            </div>
            </a>     
               @endforeach 
            
             
                 
                        
                        

                        
                        
      </div> 
                 
               
             



@endsection