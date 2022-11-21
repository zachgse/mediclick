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
    <form action ="/clinicAdmin-search" method="get">
        <div class="input-group">
            <input type="search" name ="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-warning">
                Search</a></div>
            </button>
          </div>
    </form>
          <br>
              @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <br>
              <div class="row">
                <div class="col-8">
                    <h5><b>Physicians</b></h5>
                    <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
                </div>
              </div> 
              <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Name</th>
                  <th>Email</th>
                  <th>Specialization</th>
                  <th>Status</th>
                  <th>Verfication</th>
                  <th>Activation</th>
                  <th>Action</th>
                </thead>
                <tbody>
        
                @foreach($employees as $employee)
                  <tr>
                  <td>{{$employee->userEmployee->lastName}}, {{$employee->userEmployee->firstName}}</td>
                  <td>{{$employee->userEmployee->email}}</td>
                  <td>{{$employee->userEmployee->specialization}}</td>
                  <?php if($employee->status== '0') { ?>
                      <td>Not Active</td> 
                          <?php } else { ?>  
  
                            <td>Activated</td>
                          <?php } ?>
                 
                          <td><a href="{{asset('paymentProof/' . $employee->proof_image)}}" download>
                          <button type="submit" class="btn btn-warning"> Download</button>  
       
                    </a></td>
                    <td>
                      <form method="POST" action="/clinicAdminPhysicianView/{{ $employee-> id }}">
                          
                        @method('PUT')
                          @csrf

                        <?php if($employee->status== '0') { ?>
                         <button type="submit" class="btn btn-warning">Activate</button>  
                        <?php } else { ?>  

                        <button type="submit" class="btn btn-warning">Deactivate</button>  
                        <?php } ?>
                        </form>

                    </td>

                    <td>
                      <a href="/pages/{{$employee->id}}/clinicAdmin-viewPhysicianDetails">
                        <button type="submit" class="btn btn-warning">View</button>
                      </a>
                    </td>
                @endforeach
                
                  </tr>
              
                </tbody>
             
              </table>
              
              {{ $employees->links()}}
    </div>
    
</div>
</main>



<aside class="container">
  <h3>List of Physicians </h3>
  <table class="table">
      <tbody>
        @foreach($employees as $employee)
        <tr>
        <td>Name: {{$employee->userEmployee->lastName}}, {{$employee->userEmployee->firstName}}</td>
        <td>Email: {{$employee->userEmployee->email}}</td>
        <td>Specialization: {{$employee->userEmployee->specialization}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>

@endsection


