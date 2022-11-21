@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!--Account Information-->

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">

                
                    <h5>Account Information</h5>
                    <hr>
                   

                    <div class="row">
                        <div class="col"><b>Name</b></div>
                        <div class="col">{{$user->lastName}}</div>
                    </div>
                
                    <div class="row">
                        <div class="col"><b>Address</b></div>
                        <div class="col"> {{$user->city}} {{$user->barangay}}</div>
                    </div>
                    <div class="row">
                        <div class="col"><b> Email</b></div>
                        <div class="col">{{$user->email}}</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Contact Number</b></div>
                        <div class="col">{{$user->contactNo}}</div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">  @if (Route::has('password.request'))
                                <a class="btn btn-warning" href="{{ route('password.request') }}">
                                    {{ __('Change Password') }}
                                </a>
                            @endif
                        </div>
                        </div>
                        <div class="col">                    
                            <a class="btn btn-outline-warning" href="/auth/{{$user->id}}/edit" role="button"style="color: black;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="color: black"></i>
                            Edit</a></div>
                    </div>


                </div>
                <br>
              
                
      
            
        </div>
    </div><!--End of row-->
    </div><!--End of contatiner-->
</div>





@endsection
