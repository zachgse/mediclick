@extends('layouts.app')


@section('content')
        @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
<div class="content">
    <div class="container">
    <form action ="/physician-listOfPatientSearch" method="get">
        <div class="input-group">
            <input type="search" name ="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-warning">
                Search</a></div>
            </button>
          </div>
          <br>
          <div class="row">
            <div class="col-8">
                <h5><b>Patients</b></h5>
           
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
                  <th>Request for Access Action</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($patients as $patient)
                
                  <td>{{$patient->lastName}}, {{$patient->firstName}}</td>
                  <td>{{$patient->firstName}} {{$patient->lastName}}</td>
                  <td>{{$patient->name}}</td>

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
                        <form method="POST" action="/physician/{{$patient->id}}/physician-listPatients">
                      
                      @method('PUT')
                        @csrf   
                       <button type="submit" class="btn btn-warning">Request Access</button>  
                      </form>    
                       </form>

                    </td>

                    <td>
                      <a href ="/physician/{{$patient->id}}/patientRecordsDetailed">
                        <button type="submit" class="btn btn-warning">View</button>
                        </a>

                    </td>
                  </tr>
             
                @endforeach
                   
                  </tr>
                </tbody>
              </table>
              {{ $patients->links()}}
    </div>
</div>

@endsection

