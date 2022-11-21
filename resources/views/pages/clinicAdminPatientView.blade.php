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
      <form action ="/clinicAdmin-Patientsearch" method="get">
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
                <h5><b>Patients</b></h5>
                <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
            </div>
          </div> 
          <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </thead>
                <tbody>

                @foreach($patients as $patient)
                  <tr>
                    <td>{{$patient->userPatient->lastName}} {{$patient->userPatient->firstName}}</td>
                    <td>{{$patient->userPatient->email}}</td>
                    <td>
                      <a  href="/pages/{{$patient->id}}/clinicAdmin-viewPatientDetails">
                        <button type="submit" class="btn btn-warning">View</button>
                      </a>
                      
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

              {{ $patients->links()}}

              
    </div>
</div>
</main>



<aside class="container">
  <h3>List of Patients </h3>
  <table class="table">
      <tbody>
        @foreach($patients as $patient)
        <tr>
          <td><b>ID: {{$patient->userPatient->id}}</td>
          <td>Name: {{$patient->userPatient->lastName}} {{$patient->userPatient->firstName}}</td>
          <td>Email: {{$patient->userPatient->email}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>


@endsection


