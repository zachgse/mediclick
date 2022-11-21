@extends('layouts.app')


@section('content')



@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

<main class="position relative">
<div class="content">
    <div class="container">
    <form action ="/staff-appointmentSearch" method="get">
        <div class="input-group">
            <input type="search" name ="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-warning">
                Search</a></div>
            </button>
          </div>
          <br>
          <br>
          <div class="row">
            <div class="col-8">
                <h5><b>Appointments</b></h5>
               
            </div>
          </div> 
          <br>
            <!---
            <div class="col-4" style="padding-left:15%;">
                <a class="btn btn-warning" href="/" role="button"style="color: black;">
                    <i class="fa fa-calendar-plus-o" aria-hidden="true" style="color: black"></i>
                         Add Appointment</a>
            </div>-->

              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Patient</th>
                  <th>Date Scheduled</th>
                  <th>Date of Apppointment</th>
                  <th>Type</th>
                  <th>Status</th>
            
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($appointments as $appointment)
                
                  <td>{{$appointment->lastName}}, {{$appointment->firstName}}</td>
                  <td>{{$appointment->created_at}}</td>
                    <td>{{$appointment->datetime}}</td>
                    <td>{{$appointment->meeting}}</td>
                    
                    <?php if($appointment->status== '0') { ?>
                           <td>Pending</td>  
                          <?php }
                          
                          else if($appointment->status== '3') { ?>
                            <td>Requested to Cancel</td>  
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
                          <a class="dropdown-item" href ="/pages/{{$appointment->id}}/appointmentDetails_staff"
                          >View </a>
                          <a class="dropdown-item" href ="/appointment/{{$appointment->id}}/appointment-edit"
                         >Edit</a>
                          <a class="dropdown-item" href ="/appointment/{{$appointment->id}}"
                          >Cancel</a>
                        </div>
                        <?php }  { ?>  
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href ="/pages/{{$appointment->id}}/appointmentDetails_staff"
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
</main>



@endsection

