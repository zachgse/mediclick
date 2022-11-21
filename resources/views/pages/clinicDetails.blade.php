@extends('layouts.app')


@section('content')

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
          <h4>Clinic Details</h4>
          <hr>
  
      
          <div class="row">
            <div class="col"><b>Clinic Name</b></div>
            <div class="col">{{$user->name}} </div>
        </div>
          <div class="row">
            <div class="col"><b>Clinic Admin</b></div>
            <div class="col">{{$user->userAdmin->firstName}} {{$user->userAdmin->lastName}} </div>
          </div>
          <div class="row">
            <div class="col"><b>Clinic Admin Email</b></div>
            <div class="col">{{$user->userAdmin->email}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Address</b></div>
            <div class="col">{{$user->blockNo}} {{$user->city}} {{$user->barangay}}</div>
          </div>
        </div><!--End of column-->
      </div><!--End of column--> 
    </div><!--End of row-->
    
             
  </div><!--End of container-->
</div><!--End of Content-->

@endsection
