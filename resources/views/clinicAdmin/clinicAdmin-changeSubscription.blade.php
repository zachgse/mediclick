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
                        <div class="col">[Clinic Name]</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Clinic Address</b></div>
                        <div class="col">[Clinic Address]</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Clinic Email</b></div>
                        <div class="col">[Clinic Email]</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Contact Number</b></div>
                        <div class="col">[Contact Number]</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Current Subscription Package</b></div>
                        <div class="col">[Package Name]</div>
                    </div>
                    <div class="row">
                      <div class="col"><b>Upgrade to</b></div>
                      <div class="col">
                        <select class="form-select" aria-label="Default select example" aria-placeholder="Select">
                          <option value="0"></option>
                          <option value="1">Basic</option><!--NOTE: if Basic redirect to Basic Subscription Form-->
                          <option value="2">Premium</option><!--NOTE: if Premium redirect to Premium Subscription Form-->
                        </select>
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
