@extends('layouts.app')


@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

<div class="content">
    <div class="container">
    <form action ="/patient-appoinntmentSearch" method="get">
        <div class="input-group">
            <input type="search" name ="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-warning">
                Search</a></div>
            </button>
          </div>
          <br>
          <div class="row">
            <div class="col-8">
                <h5><b>Appointments</b></h5>
                <a href = "/createApp">Add Appointment </a>
            </div>
          </div> 
          <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Patient</th>
                  <th>Email</th>
                  <th>Date Scheduled</th>
                  <th>Date of Apppointment</th>
                  <th>Type</th>
                  <th>Physician</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($appointments as $appointment)
                
                  <td>{{$appointment->userAppointment->lastName}}, {{$appointment->userAppointment->firstName}}</td>
                  <td>{{$appointment->userAppointment->email}}</td>
                  <td>{{$appointment->created_at}}</td>
                    <td>{{$appointment->datetime}}</td>
                    <td>{{$appointment->meeting}}</td>
                    <td>{{$appointment->employeeAppointment->userEmployee->firstName}} {{$appointment->employeeAppointment->userEmployee->lastName}}</td>
                    <?php if($appointment->status== '0') { ?>
                           <td>Pending</td>  
                          <?php } 
                          
                          else if($appointment->status== '3') { ?>
                            <td>Requests to Cancel</td>  
                           <?php } 

                            else if($appointment->status== '4') { ?>
                                <td>Cancelled</td>  
                            <?php } 
                          else { ?>  
  
                            <td>Approved</td>  
                          <?php } ?>
                          </form>

                    <td>
                      
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="background-color:beige; color:black;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </a>
                      <?php if($appointment->status== '0') { ?>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href ="/pages/{{$appointment->id}}/appointmentDetails_patient"
                          >View </a>
                        
                          <a class="dropdown-item" href ="/appointment/{{$appointment->id}}/appointment-editPatient">Edit</a>

                          <a class="dropdown-item" href ="/appointment/{{$appointment->id}}"
                            >Cancel</a>

                        </div>
                          <?php } 

                            else { ?>  
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href ="/pages/{{$appointment->id}}/appointmentDetails_patient"
                            >View </a>
    
                            <a class="dropdown-item" href ="/appointment/{{$appointment->id}}"
                              >Cancel</a>

                        </div>
                           
                            <?php } ?>

                    
                  </form>
                          
                       

                
                      </td>
                  </tr>
             
                @endforeach
                   
                  </tr>
                </tbody>
              </table>

              {{ $appointments->links()}}
    </div>
</div>

@endsection

