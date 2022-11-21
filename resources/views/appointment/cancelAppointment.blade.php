@extends('layouts.app')



@section('content')



<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">
  <div class="container">
    <div class="row"> <!--Start of Image Column -->
      <div class="container">
      </div><!---End of Image Column -->
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>Cancel an Appointment</b></h2>
      <p style="text-align:center">Please input valid information</p>
    
    <!---Start of Form--->
    <div class="card-body">
                    <form method="POST" action="/appointment/{{$appointment->id}}">
                    @csrf

                    @method('DELETE')
                    <div class="row mb-3">
                            <label for="reason" class="col-md-4 col-form-label text-md-end">{{ __('Reason for Cancellation') }}</label>

                            <div class="col-md-8">
                                <select name="reason" id="reason" type="text" class="form-control @error('reason') is-invalid @enderror" name="reason" value="{{ old('reason') }}" required autocomplete="reason">
                                    <option value=""> --Select-- </option>
                                    <option value="Conflict of schedule"> Conflict of schedule </option>
                                    <option value="Personal Errands "> Personal Errands </option>
                                    <option value="Prefer Not to Mention "> Prefer Not to Mention </option>
                                </select>     
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

                    
                     <!-- Modal -->


                       

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button class="btn btn-warning" type="submit" onclick="return confirm('Are you sure you want to delete this appointment?')">Submit</button>
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