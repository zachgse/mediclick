@extends('layouts.app')


@section('content')

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
                <h5><b>Appointments</b></h5>
                <a href ="createApp"><b>Add Appointment</b></a>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date Scheduled</th>
                  <th>Date of Apppointment</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
                @foreach($patients as $patient)
                  <tr>

    
                    <td>{{$patient->lastName}}, {{$patient->firstName}}</td>
                    <td>{{$patient->email}}</td>
             
                    <td>
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="background-color:beige; color:black;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href ="/appointment-edit"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>
                      </div>

                  </tr>
       
                @endforeach
                    </td>
                  </tr>
                </tbody>
              </table>
    </div>
</div>

@endsection

