@extends('layouts.master_auth')
<?php
use App\Models\student;
use App\Models\studentprofile;
use App\Models\studentpost;
use App\Models\studentclasse;
use Illuminate\Support\Facades\Auth;

          
       // $student_info ;
       // $student_prof = studentprofile::find($student_info->id);
      //$student_post = studentpost::find($postid);
      
      //$student_class = studentclasse::find($student_info->id);
        
     //  $users = DB::table('student_posts')->where('student_id', $student_info->id)->get();
     //  $class = DB::table('student_classe')->where('student_id', $student_info->id)->get();
       //dd($class );
        
        
        
?>
@section('content')
<div class="card md-col-12 w-75 ml-auto mr-auto  ">
<div class="  card-header">Update post</div>
                    

                    
                    <div class=" card-body">
                        
                            <form method="post" enctype="multipart/form-data" action="/student/updatep/{{ $post_info->id }}">
                            @csrf 
                               

                                <div class="form-group row">
                                    <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('caption') }}</label>

                                    <div class="col-md-6">
                                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" value="" name="caption"   autofocus>

                                        @error('caption')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" >

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row invisible">
                                    <label for="student_id" class="col-md-4 col-form-label text-md-right">{{ __('student_id') }}</label>

                                    <div class="col-md-6">
                                        <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ Auth::guard('student')->user()->id }}" >

                                        @error('student_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn mt-5 btn-primary">
                                            update post
                                        </button>
                                    </div>
                                </div>  
                        </form>
                
                </div>
            </div>
</div>
@endsection