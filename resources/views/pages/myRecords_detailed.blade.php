@extends('layouts.app')
<style>
  aside * {
      display: none;
  }
  @media print{
      body *{
          visibility: hidden;
      }
      main *{
          display: none;
      }
      aside, aside * {
          visibility: visible;
          display: block;
      }
  }
</style>

@section('content')

@if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
<main class="position relative">
<div class="content">
  <div class="container" style="font-size: 18px;">

    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
          <h4>Patient Details</h4>
        <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
        <hr>

    
                
          
          <div class="row">
          <div class="col"><b>Patient</b></div>
          <div class="col">{{$patient->userPatient->lastName}}, {{$patient->userPatient->lastName}}</div>
      </div>
        <div class="row">
          <div class="col"><b>Physician</b></div>
          <div class="col">{{$patient->patientEmployee->userEmployee->firstName}} {{$patient->patientEmployee->userEmployee->lastName}}</div>
        </div>
        </div>
      </div>

        <div class="col-md-6">
          <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
            <div class="row">
              <h5>Patient Record</h5>
              
              <div class="col"><b>Weight</b></div>
              <div class="col">{{$patient->weight}}</div>
            </div>
            <div class="row">
              <div class="col"><b>Height</b></div>
              <div class="col">{{$patient->height}}</div>
            </div>
            <div class="row">
              <div class="col"><b>Blood Type</b></div>
              <div class="col">{{$patient->bloodType}}</div>
            </div><div class="row">
              <div class="col"><b>Right eye grade</b></div>
              <div class="col">{{$patient->rightEye}}</div>
            </div>
            <div class="row">
              <div class="col"><b>Left eye grade</b></div>
              <div class="col">{{$patient->leftEye}}</div>
            </div>
            <hr>
            <h5>Vital Signs</h5>
            <hr>
            <div class="row">
              <div class="col"><b>Pulse rate</b></div>
              <div class="col">{{$patient->pulseRate}}</div>
            </div>
            <div class="row">
              <div class="col"><b>Respiration rate</b></div>
              <div class="col">{{$patient->respirationRate}}</div>
            </div>
            <div class="row">
              <div class="col"><b>Blood pressure</b></div>
              <div class="col">{{$patient->bloodPressure}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Body temperature</b></div>
            <div class="col">{{$patient->bodyTemp}}</div>
          </div>
        </div>
        <br>
        <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
          <h4>Family and Social history</h4>
          <hr>
        <div class="row">
          <div class="col"><b>Blood type</b></div>
          <div class="col">{{$patient->bloodType}}</div>
        </div>
        <div class="row">
          <div class="col"><b>tobacco</b></div>
          <div class="col">
            <?php if($patient->tobacco== '1') { ?>
              Yes 
             <?php } else { ?>  
      
             No
             <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col"><b>Alcohol</b></div>
          <div class="col">
            <?php if($patient->alcohol== '1') { ?>
              Yes 
             <?php } else { ?>  
      
             No
             <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col"><b>Drugs</b></div>
          <div class="col">
            <?php if($patient->drugs== '1') { ?>
              Yes 
             <?php } else { ?>  
      
             No
             <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col"><b>Hypertension</b></div>
          <div class="col">
            <?php if($patient->hypertension== '1') { ?>
              Yes 
             <?php } else { ?>  
      
             No
             <?php } ?>
          </div>
        </div><div class="row">
          <div class="col"><b>Heart Disease</b></div>
          <div class="col">
            <?php if($patient->heartDisease== '1') { ?>
              Yes 
             <?php } else { ?>  
      
             No
             <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col"><b>Kidney Disease</b></div>
          <div class="col">
            <?php if($patient->kidneyDisease== '1') { ?>
              Yes 
             <?php } else { ?>  
      
             No
             <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col"><b>Diabetes</b></div>
          <div class="col">
            <?php if($patient->diabetese== '1') { ?>
              Yes 
             <?php } else { ?>  
      
             No
             <?php } ?>
          </div>
        </div>
      
        <div class="row">
          <div class="col"><b>Social remarks</b></div>
          <div class="col">{{$patient->socialRemarks}}</div>
        </div><div class="row">
          <div class="col"><b>Family remarks</b></div>
          <div class="col">{{$patient->familyRemarks}}</div>
        </div>
      </div>
      
    <br>
    <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
      <div class="row">
        <div class="col"><b>Diagnosis</b></div>
        <div class="col">{{$patient->diagnosis}}</div>
      </div>

    

      <div class="row">
        <div class="col"><b>Prescription</b></div>
        <div class="col"> <a href="{{asset('patientFiles/' . $patient->prescription)}}" download>
          <button type="submit" class="btn btn-warning">       Download</button> </a></div>
      </div>
      
      </div>

    </div>
  </div><!--End of container-->
</div><!--End of Content-->

</main>

<aside class="container">
  <div class="row">
    <div class="col"><b>Patient</b></div>
    <div class="col">{{$patient->userPatient->lastName}}l, {{$patient->userPatient->lastName}}</div>
</div>
  <div class="row">
    <div class="col"><b>Physician</b></div>
    <div class="col">{{$patient->patientEmployee->userEmployee->firstName}} {{$patient->patientEmployee->userEmployee->lastName}}</div>
  </div>
  <div class="row">
    <div class="col"><b>Weight</b></div>
    <div class="col">{{$patient->weight}}</div>
  </div>
  <div class="row">
    <div class="col"><b>Height</b></div>
    <div class="col">{{$patient->height}}</div>
  </div>
  <div class="row">
    <div class="col"><b>Blood Type</b></div>
    <div class="col">{{$patient->bloodType}}</div>
  </div><div class="row">
    <div class="col"><b>Right eye grade</b></div>
    <div class="col">{{$patient->rightEye}}</div>
  </div>
  <div class="row">
    <div class="col"><b>Left eye grade</b></div>
    <div class="col">{{$patient->leftEye}}</div>
  </div>
  <hr>
  <h4>Vital Signs</h4>
  <hr>
  <div class="row">
    <div class="col"><b>Pulse rate</b></div>
    <div class="col">{{$patient->pulseRate}}</div>
  </div>
  <div class="row">
    <div class="col"><b>Respiration rate</b></div>
    <div class="col">{{$patient->respirationRate}}</div>
  </div>
  <div class="row">
    <div class="col"><b>Blood pressure</b></div>
    <div class="col">{{$patient->bloodPressure}}</div>
  
    
  </div>
  
  <div class="row">
    <div class="col"><b>Body temperature</b></div>
    <div class="col">{{$patient->bodyTemp}}</div>

    <hr>
    <h4>Family and Social history</h4>
    <hr>
  </div><div class="row">
    <div class="col"><b>Blood type</b></div>
    <div class="col">{{$patient->bloodType}}</div>
  </div>
  <div class="row">
    <div class="col"><b>tobacco</b></div>
    <div class="col">
      <?php if($patient->tobacco== '1') { ?>
        Yes 
       <?php } else { ?>  

       No
       <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col"><b>Alcohol</b></div>
    <div class="col">
      <?php if($patient->alcohol== '1') { ?>
        Yes 
       <?php } else { ?>  

       No
       <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col"><b>Drugs</b></div>
    <div class="col">
      <?php if($patient->drugs== '1') { ?>
        Yes 
       <?php } else { ?>  

       No
       <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col"><b>Hypertension</b></div>
    <div class="col">
      <?php if($patient->hypertension== '1') { ?>
        Yes 
       <?php } else { ?>  

       No
       <?php } ?>
    </div>
  </div><div class="row">
    <div class="col"><b>Heart Disease</b></div>
    <div class="col">
      <?php if($patient->heartDisease== '1') { ?>
        Yes 
       <?php } else { ?>  

       No
       <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col"><b>Kidney Disease</b></div>
    <div class="col">
      <?php if($patient->kidneyDisease== '1') { ?>
        Yes 
       <?php } else { ?>  

       No
       <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col"><b>Diabetes</b></div>
    <div class="col">
      <?php if($patient->diabetese== '1') { ?>
        Yes 
       <?php } else { ?>  

       No
       <?php } ?>
    </div>
  </div>

  <div class="row">
    <div class="col"><b>Diagnosis</b></div>
    <div class="col">{{$patient->diagnosis}}</div>
  </div>
  <div class="row">
    <div class="col"><b>Social remarks</b></div>
    <div class="col">{{$patient->socialRemarks}}</div>
  </div><div class="row">
    <div class="col"><b>Family remarks</b></div>
    <div class="col">{{$patient->familyRemarks}}</div>
  </div>  
  

</div><!--End of column-->
</div><!--End of column--> 
</div><!--End of row-->

<br>

 
</div><!--End of container-->
</div><!--End of Content-->


</aside>


@endsection


                     