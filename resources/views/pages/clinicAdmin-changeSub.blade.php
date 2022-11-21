@extends('layouts.app')



@section('content')
<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">
  <div class="container">
    <div class="row"> <!--Start of Image Column -->
      <div class="container">
      </div><!---End of Image Column -->
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>Clinic Registration</b></h2>
      <p style="text-align:center">Please input valid information</p>
    
    <!---Start of Form--->
    <div class="card-body">
                    <form method="POST" action="/clinicAdmin-changeSub/{{ $post->id}}">
                    @method('PUT')
                        @csrf
                        
                        
                        <div class="row mb-3">
                            <label for="subscription_id" class="col-md-4 col-form-label text-md-end">{{ __('Subscription Package') }}</label>

                            <div class="col-md-6">
                                <select name="subscription_id" id="subscription_id" type="text" class="form-control @error('relationship') is-invalid @enderror" value="" required autocomplete="subscription_id" >
                                    <option value=""> --Select-- </option>
                                    @foreach($subscription as $subscriptions)
                                    <option value="{{$subscriptions->id}}"> {{$subscriptions->name}} </option>
                                    @endforeach
                                </select>     
                                @error('physician')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

      
                

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