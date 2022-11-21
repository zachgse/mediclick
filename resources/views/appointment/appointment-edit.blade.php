@extends('layouts.app')



@section('content')
<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">
  <div class="container">
    <div class="row"> <!--Start of Image Column -->
      <div class="container">
      </div><!---End of Image Column -->
      <div class="col-6"> <!---Start of Form Column -->
      <h2 style="text-align:center"><b>Edit an Appointment</b></h2>
      <p style="text-align:center">Please input valid information</p>
    
    <!---Start of Form--->
    <div class="card-body">
                    <form method="POST" action="/appointment/{{ $appointment->id }}/appointment-edit">
                        @method('PUT')
                        @csrf
                    

                        <div class="row mb-3">
                            <label for="meeting" class="col-md-4 col-form-label text-md-end">{{ __('Consultation type') }}</label>

                        <div class="col-md-8">
                                <select name="meeting" id="meeting" type="text" class="form-control @error('meeting') is-invalid @enderror" name="meeting" value="{{ $appointment ->meeting }}" required autocomplete="meeting">
                                    <option value="{{ $appointment ->meeting }}"> {{ $appointment ->meeting }} </option>
                                    <option value="Online"> Online </option>
                                    <option value="Face-to-face"> Face-to-face </option>
                                </select>     
                                @error('meeting')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

               
                        <div class="row mb-3">
                            <label for="reason" class="col-md-4 col-form-label text-md-end">{{ __('Reason') }}</label>

                        <div class="col-md-8">
                                <input id="reason" type="text" class="form-control @error('reason') is-invalid @enderror" name="reason" value="{{ $appointment ->reason }}" required autocomplete="reason" placeholder="reason">

                                @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                      
                           
                        
                       

                        <div class="row mb-3">
                            <label for="datetime" class="col-md-4 col-form-label text-md-end">{{ __('Date and time') }}</label>

                        <div class="col-md-8">
                                <input id="datetime" type="datetime-local" class="form-control @error('datetime') is-invalid @enderror" name="datetime" value="{{  $appointment->datetime }}" >

                                @error('datetime')
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