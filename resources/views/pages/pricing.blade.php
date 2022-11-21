@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


@section('content')
<div class="container-fluid" style="margin:auto; text-align:center;">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-4">
        <div class="pricingTable">
                        <div class="pricingTable-header">
                            <h3 class="title">Basic</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">₱7,000.00</span>
                        </div>
                        <ul class="pricing-content">
                            <li><i class="fa fa-envelope"></i>6 Months Subscription Validity</li>
                            <li><i class="fa fa-hdd"></i> Appointment Scheduling</li>
                            <li><i class="fa fa-hdd"></i>Storing of Medical Records</li>
                            <li class="disable"><i class="fa fa-cog"></i> Maintenance</li>
                        </ul>
                        <div class="pricingTable-signup">
                            <a href="/create">Subscribe</a>
                        </div>
                    </div>
        </div>
        <div class="col-4">
        <div class="pricingTable purple">
                        <div class="pricingTable-header">
                            <h3 class="title">Premium</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">₱12,500.00</span>
                        </div>
                        <ul class="pricing-content">
                            <li><i class="fa fa-envelope"></i> 1 Year Subscription Validity</li>
                            <li><i class="fa fa-hdd"></i> Appointment Scheduling</li>
                            <li><i class="fa fa-hdd"></i>Storing of Medical Records</li>
                            <li class="disable"><i class="fa fa-cog"></i> Maintenance</li>
                        </ul>
                        <div class="pricingTable-signup">
                        <a href="/create">Subscribe</a>
                        </div>
                    </div>
                </div>
        </div>
      </div>
    </div>
</div>
@endsection