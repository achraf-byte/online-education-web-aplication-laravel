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

<div class="d-flex flex-row m-2">
                    <div class=" border radiois border-0  w-75 ml-3 mr-3 ">
                        <div class=" d-block">
                            <div class=" border-0  radiois mb-3     bg-white">
                                <div class="card radiois hiuh">
                                   <img src="/storage/{{ $teacher_prof->image_couvert}}" class=" couv_size radioiscv " alt="{{ asset('dec/profile_pic.png') }}">
                                    <div class="card-body tophh d-flex">
                                        <img class="prof_pic ml-5" src="/storage/{{ $teacher_prof->image_profile}}" alt="">
                                        <div class="d-block ml-4 mt-3 d-inline-block">
                                                <h3 class="text-uppercase ml-2 mt-5 ">
                                                <strong>{{ $teacher_info->first_name }} </strong>
                                                </h3>
                                                <h3 class="ml-2 ">
                                                    {{ $teacher_info->last_name }} 
                                                </h3>
                                                <p class="ml-2 ">
                                                {{ $teacher_prof->url ?? 'Add a desctption' }} 
                                                </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @auth("teacher")
                            @if ($teacher_info->id==Auth::guard('teacher')->user()->id)
                            <div class="p-2 border-0 radiois d-flex justify-content-center mb-3   bg-white">
                                <a href="/teacher/update"><button  class=" btn p-3 rounded-pill  pl-5 pr-5  m-3 btn-outline-primary">Update Profile</button></a>
                                <a href="/teacher/post"><button  class=" font-weight-lighter rounded-pill btn p-3  pl-5 pr-5  m-3 btn-outline-primary">Add a post</button></a>
                                <a href="/teacher/class"><button class=" font-weight-lighter rounded-pill btn p-3  pl-5 pr-5  m-3 btn-outline-primary">Add a class</button></a>
                            </div>
                            @endif
                            @endauth
                            @foreach ($users as $user)
                            <div class="p-2 border-0 radiois mt-3 mb-3  bg-white">
                                <div class="card-header bg-transparent w-100 mb-2 ">
                                    <div class="d-flex">
                                        <div class="col-md-1">
                                            <img class="post_prof_pic" src="/storage/{{ $teacher_prof->image_profile}}" alt="">
                                        </div>
                                        
                                        <div class="d-flex w-100  justify-content-between">
                                            <div class="d-block w-100 ml-3 d-inline-block">
                                                <h3 class="ml-2">
                                                <strong>{{ $teacher_info->first_name }} </strong>
                                                </h3>
                                                
                                                <p class="ml-2 ">
                                                {{($user->caption)}}
                                                </p>
                                            </div>
                                            <div class="d-flex mr-auto  mt-3 hhhhy">
                                                <a class="d-flex mr-auto" href="/teacher/Edit/post/{{($user->id)}}">
                                                    <p class="menu-p">Edit Post</p>
                                                    <img class="menu mr-auto rounded-circle" src="{{ asset('dec/menu.png') }}" alt="">
                                                </a>
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="card border-0  hiyt">
                                <img class="fit hiyt" src="/storage/{{($user->image)}}">
                                    
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                <div class=" d-block    w-25 ml-3 mr-3">
                    
                    <div class="p-2 border bgopacty  card d-flex justify-content-center mb-4  radiois  w-100 ml-3 mr-3  bg-white">
                         <div class="card-body bg-transparent d-flex justify-content-center">
                             <h1 class="font-weight-bolder"> Les classes</h1>
                         </div>
                    </div> 
                    @foreach ($class as $classes)
                    <a class="text-decoration-none" href="/teacher/c/{{($classes->id)}}">
                        <div class=" border-0   d-flex justify-content-center mb-4 ml-3 mr-3  radiois  w-100    bg-white">
                                <div class=" card border-0 h-100 d-block">
                                    <div class="card-header bg-transparent   w-100 d-flex  justify-content-center">
                                        <h2><strong>{{($classes->code)}}</strong></h2>
                                    </div>
                                    
                                    <div class=" h-75 card-body d-block">
                                        <div class="d-flex">
                                        <h5 class="ml-auto flex-start  mr-auto" ><strong>Code</strong></h5> <h5 class="ml-auto mr-auto" >{{($classes->code)}}</h5>
                                        </div>
                                        <div class="d-flex">
                                        <h5 class="ml-auto   mr-auto" ><strong>Le nom</strong></h5> <h5 class="ml-auto mr-auto" >{{($classes->name)}}</h5>
                                        </div>
                                        <div class="d-flex">
                                        <h5 class="ml-auto   mr-auto" ><strong>Subject</strong></h5> <h5 class="ml-auto mr-auto" >{{($classes->subject)}}</h5>
                                        </div>
                                        <div class="d-flex">
                                        <h5 class="ml-auto   mr-auto" ><strong>School</strong></h5> <h5 class="ml-auto mr-auto" >{{($classes->school)}}</h5>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent d-flex justify-content-center">
                                        <h5>{{($classes->created_at)}}</h5>
                                    </div>
                                </div>
                        </div> 
                    </a>
                    @endforeach
                    
                </div>
               
</div>

@endsection