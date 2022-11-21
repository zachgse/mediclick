@extends('layouts.app')

@section('content')


<div class="content">
    <div class="container" style="padding-top: 2%; font-size: 16px;">
      <div class="row"><!--Start of Row-->
        <div class="col-sm"><!--Start-->
            <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:6%; font-size: 18px;">
              <i class="fa fa-user-o" aria-hidden="true"></i> Patient
              <h6 style="float:right; border-radius: 23px; background-color:rgb(245, 245, 182) ;padding:2%;">{{ $patientCount }}</h6>
            </div>
        </div><!--End-->

        <div class="col-sm"><!--Start-->
          <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:6%;font-size: 18px;">
            <i class="fa fa-user-md" aria-hidden="true"></i> Physician
            <h6 style="float:right; border-radius: 23px; background-color:rgb(245, 245, 182) ;padding:2%;">{{ $physicianCount }}</h6>
          </div>
        </div><!--End-->
    
        <div class="col-sm"><!--Start-->
          <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:6%;">
            <i class="fa fa-user-o" aria-hidden="true"></i> Nurse/Staff
        <h6 style="float:right; border-radius: 23px; background-color:rgb(245, 245, 182) ;padding:2%;">{{ $staffCount }}</h6>
          </div>
       </div><!--End-->
    </div><!--End of Row-->
    <br>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="container">
          <h6>Appointments- <a href="viewAppointments">View all Appointments </a></h6>
          <table class="table table-bordered"></span>
            <thead class="table-light">
              <th>Date</th>
              <th>Type</th>
              <th>Name</th>
              <th>Action</th>
            </thead>
            <tbody>
        
            @foreach($appointments as $appointment)
              <tr>
                <td>{{$appointment->datetime}}</td>
                <td>{{$appointment->meeting}}</td>
                <td>{{$appointment->userAppointment->lastName}}, {{$appointment->userAppointment->firstName}}</td>
                <td>
                  <a  href="/pages/{{$appointment->id}}/clinicAdmin-viewAppointmentDetails">
                    <button type="submit" class="btn btn-warning">View</button>
                  </a>
                </td>

              @endforeach
            </tbody>
          </table>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <h6>Staff- <a href="clinicAdminStaffView">View all Staff </a></h6>
            <table class="table table-bordered"></span>
              <thead class="table-light">
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
              </thead>
              <tbody>
              @foreach($staffList as $employee)
                    <tr>
                    <td>{{$employee->userEmployee->lastName}}, {{$employee->userEmployee->firstName}}</td>
                    <td>{{$employee->userEmployee->email}}</td>
                    <?php if($employee->status== '0') { ?>
                        <td>Not Active</td> 
                            <?php } else { ?>  
    
                              <td>Activated</td>
                            <?php } ?>
                 
                  @endforeach
                    </tr>
              </tbody>
            </table>
      </div>
      <div class="col">
        <h6>Physician- <a href="clinicAdminPhysicianView">View all Physician </a></h6>
  
                  
        <table class="table table-bordered"></span>
          <thead class="table-light">
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
          </thead>
          <tbody>
          @foreach($physicianList as $employee)
                <tr>
                <td>{{$employee->userEmployee->lastName}}, {{$employee->userEmployee->firstName}}</td>
                <td>{{$employee->userEmployee->email}}</td>
                <?php if($employee->status== '0') { ?>
                    <td>Not Active</td> 
                        <?php } else { ?>  

                          <td>Activated</td>
                        <?php } ?>
            
              @endforeach
            
                </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>






@endsection

       
