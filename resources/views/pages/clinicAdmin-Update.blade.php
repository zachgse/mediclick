@extends('layouts.app')



@section('content')
<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">
  <div class="container">
    <div class="row"> <!--Start of Image Column -->
      <div class="container">
      </div><!---End of Image Column -->
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>Edit Clinic</b></h2>
      <p style="text-align:center">Please input valid information</p>
    
    <!---Start of Form--->
    <div class="card-body">
                    <form method="POST" action="/clinicAdmin-Update/{{ $post->id }}" enctype ="multipart/form-data" >

                       @method('PUT')
                            @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Clinic Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" name="name" value="{{ $post->name}}" class="form-control @error('name') is-invalid @enderror"  required autocomplete="name"  >

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

             

                        <div class="row mb-3">
                            <label for="blockNo" class="col-md-4 col-form-label text-md-end">{{ __('Address (Block, Street No)') }}</label>

                        <div class="col-md-8">
                                <input id="blockNo" type="text" class="form-control @error('blockNo') is-invalid @enderror" name="blockNo" value="{{ $post->blockNo }}" required autocomplete="blockNo" placeholder="Block or Street Number">

                                @error('blockNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                       
                   

                        <div class="row mb-3">
                            <label for="contactNo" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                        <div class="col-md-8">
                                <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ $post->contactNo }}" required autocomplete="contactNo" placeholder="Contact Number">

                                @error('contactNo')
                                    <span class="invalid-feedback" role="alert">    
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                        <div class="col-md-8">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $post->city }}" required autocomplete="city" placeholder="City">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="barangay" class="col-md-4 col-form-label text-md-end">{{ __('Barangay') }}</label>

                        <div class="col-md-8">
                                <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ $post->barangay }}" required autocomplete="barangay" placeholder="Barangay">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zip" class="col-md-4 col-form-label text-md-end">{{ __('Zip') }}</label>

                        <div class="col-md-8">
                                <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ $post->zip }}" required autocomplete="zip" placeholder="Zip code">

                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col"><b>Clinic Certification</b></div>
                                <div class="col"><input type="file" class="form-control" id="customFile" name="proof_image" />
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col"> </div>
                                <div class="col">  @if (Route::has('password.request'))
                                    <a class="btn btn-warning" href="{{ route('password.request') }}">
                                        {{ __('Reset Password') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        

                      

                    <br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>

        </form>
        
        </div> <!--End of Form Column--->
        
      </div>
    </div>
    
  </div>
  </section>



 
@endsection