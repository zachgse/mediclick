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
    <form action ="/staff-listOfPatientSearch" method="get">
        <div class="input-group">
            <input type="search" name ="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-warning">
                Search</a></div>
            </button>
          </div>
    </form>
          <br>
          <div class="row">
            <div class="col-8">
                <h5><b>Patient Records</b></h5>
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
                  <th>Attending Physician</th>
                  <th>Date Created</th>
                  <th>Weight</th>
                  <th>Height</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($patients as $patient)
                
                  <td>{{$patient->userPatient->lastName}}, {{$patient->userPatient->firstName}}</td>
                  <td>{{$patient->patientEmployee->userEmployee->firstName}} {{$patient->patientEmployee->userEmployee->lastName}}</td>
                  <td>{{$patient->created_at}}</td>
                    <td>{{$patient->weight}}</td>
                    <td>{{$patient->height}}</td>
                    <td>

                      
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="background-color:beige; color:black;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item"href ="/physician/{{$patient->id}}/patientRecords_staff"
                          >View </a>
                          <a class="dropdown-item"href ="/pages/{{$patient->id}}/staff-AddpatientRecords"
                            >Edit </a>
                         
                        </div>

                          
                      </td>
                  </tr>
             
                @endforeach
                   
                  </tr>
                </tbody>
              </table>
              {{ $patients->links()}}
    </div>
</div>
</main>




@endsection

