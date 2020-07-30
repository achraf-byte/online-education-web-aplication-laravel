@extends('layouts.master_auth')

@section('content')
<div class="card md-col-12 w-75 ml-auto mr-auto  ">
<div class="  card-header"> Edit profile</div>
                    

                    
                    <div class=" card-body">
                        
                            <form method="post" enctype="multipart/form-data" action="/student/editP">
                            @csrf 
                               
                            <div class="row">
                                    <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('url') }}</label>

                                    <div class="col-md-6">
                                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url">

                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            
                                <div class="form-group row">
                                    <label for="image_couvert" class="col-md-4 col-form-label text-md-right">{{ __('image de couverture') }}</label>

                                    <div class="col-md-6">
                                        <input id="image_couvert" type="file" class="form-control @error('image_couvert') is-invalid @enderror" name="image_couvert"   autofocus>

                                        @error('image_couvert')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="image_profile" class="col-md-4 col-form-label text-md-right">{{ __('image_profile') }}</label>

                                    <div class="col-md-6">
                                        <input id="image_profile" type="file" class="form-control @error('image_profile') is-invalid @enderror" name="image_profile" >

                                        @error('image_profile')
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
                                            add a profile
                                        </button>
                                    </div>
                                </div>
                            
                    </form>
                
                </div>
            </div>
</div>
@endsection