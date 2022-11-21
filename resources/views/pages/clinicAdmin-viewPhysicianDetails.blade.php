@extends('layouts.app')



@section('content')

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
          <h4>Physician Details</h4>
          <hr>
         
          <div class="row">
            <div class="col"><b>Name</b></div>
            <div class="col">{{$employee->userEmployee->lastName}}, {{$employee->userEmployee->firstName}}</div>
        </div>
          <div class="row">
            <div class="col"><b>Email</b></div>
            <div class="col">{{$employee->userEmployee->email}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Contact Number</b></div>
            <div class="col">{{$employee->userEmployee->contactNo}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Gender</b></div>
            <div class="col">{{$employee->userEmployee->gender}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Address</b></div>
            <div class="col">{{$employee->userEmployee->branchAdd}} {{$employee->userEmployee->city}} {{$employee->userEmployee->barangay}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Specialization</b></div>
            <div class="col">{{$employee->userEmployee->specialization}}</div>
          </div>


        </div><!--End of column-->
      </div><!--End of column--> 
    </div><!--End of row-->
    
    <br>
    <div class="row">
       <!---Emergency Contact-->
       <div class="col-md-6">
        <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
          <h4>Emergency Contact Details</h4>
          <hr>
          <div class="row">
            <div class="col"><b>Name</b></div>
            <div class="col">{{$employee->userEmployee->conlastName}}, {{$employee->userEmployee->confirstName}}</div>
        </div>
          <div class="row">
            <div class="col"><b>Contact Number</b></div>
            <div class="col">{{$employee->userEmployee->conConNo}}</div>
          </div>
          <div class="row">
            <div class="col"><b>Reationship to Patient</b></div>
            <div class="col">{{$employee->userEmployee->relationship}}</div>
          </div>
    </div>
             
  </div><!--End of container-->
</div><!--End of Content-->
  </div>
</div>
</div>

@endsection


