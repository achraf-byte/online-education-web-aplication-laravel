@extends('layouts.master_auth')

@section('content')
<div class="card md-col-12 w-75 ml-auto mr-auto  ">
<div class="  card-header"> Create a new classe</div>
                    

                    
                    <div class=" card-body">
                        
                            <form method="post" enctype="multipart/form-data" action="/teacher/class/m">
                            @csrf 
                               

                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('code') }}</label>

                                    <div class="col-md-6">
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code"   autofocus>

                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" >

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('subject') }}</label>

                                    <div class="col-md-6">
                                        <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" >

                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('school') }}</label>

                                    <div class="col-md-6">
                                        <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" >

                                        @error('school')
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
                                            créé une nouvel classe
                                        </button>
                                    </div>
                                </div>
                            
                    </form>
                
                </div>
            </div>
</div>
@endsection