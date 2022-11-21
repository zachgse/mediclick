@extends('layouts.app')


@section('content')

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
        <h5><b>Physician</b></h5>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>Name</th>
                  <th>Email</th>
                  <th>Specialization</th>
                  <th>Status</th>
                  <th>Verification</th>
                  <th>Activation</th>
                  <th>Action</th>
                </thead>
                <tbody>
        
                @foreach($employees as $employee)
                  <tr>
                  <td>{{$employee->lastName}}, {{$employee->firstName}} </td>
                  <td>{{$employee->email}} </td>
                  <td>{{$employee->specialization}} </td>
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

                    <td>     <a href="/pages/{{$employee->id}}/clinicAdmin-viewPhysicianDetails" style="color: black; text-decoration: none;">
                        <i class="fa fa-eye" aria-hidden="true" style="color: black"></i> View</a>   

                          </td>
                @endforeach
                
                  </tr>
              
                </tbody>
             
              </table>
              
              {{ $employees->links()}}
    </div>
    
</div>

@endsection


