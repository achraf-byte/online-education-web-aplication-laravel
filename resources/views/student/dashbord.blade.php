@extends('layouts.master_auth')
<?php
    use App\Models\student;
    use App\Models\studentprofile;
    use App\Models\teacherprofile;
    use App\Models\teacher;
    use App\Models\teacherclasse;
    use App\Models\studentpost;

    use Illuminate\Support\Facades\Auth;
          
        $student_info ;
        $auth_guard = Auth::guard('student')->user()->id;
        $auth_guard_pic =studentprofile::find($auth_guard);
        $auth_guard_ifno =student::find($auth_guard);
        $student_prof = studentprofile::find($student_info->id);
      $student_post = studentpost::find($student_info->id);
      //dd(Auth::guard('student')->check());
        
       $users = DB::table('student_posts')->where('student_id', $student_info->id)->orderBy('id', 'DESC')->get();
       //$student_prof= DB::table('student_profiles')->where('student_id', $student_info->id)->get();
       //dd($student_prof->image_couvert );
       //dd(DB::table('student_profiles')->where('student_id', $student_info->id)->get());
       $following =  DB::table('Followding')->select('being_Followd')->where('being_FollowdBy_id',  Auth::guard('student')->user()->id)->get(); 
       $following_cont =  DB::table('Followding')->select('being_Followd')->where('being_FollowdBy_id',  Auth::guard('student')->user()->id)->count(); 
       $is_followed =  DB::table('Followding')->select('being_Followd')->where([['being_FollowdBy_id', '=', Auth::guard('student')->user()->id],['being_Followd', '=', $student_info->id]])->count(); 
       $followed_class =  DB::table('followclass')->select('class_id')->where('student_id', '=', Auth::guard('student')->user()->id)->get();
 /////   //Followding::select('being_Followd')->where('being_FollowdBy_id', Auth::guard('student')->user()->id)->get();
 //$followed_class = teacherclasse::find($followed_class);

 //dd($following_cont)  ;
        
        
        
?>
@section('content')
<div class=" p-4  d-flex justify-content-between w-75 ml-auto mr-auto tophh">
    



<form method="get" enctype="multipart/form-data" class="w-50 ml-5"  action="/search/">
<input class="form-control  h-100  p-3 text-white bg-transparent mr-sm-2" v-model="search" type="search" placeholder="Search For Class"name="search">
@if(isset($class_id))   
<a class="text-decoration-none" href="/teacher/c/{{$class_id}}">
    <div class=" position-absolute z2 d-flex justify-content-lg-start  redift   bg-white">
    <img class="pic_nav mt-auto mb-auto redift  p-0 ml-1 mr-3" src="/storage/{{$teacher_infoo}}" alt="">
        <div class="d-block mt-1 pr-3">
            <div class="d-flex">
            <h4><strong>{{ $teacher_in->first_name }} </strong></h4>
            <h5 class="ml-1 mt-1">{{ $teacher_in->last_name }}</h5>
            </div>
            
            <h5>{{ $class_code }}</h5>
        </div>
    </div>
    </a>
@endif    
</form>
<form method="get" enctype="multipart/form-data" class="w-25 ml-3"  action="/search/user">
<input class="form-control h-100  p-3 text-white bg-transparent mr-sm-2" v-model="search" type="search" placeholder="Search For users"name="search">
    @if(isset($user))
    <a class="text-decoration-none" href="/s/{{$user->id}}">
    <div class=" position-absolute z4 d-flex justify-content-lg-start  redift   bg-white">
    <img class="pic_nav mt-auto mb-auto redift  p-0 ml-1 mr-3" src="/storage/{{ $user_prof->image_profile}}" alt="">
        <div class="d-block mt-1 pr-3">
            <h4><strong>{{ $user->first_name }} </strong></h4>
            <h5>{{$user->last_name }}</h5>
        </div>
    </div>
    </a>
    @endif

</form>
<a href="/s/{{Auth::guard('student')->user()->id}}">
<div class="d-flex justify-content-lg-start w-auto redift ml-5 w-25 bg-white">
<img class="pic_nav mt-auto mb-auto redift  p-0 ml-1 mr-3" src="/storage/{{ $auth_guard_pic->image_profile}}" alt="">
    <div class="d-block mt-1 pr-3">
    
        <h4><strong>{{ $auth_guard_ifno->first_name }} </strong></h4>
        <h5>{{$auth_guard_ifno->last_name }}</h5>
    </div>
</div>
</a>

</div>


<div class="d-flex flex-row m-2">
                    <div class=" border radiois border-0  w-75 ml-3 mr-3 ">
                        <div class=" d-block">
                            <div class=" border-0 w-100  radiois mb-3     bg-white">
                                <div class="card w-100 radiois hiuh">
                                    <img src="/storage/{{ $student_prof->image_couvert}}" class="card-img-top couv_size radioiscv " alt="{{ asset('dec/profile_pic.png') }}">
                                    <div class="card-body tophh w-100 d-flex">
                                        <img class="prof_pic ml-5" src="/storage/{{ $student_prof->image_profile}}" alt="">
                                        <div class="d-flex ml-4 mt-3 justify-content-between w-100 d-inline-block">
                                            <div class="d-block">
                                                <h3 class="text-uppercase ml-2 mt-5 ">
                                                <strong>{{ $student_info->first_name }} </strong>
                                                </h3>
                                                <h3 class="ml-2 ">
                                                    {{ $student_info->last_name }} 
                                                </h3>
                                                <p class="ml-2 ">
                                                {{ $student_prof->url ?? 'Add a desctption' }} 
                                                </p>
                                            </div>
                                                
                                                @auth("student")
                                            @if ($student_info->id==Auth::guard('student')->user()->id)
                                            <div class="d-flex ml-auto llll   hhhhy">
                                                <a class="d-flex mr-auto" href="/student/update">
                                                    <p class="menu-p">Edit Profile</p>
                                                    <img class="menu mr-auto rounded-circle" src="{{ asset('dec/menu.png') }}" alt="">
                                                </a>
                                                
                                            </div>
                                            @endauth
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @auth("student")
                            @if ($student_info->id==Auth::guard('student')->user()->id)
                            <div class="p-2 border-0 radiois d-flex justify-content-center mb-3   bg-white">
                                <a href="/student/update"><button  class=" btn p-3 rounded-pill  pl-5 pr-5  m-3 btn-outline-primary">Update Profile</button></a>
                                <a href="/student/post"><button  class=" btn p-3 rounded-pill pl-5 pr-5  m-3 btn-outline-primary">Add a post</button></a>
                                
                            </div>
                            @endif
                            @endauth
                            @if($is_followed==1) 
                            <div class="p-2 border-0 radiois d-flex justify-content-center mb-3   bg-white">
                                    <a href="/unfollowme/{{Auth::guard('student')->user()->id}}/{{$student_info->id}}"><button class=" d-flex btn p-3 rounded-pill pl-5 pr-5  m-3 btn-outline-primary">UnFolow Me</button></a>

                            </div>
                            @endif
                            
                            @auth("student")
                            @if (($student_info->id!=Auth::guard('student')->user()->id)&&($is_followed!=1))
                            <div class="p-2 border-0 radiois d-flex justify-content-center mb-3   bg-white">
                                    <a href="/followme/{{Auth::guard('student')->user()->id}}/{{$student_info->id}}"><button class=" d-flex btn p-3 rounded-pill pl-5 pr-5  m-3 btn-outline-primary">Folow Me</button></a>

                            </div>
                            @endif
                            @endauth
                            @foreach ($users as $user)
                            <div class="p-2 border-0 radiois mt-3 mb-3  bg-white">
                                <div class="card-header bg-transparent w-100 mb-2 ">
                                    <div class="d-flex">
                                        <div class="col-md-1">
                                            <img class="post_prof_pic" src="/storage/{{ $student_prof->image_profile}}" alt="">
                                        </div>
                                        <div class="d-flex w-100  justify-content-between">
                                            <div class="d-block w-100 ml-3 d-inline-block">
                                                <h3 class="ml-2">
                                                <strong>{{ $student_info->first_name }} </strong>
                                                </h3>
                                                
                                                <p class="ml-2 ">
                                                {{($user->caption)}}
                                                </p>
                                            </div>
                                            @auth("student")
                                            @if ($student_info->id==Auth::guard('student')->user()->id)
                                            <div class="d-flex mr-auto  mt-3 hhhhy">
                                                <a class="d-flex mr-auto" href="/student/Edit/post/{{($user->id)}}">
                                                    <p class="menu-p">Edit Post</p>
                                                    <img class="menu mr-auto rounded-circle" src="{{ asset('dec/menu.png') }}" alt="">
                                                </a>
                                                
                                            </div>
                                            @endauth
                                            @endif
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
                    @auth("student")
                   
                    @foreach ($followed_class as $class) 
                    <a href="/teacher/c/{{$class->class_id}}">
                    <div class=" border-0   d-flex justify-content-center mb-4 ml-3 mr-3  radiois  w-100    bg-white">
                            
                                
                                
                                
                                <div class=" p-2 pt-3 pb-3 d-flex">
                                <img class="pic_nav mt-auto mb-auto redift mr-4  p-0 " src="/storage/{{teacherprofile::find(teacherclasse::find($class->class_id)->teacher_id)->image_profile}}" alt="">

                                    <div class="d-block">
                                    <div class=" d-flex">
                                    <h5 class=" d-flex justify-content-between mr-3 " ><strong>Teacher :</strong></h5> <h5 class="mr-2" >{{teacher::find(teacherclasse::find($class->class_id)->teacher_id)->first_name}}</h5> <h5 class="" >{{teacherprofile::find(teacherclasse::find($class->class_id)->teacher_id)->last_profile}}</h5>

                                    </div>
                                    <div class=" d-flex">
                                    <h5 class=" d-flex justify-content-between mr-3 " ><strong>Code :</strong></h5> <h5 class="" >{{teacherclasse::find($class->class_id)->code}}</h5>

                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer bg-transparent d-flex justify-content-center">
                                    <h5></h5>
                                </div>
                            
                    </div>
                    </a> 
                    @endforeach
                    @endauth
                    
                    <div class="p-2 border bgopacty  card d-flex justify-content-center mb-4  radiois  w-100 ml-3 mr-3  bg-white">
                         <div class="card-body bg-transparent d-flex justify-content-center">
                             <h1 class="font-weight-bolder"> following</h1>
                         </div>
                    </div> 
                    @foreach ($following as $user)
                    <a href="/s/{{student::find($user->being_Followd)->id}}">
                        <div class="p-2 border bgopacty  d-flex justify-content-md-start mb-4  radiois  w-100 ml-3 mr-3  bg-white">
                            
                            <div class="col-md-1 mr-5">
                                <img class="post_prof_pic" src="/storage/{{studentprofile::find($user->being_Followd)->image_profile}}" alt="">
                            </div>
                            <div class="d-block mt-3 ml-5">
                                <h4> <strong>{{student::find($user->being_Followd)->first_name}} </strong>  {{student::find($user->being_Followd)->last_name}}</h4>
                                <p>2020</p>
                            </div>
                            
                        </div> 
                    </a>
                    @endforeach 
                    
                    
                    
                    
                    
                </div>
               
</div>             

@endsection