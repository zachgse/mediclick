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
                  <th>Date</th>
                  <th>Physician</th>
                  <th>Clinic</th>
                  <th>Action</th>
       
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($patients as $patient)
                
                  <td>{{$patient->created_at}}</td>
                  <td>{{$patient->patientEmployee->userEmployee->firstName}} {{$patient->patientEmployee->userEmployee->lastName}}</td>
                  <td>{{$patient->clinicPatient->name}}</td>
             
                  <td> 
                 
                  <a href ="/pages/{{$patient->id}}/myRecords_detailed"> 
                      View</a>    
                  </td>
        
                  </tr>
             
                @endforeach
                  
                  
                </tbody>
              </table>

           
    </div>
</div>

@endsection

