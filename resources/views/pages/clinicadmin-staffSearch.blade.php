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
    <form action ="/clinicAdmin-staffSearch" method="get">
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
          <h5><b>Staff</b></h5>
          <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
      </div>
    </div> 
    <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>ID</th>
                  <th>Access</th>
                  <th>Action</th>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                  <tr>
                  <td>{{$employee->lastName}}, {{$employee->firstName}}</td>
                    <td>{{$employee->email}}</td>

                    
                    
                    <?php if($employee->status== '0') { ?>
                      <td>Not Active</td> 
                          <?php } else { ?>  
  
                            <td>Activated</td>
                          <?php } ?>

                    <td><a href="{{asset('paymentProof/' . $employee->proof_image)}}" download>
                    <button type="submit" class="btn btn-warning">       Download</button>  
             
                    </a></td>
                    <td>
                      <form method="POST" action="/clinicAdminStaffView/{{ $employee-> id }}">
                          
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
                        <a href="/pages/{{$employee->id}}/clinicAdmin-viewStaffDetails">
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
  <h3>List of Staff </h3>
  <table class="table">
      <tbody>
        @foreach($employees as $employee)
        <tr>
        <td>{{$employee->lastName}}, {{$employee->firstName}}</td>
          <td>{{$employee->email}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>
@endsection


