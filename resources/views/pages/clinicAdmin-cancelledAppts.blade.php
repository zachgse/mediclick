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
        
          <br>
          <div class="row">
            <div class="col-8">
                <h5><b>Cancelled Appointments</b></h5>
                <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
            </div>
          </div> 
          <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Date</th>
                  <th>Cancelled by</th>
                  <th>Reason</th>
             
                </thead>
                <tbody>
                  <tr>
                @foreach($appointments as $appointment)
                  <tr>

                    <td>{{$appointment->created_at}}</td>
                    <td>{{$appointment->userCancelledAppts->firstName}} {{$appointment->userCancelledAppts->lastName}}</td>
                    <td>{{$appointment->reason}}</td>
                   
                  </tr>
                @endforeach
          
                    </td>
                  </tr>
                </tbody>
              </table>

              {{ $appointments->links()}}
    </div>
</div>
</main>

<aside class="container">
  <h3>List of Cancelled Appointments </h3>
  <table class="table">
      <tbody>
        @foreach($appointments as $appointment)
          <tr>
            <td>Date Created: {{$appointment->created_at}}</td>
            <td>Name: {{$appointment->userCancelledAppts->firstName}} {{$appointment->userCancelledAppts->lastName}}</td>
          <td>Reason for Cancellation: {{$appointment->reason}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>


@endsection

