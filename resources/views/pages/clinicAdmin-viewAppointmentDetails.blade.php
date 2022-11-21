@extends('layouts.app')



@section('content')

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
          <h4>Appointment Details</h4>
          <hr>
  
      
          <div class="row">
            <div class="col"><b>Patient</b></div>
            <div class="col">{{$appointment->userAppointment->lastName}}, {{$appointment->userAppointment->firstName}}</div>
        </div>
          <div class="row">
            <div class="col"><b>Type</b></div>
            <div class="col">{{$appointment->meeting}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Date of Appointment</b></div>
            <div class="col">{{$appointment->datetime}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Date Scheduled</b></div>
            <div class="col">{{$appointment->created_at}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Reason</b></div>
            <div class="col">{{$appointment->reason}}</div>
          </div>
  
               
            
         
        </div><!--End of column-->
      </div><!--End of column--> 
    </div><!--End of row-->
    
             
  </div><!--End of container-->
</div><!--End of Content-->

@endsection


