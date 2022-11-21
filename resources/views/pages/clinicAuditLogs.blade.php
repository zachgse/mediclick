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
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <a class="btn btn-outline-warning" href="/" role="button"style="color: black;">
                <i class="fa fa-search" aria-hidden="true" style="color: black"></i>
                Search</a></div>
          </div>
          <br>
          <div class="row">
            <div class="col-8">
                <h5><b>Audit Logs</b></h5>
                <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
            </div>
          </div> 
          <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                <th>Datetime</th>
                <th>Name</th>
                <th>Description</th>
                
                </thead>
                <tbody>

                @foreach($logs as $log)
                  <tr>
                  <td>{{$log->created_at}}</td>
                    <td>{{$log->logUser->firstName}} {{$log->logUser->lastName}} </td>
                    <td>{{$log->description}}</td>
                
                  </tr>
                @endforeach
                </tbody>
              </table>

              
    </div>
</div>
</main>


<aside class="container">
  <h3>Audit Logs </h3>
  <table class="table">
      <tbody>
        @foreach($logs as $log)
        <tr>
        <td>{{$log->created_at}}</td>
          <td><b>Name: {{$log->logUser->firstName}} {{$log->logUser->lastName}} </td>
          <td>Log: {{$log->description}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>
@endsection


