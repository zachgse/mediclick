@extends('layouts.sysAd')
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
    <div class="input-group">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <a class="btn btn-outline-warning" href="/" role="button"style="color: black;">
            <i class="fa fa-search" aria-hidden="true" style="color: black"></i> Search</a>
        </div>
        <br>
      @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
      <div class="row">
        <div class="col-8">
            <h5><b>Feedbacks</b></h5>
            <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
        </div>
      </div> 
      <br>
          <table class="table table-bordered"></span>
            <thead class="table-light">
              <th>#</th>
              <th>Date Submitted</th>
              <th>Name</th>
              <th>Message</th>
            </thead>
            <tbody>
              <tr>
            @foreach ($feedbacks as $feedback)
              <td>{{$feedback->id}}</td>      
              <td>{{$feedback->created_at}}</td>
              <td>{{$feedback->name}}</td>
              <td>{{$feedback->message}}</td>
            
              </tr>
              @endforeach
            </tbody>
          </table>

          {{ $feedbacks->links()}}
</main>
</div>

<aside class="container">
  <h3>Feedbacks Report</h3>
  <table class="table">
      <tbody>
          @foreach($feedbacks as $feedback)
              <tr>
                  <td><b>Name: {{$feedback->name}}</td>
                  <td>Date sent: {{$feedback->created_at}}</td>
                  <td>Message: {{$feedback->message}}</td>
                  <td></td>
              </tr>
          @endforeach
          </tbody>
     </table>
</aside>

@endsection


