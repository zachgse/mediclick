@extends('layouts.app')


@section('content')
        @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
<div class="content">
    <div class="container">
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <a class="btn btn-outline-warning" href="/" role="button"style="color: black;">
                <i class="fa fa-search" aria-hidden="true" style="color: black"></i> Search</a>
          </div>
          <br>
          <div class="row">
            <div class="col-8">
                <h5><b>Patient Records Requests </b></h5>
                <p>Click <i>Allow other clinics to view my records </i>to allow other physicians to view your records. </p>
           
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
                  <th>Clinic</th>
                  <th>Physician</th>
                  <th>Description</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($requests as $request)
                
                  <td>{{$request->requestClinic->name}}</td>
                  <td>{{$request->requestEmployee->userEmployee->firstName}}</td>
                  <td>{{$request->description}}</td>
  
                    <td>
                    <form method="POST" action="/patientRequest/{{ $request-> id }}">
                          
                          @method('PUT')
                            @csrf
  
                        
                           <button type="submit" class="btn btn-warning">Allow other clinics to view my records</button>  
                        
                          </form>
                    </td>

      
            
                  </tr>
             
                @endforeach
                   
                  </tr>
                </tbody>
              </table>
    </div>
</div>

@endsection

