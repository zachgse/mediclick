@extends('layouts.app')


@section('content')
        @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
<div class="content">
    <div class="container">
        
          <br>
          <div class="row">
            <div class="col-8">
                <h5><b>Patient Records</b></h5>
           
            </div>
            <!---
            <div class="col-4" style="padding-left:15%;">
                <a class="btn btn-warning" href="/" role="button"style="color: black;">
                    <i class="fa fa-calendar-plus-o" aria-hidden="true" style="color: black"></i>
                         Add Appointment</a>
            </div>-->
          </div> 
          <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Patient</th>
                  <th>Physician</th>
                  <th>Clinic</th>
                  <th>Access Status</th>
                  <th>Request Access Action</th>
       
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($patients as $patient)
                
                  <td>{{$patient->userPatient->lastName}}, {{$patient->userPatient->firstName}}</td>
                  <td>{{$patient->patientEmployee->userEmployee->firstName}} {{$patient->patientEmployee->userEmployee->lastName}}</td>
                  <td>{{$patient->clinicPatient->name}}</td>

                  <?php if($patient->status== '0') { ?>
                           <td>Not Allowed</td>  
                          <?php } 
                          else if($patient->status== '2') { ?>
                            <td>Request to View Patient records sent</td>  
                          <?php } 
                          else { ?>  
                            <td>Allowed</td>  
                          <?php } ?>
                    <td>

                   
                          <div class="row">
                            <div class="col">
                              <form method="POST" action="/pages/{{$patient->id}}/patientRecord">
                                @method('PUT')
                                  @csrf   
                                <button type="submit" class="btn btn-warning">Allow Access</button>  
                                </form>    
                                </form>
                            </div>
                            <div class="col">
                              <form method="POST" action="/patientRecord/{{$patient->id}}">
                          
                                @method('PUT')
                                  @csrf   
                                 <button type="submit" class="btn btn-warning">Disable Access</button>  
                                </form>    
                                 </form>
                            </div>
                          </div>
                      </td>
        
                  </tr>
             
                @endforeach
                  
                  
                </tbody>
              </table>

           
    </div>
</div>

@endsection

