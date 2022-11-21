@extends('layouts.sysAd')


@section('content')
<div class="content">
  <div class="container"><!--Start of Container-->
    <div class="row" style="padding-top:2%;"><!--Start of Row-->
      <div class="col-sm-8"><!--Start-->
        <h4><b>Audit Tracking</b></h4>
        <table class="table table-bordered"></span>
          <thead class="table-light">
            <th>Datetime</th>
            <th>Name</th>
            <th>Description</th>
          </thead>
          <tbody>
            <tr>
              @foreach($logs as $log)
              <td>{{$log->created_at}}</td>
              <td>{{$log->logUser->firstName}} {{$log->logUser->lastName}}</td>
              <td>{{$log->description}}</td>

           
            </tr>
            @endforeach
         
          </tbody>
        </table>
      </div><!--End-->
      <div class="col-sm-4"><!--Start-->
        <div class="col-sm">
          <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:10%;">
          Clinics Registered
          <h6 style="float:right; border-radius: 23px; background-color:rgb(245, 245, 182) ;padding:2%;">{{ $clinicCount }}</h6>
          </div>
        </div>
        <br>
      </div><!--End-->
    </div><!--End of Row-->

    <div class="row"><!--Start of Row-->
      <div class="row">
        <div class="col">
          <h4><b>Clinics</b></h4>
        </div>
        <div class="col" style="text-align: right;">
          <a href ="sysAd-viewClinics">View Clinics</a>
        </div>
      </div>
      <table class="table table-bordered"></span>
        <thead class="table-light">
          <th>Clinic</th>
          <th>Subscription</th>
          <th>Subscription duration</th>
        <tbody>
          <tr>
            @foreach ($clinics as $clinic)
            <td>{{$clinic->name}}</td>
            <td>{{$clinic->clinicSub->name}}</td>
            <td>{{$clinic->subDuration}}</td>
          </tr>
          @endforeach
       
        </tbody>
      </table>
      
  </div><!--End-->
  

  </div><!--End of Container-->
</div><!--End of Content-->





@endsection

       
