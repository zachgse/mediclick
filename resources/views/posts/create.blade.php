@extends('layouts.app')



@section('content')
<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">

  <div class="container">
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row"> <!--Start of Image Column -->
      <div class="container">
      </div><!---End of Image Column -->
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>Clinic Registration</b></h2>
      <p style="text-align:center">Please input valid information</p>
    
    <!---Start of Form--->
    <div class="card-body">
    
                    <form method="POST" action="/posts" enctype ="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Clinic Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('lastNnameame') }}" required autocomplete="name"  placeholder="Clinic Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                

                        <div class="row mb-3">
                            <label for="blockNo" class="col-md-4 col-form-label text-md-end">{{ __('Address (Block, Street No)') }}</label>

                        <div class="col-md-8">
                                <input id="blockNo" type="text" class="form-control @error('blockNo') is-invalid @enderror" name="blockNo" value="{{ old('blockNo') }}" required autocomplete="blockNo" placeholder="Block or Street Number">

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
                                <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" required autocomplete="contactNo" placeholder="Contact Number">

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
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="City">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="barangay" class="col-md-4 col-form-label text-md-end">{{ __('Barangay') }}</label>

                        <div class="col-md-8">
                                <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ old('barangay') }}" required autocomplete="barangay" placeholder="Barangay">

                                @error('barangay')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zip" class="col-md-4 col-form-label text-md-end">{{ __('Zip') }}</label>

                        <div class="col-md-8">
                                <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" placeholder="Zip code">

                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="subscription_id" class="col-md-4 col-form-label text-md-end">{{ __('Subscription Package') }}</label>

                            <div class="col-md-6">
                                <select name="subscription_id" id="subscription_id" type="text" class="form-control @error('relationship') is-invalid @enderror" name="subscription_id" value="{{ old('subscription_id') }}" required autocomplete="subscription_id" >
                                    <option value=""> --Select-- </option>
                                    @foreach($subscriptions as $subscription)
                                    <option value="{{$subscription->id}}"> {{$subscription->name}} </option>
                                    @endforeach
                                </select>     
                                @error('physician')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col"><b>Clinic Certification</b></div>
                            <p>This is to certify that the clinic is registered. </p>
                            <div class="col"><input type="file" class="form-control" id="customFile" name="proof_image" /></div>
                        </div>

                        <hr>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>

        </form>
        
        </div> <!--End of Form Column--->
        <div class="col-md-6 col-lg-5 d-none d-md-block">
            <img
              src="img/pub4.png"
              alt="login form"
              class="img-fluid" style="border-radius: 1rem 0 0 1rem; padding-top: 15%; padding-left:10%" width="100%" height="auto"
            />
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
  </section>




@endsection