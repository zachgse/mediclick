@extends('layouts.sysAd')

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
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <a class="btn btn-outline-warning" href="/" role="button"style="color: black;">
                <i class="fa fa-search" aria-hidden="true" style="color: black"></i> Search</a>
          </div>
          <br>

          @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
          <div class="row">
            <div class="col-8">
                <h5><b>Clinics</b></h5>
            </div>
          </div> 
          <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
          <br>
          <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>ID</th>
                  <th>Clinic Name</th>
                  <th>Clinic Admin</th>
                  <th>Clinic Admin Email</th>
                  <th>Subscription</th>
                  <th>Subscription duration</th>
                  <th>Subscription Status</th>
                  <th>Requests</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
                @foreach ($users as $user)
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->userAdmin->firstName}} {{$user->userAdmin->lastName}}</td>
                    <td>{{$user->userAdmin->email}}</td>
                    <td>{{$user->clinicSub->name}}</td>
                    <td>{{$user->subDuration}}</td>
                    <td>
                      <form method="POST" action="/sysAd-viewClinics/{{ $user-> id }}">
                          
                        @method('PUT')
                          @csrf

                        <?php if($user->status== '0') { ?>
                        <button type="submit" class="btn btn-warning">Activate</button>  
                        <?php } else { ?>  

                        <button type="submit" class="btn btn-warning">Deactivate</button>  
                        <?php } ?>
                    </form>
                    </td>
                    <td>
                      <form method="POST" action="/system-admin/{{ $user->id }}">
                          
                        @method('PUT')
                          @csrf
                          <?php if($user->editStatus== '0') { ?>
                         <button type="submit" class="btn btn-warning">Allow edit</button>  
                        <?php } else { ?>  

                        <button type="submit" class="btn btn-warning">Disable edit</button>  
                        <?php } ?>
                        </form>
                    </td>
                    <td>
                      <a class="btn btn-warning"href ="/system-admin/{{$user->id}}/sysAd-clinicDetails">View</a>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              
              {{ $users->links()}}
              
    </div>
</div>
</main>

<aside class="container">
  <h3>List of Clinics </h3>
  <table class="table">
      <tbody>
        @foreach ($users as $user)
        <td>ID: {{$user->id}}</td>
        <td>Clinic Name: {{$user->name}}</td>
        <td>Clinic Administrator: {{$user->userAdmin->firstName}} {{$user->userAdmin->lastName}}</td>
        <td>Email: {{$user->userAdmin->email}}</td>
        <td>Subscription: {{$user->clinicSub->name}}</td>
        <td>Subscription Duration: {{$user->subDuration}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>


@endsection


