@extends('layouts.master_auth')

@section('content')
<div class="card md-col-12 w-75 ml-auto mr-auto  ">
<div class="  card-header"> Add new post</div>
                    

                    
                    <div class=" card-body">
                        
                            <form method="post" enctype="multipart/form-data" action="/teacher/post/m">
                            @csrf 
                               

                                <div class="form-group row">
                                    <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('caption') }}</label>

                                    <div class="col-md-6">
                                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption"   autofocus>

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
                                    <label for="teacher_id" class="col-md-4 col-form-label text-md-right">{{ __('teacher_id') }}</label>

                                    <div class="col-md-6">
                                        <input id="teacher_id" type="text" class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id" value="{{ Auth::guard('teacher')->user()->id }}" >

                                        @error('teacher_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn mt-5 btn-primary">
                                            add new post
                                        </button>
                                    </div>
                                </div>
                            
                    </form>
                
                </div>
            </div>
</div>
@endsection