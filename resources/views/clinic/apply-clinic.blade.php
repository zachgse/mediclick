@extends('layouts.app')



@section('content')
<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">
  <div class="container">
    <div class="row"> <!--Start of Image Column -->
      <div class="container">
      </div><!---End of Image Column -->

      @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>Apply to a Clinic</b></h2>
   
    
    <!---Start of Form--->
    <div class="card-body">
                    <form method="POST" action="/apply-clinic" enctype ="multipart/form-data">
                        @csrf
                    

                     

                            <div class="row mb-3">
                                <label for="clinic_id" class="col-md-4 col-form-label text-md-end">{{ __('Clinic') }}</label>

                                <div class="col-md-6">
                                    <select name="clinic_id" id="clinic_id" type="text" class="form-control @error('clinic_id') is-invalid @enderror" name="clinic_id" value="{{ old('clinic_id') }}" required autocomplete="clinic_id" >
                                        <option value=""> --Select-- </option>
                                        @foreach($clinics as $clinic)
                                        <option value="{{$clinic['id']}}"> {{$clinic['name']}} </option>
                                        @endforeach
                                    </select>     
                                    @error('clinic_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                            </div>         
                                                        
                            <hr>

                            <div class="row">
                                <div class="col"><b>Employoee ID/Government Issued ID</b></div>
                                <p>This is certify that you are working in the clinic you are applying for. </p>
                                <div class="col"><input type="file" class="form-control @error('proof_image') is-invalid @enderror" id="customFile" name="proof_image" />
                                @error('proof_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                              </div>
                            </div>

                            <hr>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                 <button class="btn btn-warning" type="submit" onclick="return confirm('Send an application to this clinic?')">Apply to a clinic</button>
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