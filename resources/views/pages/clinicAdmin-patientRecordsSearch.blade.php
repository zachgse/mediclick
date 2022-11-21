@extends('layouts.app')



@section('content')


<div class="content">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="container">
    <form action ="/clinicAdmin-patientRecordsSearch" method="get">
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
                  <th>Date Created</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
            
                  <tr>
  
                  @foreach ($patients as $patient)
                
                  <td>{{$patient->lastName}} {{$patient->firstName}}</td>
                  <td></td>
                  <td>{{$patient->created_at}}</td>
                    <td>

                    
                    <form action="/pages/{{$patient->id}}" method ="POST">
                              @csrf
                              @method('DELETE')
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this patient record?')">Delete</button>
                          </form>

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

