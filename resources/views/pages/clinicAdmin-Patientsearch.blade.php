@extends('layouts.app')


@section('content')

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
          @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
        <h5><b>Patients</b></h5>
          <table class="table table-bordered"></span>
            <thead class="table-light">
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </thead>
            <tbody>

            @foreach($patients as $patient)
              <tr>
              <td>{{$patient->lastName}} {{$patient->firstName}}</td>
                    <td>{{$patient->email}}</td>
                <td>
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="background-color:beige; color:black" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/pages/{{$patient->id}}/clinicAdmin-viewPatientDetails" style="color: black; text-decoration: none;" >View</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

          {{ $patients->links()}}

          
</div>
</div>

@endsection


