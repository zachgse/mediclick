@extends('layouts.app')

@section('content')


<div class="container-fluid" style="margin:auto; text-align:center;">
@if(session()->has('message'))
    <div class="alert alert-success">
          {{ session()->get('message') }}
    </div>
@endif
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
 <p style="font-size: 18px">Medical Clinics must subscribe in order to use the features of MediClick.</p>
 <div class="row" style="padding-left: 10%;">
   <div class="col-md-6">
     <div class="col-md-12" style="width:75%;">
           <div class="pricingTable">
             <div class="pricingTable-header">
               <h3 class="title">Basic</h3>
           </div>
           <div class="price-value">
             <span class="amount">₱7,000.00</span>
             <span class="duration">6 Months</span>
         </div>
         <a href="/pricing" aria-pressed="true">Learn More</a>  
       </div>
     </div>
   </div>
   <div class="col-md-6">
     <div class="col-md-12" style="width:75%;">
           <div class="pricingTable">
             <div class="pricingTable-header">
               <h3 class="title">Premium</h3>
           </div>
           <div class="price-value">
             <span class="amount">₱12,500.00</span>
             <span class="duration">Anually</span>
         </div>
         <a href="/pricing" aria-pressed="true">Learn More</a>  
       </div>
     </div>
   </div>
 </div>

 
 <img class="image" src="img/banner-2.png" alt="banner-1" width="100%" height="80%" margin="auto" >
 <br>
 <br>

 <h1><b>Features</b></h1>
 <br>
   <div class="row">
     <div class="col">
       <img class="image" src="img/medical-appointment.png" alt="appointment" width="150" height="150">
       <h4><b>Online Appointment Scheduling</b></h4>
     </div>
     <div class="col">
       <p>Patient scheduling may appear to be a simple procedure in and of itself, but it is critical to the delivery of treatment to your patients and your ability to keep wait times to a low so that patient satisfaction remains high and practice profitability remains steady.
         <br>
         You choose who sees your calendar and who can edit it, as well as finer parameters like how far in advance appointments may be canceled. You may arrange and change their own appointments, and the system will guarantee that paperwork are filled out correctly, saving you time.</p>
     </div>
   </div>
   <br>
   <div class="row">
     <div class="col">
       <p>Online records management, often known as record management system, is an integral aspect of an organization's document management rules. It assists organizations in managing records in a 
         methodical manner throughout their lifespan, from production to distribution to disposal.
         <br>
         Every firm, public or private, need a methodical approach to safeguarding its critical documents and information in the event of a tragedy or theft. The integrity and confidentiality of essential records are preserved and safeguarded using a record management system. Unauthorized users are unable to tamper with sensitive and vital documents as a result of this.</p>
       </div>
     <div class="col">
       <img class="image" src="img/medical-record.png" alt="record" width="150" height="150">
       <h4><b>Online Records Management</b></h4>
     </div>
   </div>
   <br>
   <div class="row">
     <div class="col">
       <img class="image" src="img/medical-appointment.png" alt="appointment" width="150" height="150">
       <h4><b>Dashboard</b></h4>
       <p><b>Generate Reports</b></p>
     </div>
     <div class="col">
       <p>Managing, creating and sharing reports, which can be a resource-intensive activity requiring a significant amount of upkeep and modification to meet differing – and sometimes competing – requirements
         Personalising content for each type of user, such as Physician view vs Nurse or Staff view.
     </p>
     </div>
   </div>
   <br>
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
@endsection


       
