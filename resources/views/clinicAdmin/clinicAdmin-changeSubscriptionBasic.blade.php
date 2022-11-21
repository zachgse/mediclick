@extends('layouts.clinicadmin')
@section('content')
      <h4>Change Subscription</h4>
        <div class="row">
            <div class="col-md-6">
                <!--Account Information-->
                <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
                    <h5>Account Information</h5>
                    <hr>
                    <div class="row">
                        <div class="col"><b>Clinic Name</b></div>
                        <div class="col"><input type="text" class="form-control" id="inputZip"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col"><b>Clinic Address</b></div>
                        <div class="col"><input type="text" class="form-control" id="inputZip"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col"><b>Clinic Email</b></div>
                        <div class="col"><input type="text" class="form-control" id="inputZip"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col"><b>Contact Number</b></div>
                        <div class="col"><input type="text" class="form-control" id="inputZip"></div>
                    </div>
                  </div>
                    <br>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">                    
                            <a class="btn btn-outline-warning" href="/" role="button"style="color: black;">
                            Submit</a></div>
                    </div>
                </div>
    </div><!--End of row-->





@endsection
