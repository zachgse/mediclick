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

<main class="position relative">
<div class="content">
  
<div class="container">
    <form action ="/clinicAdmin-appointmentSearch" method="get">
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
                <h5><b>Appointments</b></h5>
                <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
            </div>
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
                @foreach($appointments as $appointment)
                  <tr>
                    <td>{{$appointment->lastName}}, {{$appointment->firstName}}</td>
                    <td>{{$appointment->email}}</td>
                    <td>{{$appointment->created_at}}</td>
                    <td>{{$appointment->datetime}}</td>
                    <td>
                      <a  href="/pages/{{$appointment->id}}/clinicAdmin-viewAppointmentDetails">
                        <button type="submit" class="btn btn-warning">View</button>
                      </a>
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

<aside class="container">
  <h3>List of Appointments </h3>
  <table class="table">
      <tbody>
        @foreach($appointments as $appointment)
          <tr>
            <td>Name: {{$appointment->lastName}}, {{$appointment->firstName}}</td>
            <td>Email: {{$appointment->email}}</td>
            <td>Date Created: {{$appointment->created_at}}</td>
            <td>Appointment Date and Time{{$appointment->datetime}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>
@endsection

