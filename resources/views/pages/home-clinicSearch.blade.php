@extends('layouts.app')


@section('content')
<div class="container-fluid" style="margin:auto;">
<form action ="/home-clinicSearch" method="get">
        <div class="input-group">
            <input type="search" name ="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-warning">
                Search</a></div>
            </button>
          </div>
    </form>
    <br>
    <h4><b>Clinics</b></h4>
    <p>Below is the list of all the clinics registered under MediClick.</p>
    <table class="table table-bordered"></span>
        <thead class="table-light">
          <th>Name</th>
          <th>Email</th>
          <th>Contact Number</th>
          <th>Action</th>
        </thead>
        <tbody>
          <tr>
            @foreach($clinics as $clinic)
            <td>{{$clinic->name}}  </td>
            <td>{{$clinic->city}} </td>
            <td>{{$clinic->contactNo}} </td>
            <td>
              <a class="btn btn-warning"href ="/pages/{{$clinic->id}}/clinicDetails">View</a>
            </td>
          </tr>
          @endforeach
     

        </tbody>
      </table>            
</div><!--End of Content-->


</div><!--End of Container-->

@endsection










       