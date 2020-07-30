@extends('layouts.master_auth')

@section('content')
<div class="card md-col-12 w-75 ml-auto mr-auto  ">
<div class="  card-header"> Add new Document</div>
                    

                    
                    <div class=" card-body">
                        
                            <form method="post" enctype="multipart/form-data" action="/teacher/file/make">
                            @csrf 
                               

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"   autofocus>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="titel" class="col-md-4 col-form-label text-md-right">{{ __('titel') }}</label>

                                    <div class="col-md-6">
                                        <input id="titel" type="text" class="form-control @error('titel') is-invalid @enderror" name="titel"   autofocus>

                                        @error('titel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('document') }}</label>

                                    <div class="col-md-6">
                                        <input id="document" type="file" class="form-control @error('document') is-invalid @enderror" name="document" >

                                        @error('document')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row invisible ">
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
                                <div class="row invisible ">
                                    <label for="classe_id" class="col-md-4 col-form-label text-md-right">{{ __('classe_id') }}</label>

                                    <div class="col-md-6">
                                        <input id="classe_id" type="text" class="form-control @error('classe_id') is-invalid @enderror" name="classe_id" value="{{ $teacher_class->id }}" >

                                        @error('classe_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn mt-5 btn-primary">
                                            cree un documment
                                        </button>
                                    </div>
                                </div>
                            
                    </form>
                
                </div>
            </div>
</div>
@endsection