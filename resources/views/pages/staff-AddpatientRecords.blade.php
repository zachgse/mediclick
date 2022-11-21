@extends('layouts.app')


@section('content')
<div class="container-fluid" style="margin:auto;"><!--Start of Container-->

<form method="POST" action="/pages/{{ $patient->id }}/staff-AddpatientRecords" enctype ="multipart/form-data">
@method('PUT')
@csrf
    <h5>Record</h5>
    <hr>
    <div class="row">
        <div class="col-4"><b>Name</b></div>
        <div class="col-4">{{$patient->userPatient->firstName}} {{$patient->userPatient->lastName}}</div>
    </div>
    <div class="row">
        <div class="col-4"><b>Date of Recorded</b></div>
        <div class="col-4">{{$patient->created_at}}</div>
    </div>
    
    <div class="row">
        <div class="col-4"><b>Attending Physician</b></div>
        <div class="col-4">{{$patient->patientEmployee->userEmployee->firstName}} {{$patient->patientEmployee->userEmployee->lastName}} </div>
    </div>
    <hr>

    <!--Vital Signs-->
    <h5 style="text-align:center;"><b>Vital Signs</b></h5>

    <div class="row row-cols-4">
        <div class="col"><b>Body temperature</b>
    </div>
        <div class="col">
        <input id="bodyTemp" type="text" class="form-control @error('bodyTemp') is-invalid @enderror" name="bodyTemp" value="{{ $patient ->bodyTemp }}" required autocomplete="bodyTemp" placeholder="bodyTemp">
        @error('bodyTemp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</div>
        
        <div class="col"><b>Pulse rate</b></div>
        <div class="col">
        <input id="pulseRate" type="text" class="form-control @error('pulseRate') is-invalid @enderror" name="pulseRate" value="{{ $patient ->pulseRate }}" required autocomplete="pulseRate" placeholder="pulseRate">
        @error('pulseRate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    </div>
    <br>
    <div class="row row-cols-4">
        <div class="col>"><b>Blood Pressure</b></div>
        <div class="col">
             <input id="bloodPressure" type="text" class="form-control @error('bloodPressure') is-invalid @enderror" name="bloodPressure" value="{{ $patient ->bloodPressure }}" required autocomplete="bloodPressure" placeholder="bloodPressure">
             @error('bloodPressure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</div>
        <div class="col"><b>Respiration Rate</b></div>
        <div class="col">
            <input id="respirationRate" type="text" class="form-control @error('respirationRate') is-invalid @enderror" name="respirationRate" value="{{ $patient ->respirationRate }}" required autocomplete="respirationRate" placeholder="respirationRate">
            @error('respirationRate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</div>
    </div>

   
    <br>
   
    <hr>
    <h5 style="text-align:center;"><b>Others</b></h5>
    <div class="row row-cols-4">
        <div class="col"><b>Right Eye Grade</b></div>
        <div class="col">
        <input id="rightEye" type="text" class="form-control @error('rightEye') is-invalid @enderror" name="rightEye" value="{{ $patient ->rightEye }}" required autocomplete="rightEye" placeholder="rightEye">
        @error('rightEye')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</div>
        <div class="col"><b>Left Eye Grade</b></div>
        <div class="col">
        <input id="leftEye" type="text" class="form-control @error('leftEye') is-invalid @enderror" name="leftEye" value="{{ $patient ->leftEye }}" required autocomplete="leftEye" placeholder="leftEye">
        @error('leftEye')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    </div>
    <br>
    <div class="row row-cols-4">
        <div class="col"><b>Height(ft)</b></div>
        <div class="col">
        <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $patient ->height }}" required autocomplete="height" placeholder="height">
        @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</div>
        
        <div class="col"><b>Weight(kg)</b></div>
        <div class="col">
        <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ $patient ->weight }}" required autocomplete="weight" placeholder="weight">
        @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror</div>
    </div>

    <br>
    <div class="row row-cols-6">
      
   
  
    </div>

    <div class="row mb-3">
                            <label for="bloodType" class="col-md-4 col-form-label text-md-end">{{ __('Blood Type') }}</label>

                            <div class="col-md-8">
                                <select name="bloodType" id="bloodType" type="text" class="form-control @error('bloodType') is-invalid @enderror" name="bloodType" value="{{ old('bloodType') }}" required autocomplete="bloodType">
                                    <option value=""> --Select-- </option>
                                    <option value="O+"> O+ </option>
                                    <option value="O-"> O- </option>
                                    <option value="A+ "> A+ </option>
                                    <option value=" A-"> A- </option>
                                    <option value="B+ "> B+ </option>
                                    <option value=" B-"> B- </option>
                                    <option value="AB+"> AB+ </option>
                                    <option value=" AB-"> AB- </option>
                                </select>     
                                @error('bloodType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

    <hr>

   
    </div><!--End-->
    <br>
    <br>
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
</div>
</div><!--End of container--> 
@endsection