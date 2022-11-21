@extends('layouts.app')

<style>
  aside * {
      display: none;
  }
  @media print{
      body *{
          visibility: hidden;
      }
      main *{
          display: none;
      }
      aside, aside * {
          visibility: visible;
          display: block;
      }
  }
</style>

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

<main class="position relative">
  <div class="content">
    <div class="container">
    <form action ="/physician-walkinAppointmentSearch" method="get">
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
                <a href = "createAppWalk-In">Add Walk-In Appointment </a>
            </div>
            <!---
            <div class="col-4" style="padding-left:15%;">
                <a class="btn btn-warning" href="/" role="button"style="color: black;">
                    <i class="fa fa-calendar-plus-o" aria-hidden="true" style="color: black"></i>
                         Add Appointment</a>
            </div>-->
          </div> 
          <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
          <br>
          <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Patient</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>Date of Apppointment</th>
                  <th>Type</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($appointments as $appointment)
                
                  <td>{{$appointment->lastName}}, {{$appointment->firstName}}</td>
                  <td>{{$appointment->email}}</td>
                  <td>{{$appointment->contactNo}}</td>
                  <td>{{$appointment->datetime}}</td>
                  <td>{{$appointment->meeting}}</td>
              
                    
                  </form>

                    <td>
                      <a class="btn btn-warning"href ="/pages/{{$appointment->id}}/appointmentDetails">View</a>
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

<aside class="container">
  <h3>List of Walk-In Appointments </h3>
  <table class="table">
      <tbody>
        @foreach ($appointments as $appointment)       
        <td>Name: {{$appointment->lastName}}, {{$appointment->firstName}}</td>
        <td>Email: {{$appointment->email}}</td>
        <td>Contact No: {{$appointment->contactNo}}</td>
        <td>Appointment Date: {{$appointment->datetime}}</td>
        <td>Appointment Type:{{$appointment->meeting}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>

@endsection

