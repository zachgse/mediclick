@extends('layouts.app')



@section('content')
<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">
  <div class="container">
    <div class="row"> <!--Start of Image Column -->
      <div class="col-md-6 col-lg-5 d-none d-md-block">
      <img class="image" class="img-fluid" alt="Responsive image" src="img/page.jpg" width="100%" height="auto">
      </div><!---End of Image Column -->
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>Register your Clinic</b></h2>
      <p style="text-align:center">Please input clinic's valid information</p>
    
    <!---Start of Form--->
    <form class="row g-3" action="{{ route('register') }}" method="POST">
           @csrf
      <!---Clinic Name--->
      <div class="col-12">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
               <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
               </span>
              @enderror
      </div>

      <!--Clinic Email Address -->   
      <div class="col-md-6">
        <label for="email" class="form-label">{{ __('Email Address') }}</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                 <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                 </span>
                @enderror
      </div>


      <!--Clinic Password -->   
      <div class="col-md-6">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                @error('password')
                   <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                   </span>
                @enderror
      </div>
      <div class="col-md-6">
        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
      </div>



      <hr>

      <!--Clinic Information -->   
      <div class="col-12">
        <label for="branchAdd" class="form-label">Branch Address</label>
        <input type="text" class="form-control" id="branchAdd" name="branchAdd" value="{{ old('branchAdd') }}" required autocomplete="branchAdd" autofocus>
      </div>
    
      <div class="col-12">
        <label for="inputAddress" class="form-label">{{ __('Address (Block, Street No)') }}</label>
        <input type="text" class="form-control" id="inputAddress" >
      </div>

      <div class="col-md-6">
        <label for="city" class="form-label">{{ __('City') }}</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
      </div>

      <div class="col-md-4">
        <label for="barangay" class="form-label">Barangay</label>
        <input type="text" class="form-control" id="barangay" name="barangay" value="{{ old('barangay') }}" required autocomplete="barangay" autofocus>
      </div>
      <div class="col-md-2">
        <label for="zip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus>
      </div>

      <hr>

      


      <div class="col-12" style="text-align:center" >
      <a class="btn btn-warning" href="/" role="button">{{ __('Register') }}</a>
      </div>
        </form>
        </div> <!--End of Form Column--->
      </div>
    </div>
    
  </div>
  </section>



 
@endsection