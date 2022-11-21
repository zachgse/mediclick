
@extends('layouts.app')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="container-fluid" style="margin:auto; text-align:center">

<!--Physician User-->
    @if(Auth::user()->role== 'Physician')
    <!-- Banner 1 -->
 <img class="image" src="img/banner-1.png" alt="banner-1" width="100%" height="90%" margin="auto" style="padding-top:3%;">
 <br>
 <br>

 <h1><b>What is MediClick?</b></h1>
 <p style="font-size: 18px">MediClick aims to provide users the ability to manage their 
   health records and appointment schedules, securely and efficiently. <br>Specificially it aims to: </p>
 <div class="row">
   <div class="col">
     <img class="image" src="img/calendar.png" alt="appointment" width="150" height="150">
     <br>Reduce waiting time and appointment cancellations</div>
   <div class="col">
     <img class="image" src="img/folder.png" alt="appointment" width="150" height="150">
     <br>Reduce time spent by clinic employees in performing administrative tasks </div>
   <div class="col">
     <img class="image" src="img/operating-system.png" alt="appointment" width="150" height="150">
     <br>Provide better health management system </div>
   <div class="col">
     <img class="image" src="img/medical-record (1).png" alt="appointment" width="150" height="150">
     <br>Easier access to patient health records </div>
 </div>
 <br>
 <br>

 <!--Physician User-->
 @elseif(Auth::user()->role== 'Staff')
 <!-- Banner 1 -->
<img class="image" src="img/banner-1.png" alt="banner-1" width="100%" height="90%" margin="auto" style="padding-top:3%;">
<br>
<br>

<h1><b>What is MediClick?</b></h1>
<p style="font-size: 18px">MediClick aims to provide users the ability to manage their 
health records and appointment schedules, securely and efficiently. <br>Specificially it aims to: </p>
<div class="row">
<div class="col">
  <img class="image" src="img/calendar.png" alt="appointment" width="150" height="150">
  <br>Reduce waiting time and appointment cancellations</div>
<div class="col">
  <img class="image" src="img/folder.png" alt="appointment" width="150" height="150">
  <br>Reduce time spent by clinic employees in performing administrative tasks </div>
<div class="col">
  <img class="image" src="img/operating-system.png" alt="appointment" width="150" height="150">
  <br>Provide better health management system </div>
<div class="col">
  <img class="image" src="img/medical-record (1).png" alt="appointment" width="150" height="150">
  <br>Easier access to patient health records </div>
</div>
<br>
<br>

<!--Clinic Admin User-->
    @elseif(Auth::user()->role== 'Clinic Admin')
    <h2>Welcome to MediClick</h2>
    <hr>

    <h4><b>What is MediClick?</b></h4>
    <p style="font-size: 18px">MediClick aims to provide users the ability to manage their 
      health records and appointment schedules, securely and efficiently. <br>Specificially it aims to: </p>
    <div class="row">
      <div class="col">
        <img class="image" src="img/calendar.png" alt="appointment" width="150" height="150">
        <br>Reduce waiting time and appointment cancellations</div>
      <div class="col">
        <img class="image" src="img/folder.png" alt="appointment" width="150" height="150">
        <br>Reduce time spent by clinic employees in performing administrative tasks </div>
      <div class="col">
        <img class="image" src="img/operating-system.png" alt="appointment" width="150" height="150">
        <br>Provide better health management system </div>
      <div class="col">
        <img class="image" src="img/medical-record (1).png" alt="appointment" width="150" height="150">
        <br>Easier access to patient health records </div>
    </div>
    <br>
    <br>
    <hr>
    <h4><b>How to use MediClick?</b></h4>
    <p>1. Users may only fully access the system once CLINIC REGISTRATION. <br>
      You may register a clinic <a href="/create"> here.</a><br><br>
      2. After setting up your account, you must pay the subscription fee.<br>
      You may view our subscription packages <a href="/pricing"> here.</a><br>
      </p>
      <hr>
      <h4><b>User Roles</b></h4>
      <p>There are four type of users namely, Clinic Administrator, Physician, Patient, and Nurse/Staff. Each
        user has different roles and user access levels. Users can create and manage their accounts. 
      </p>
      <div class="row">
        <div class="col">
          <img class="image" src="img/patient.png" alt="appointment" width="150" height="150">
          <p style="font-size: 18px">Patients</p>
          Patients have access to view the information of a physician, view and add 
          an appointment as well as update and cancel an appointment, and view their health records. 
          Patients can also update their account. </div>
        <div class="col">
          <img class="image" src="img/blogger.png" alt="appointment" width="150" height="150">
          <p style="font-size: 18px">Clinic Administrator</p>
          The Clinic Administrator can view all the users registered under their clinic. </div>
        <div class="col">
          <img class="image" src="img/doctor.png" alt="appointment" width="150" height="150">
          <p style="font-size: 18px">Physicians</p>
          Physicians can view, update, and remove their information such as their scheduled 
          appointments and specialization. Physicians can also view, create, and update all 
          the medical information of a patient. They can also add, update, and cancel an appointment.</div>
          <div class="col">
            <img class="image" src="img/nurse.png" alt="appointment" width="150" height="150">
            <p style="font-size: 18px">Employees</p>
            Clinic employees, specifically front-desk staff and nurses, can view, create, 
            and update the health record of a patient, particularly the vital signs and visual acuity.
            They can also add, update, and cancel an appointment.</div>
      </div>
   </div>
    
      

<!--Patient User-->
    @elseif(Auth::user()->role== 'Patient')
    <h2>Welcome to MediClick</h2>
    <hr>

    <h4><b>What is MediClick?</b></h4>
    <p style="font-size: 18px">MediClick aims to provide users the ability to manage their 
      health records and appointment schedules, securely and efficiently. <br>Specificially it aims to: </p>
    <div class="row">
      <div class="col">
        <img class="image" src="img/calendar.png" alt="appointment" width="150" height="150">
        <br>Reduce waiting time and appointment cancellations</div>
      <div class="col">
        <img class="image" src="img/folder.png" alt="appointment" width="150" height="150">
        <br>Reduce time spent by clinic employees in performing administrative tasks </div>
      <div class="col">
        <img class="image" src="img/operating-system.png" alt="appointment" width="150" height="150">
        <br>Provide better health management system </div>
      <div class="col">
        <img class="image" src="img/medical-record (1).png" alt="appointment" width="150" height="150">
        <br>Easier access to patient health records </div>
    </div>



     <h3 style="text-align: center;padding-top: 5%;"><b>Visit a Clinic</b></h3>
     <div class="row" style="padding-top: 1%;">
         <table class="table table-bordered"></span>
             <thead class="table-light">
               <th>Clinic</th>
               <th>Address</th>
               <th>Contact Number</th>
   
             </thead>
             <tbody>
               <tr>
               @foreach($clinics as $clinic)
                 <td>{{$clinic->name}}</td>
                 <td>{{$clinic->city}} {{$clinic->barangay}}</td>
           
                 <th>{{$clinic->contactNo}}</th>
               </tr>
               @endforeach
             </tbody>
           </table>   
     </div><!--End of Row-->
     <br>
     <div class="col-12" style="text-align:center" >
         <a class="btn btn-outline-warning" href="/viewAllClinics" role="button"style="color: black;">
             View More Clinics</a>
     </div>

    <!--Patient User-->
    @elseif(Auth::user()->role== 'System Admin')
    <div class="container" style="text-align: left;"><!--Start of Container-->
      <img class="image" src="img/banner-1.png" alt="banner-1" width="100%" height="90%" margin="auto" style="padding-top:3%;">
      <br>
      <br>
          <div class="row">
            <div class="col">
              <h4><b>Clinics</b></h4>
            </div>
            <div class="col">
              <a href = "/sysAd-viewClinics" style="float: right">View ALL Clinics </a>
            </div>
          </div>
          <table class="table table-bordered"></span>
            <thead class="table-light">
              <th>Clinic</th>
              <th>Subscription</th>
              <th>Subscription duration</th>
            <tbody>
              <tr>
                @foreach ($clinics as $clinic)
                <td>{{$clinic->name}}</td>
                <td>{{$clinic->clinicSub->name}}</td>
                <td>{{$clinic->subDuration}}</td>
              </tr>
              @endforeach
           
            </tbody>
          </table>


  
    
     
        
    </div><!--End-->
    
  
    </div><!--End of Container-->

    @endif




  
    <br>
   
   
    



</div><!--End of Container-->

  
</body>
</html>

</div>
@endsection


       
