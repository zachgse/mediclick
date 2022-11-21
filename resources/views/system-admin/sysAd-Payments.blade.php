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
                <h5><b>Payments</b></h5>
                <button type="button" class="btn btn-success" onclick="window.print()">Print</button>
            </div>
          </div> 
          <br>
              <table class="table table-bordered"></span>
                <thead class="table-light">
                  <th>ID</th>
                  <th>Clinic Name</th>
                  <th>Proof of payment</th>
                  <th>Payment</th>
                </thead>
                <tbody>
                  <tr>
                @foreach ($payments as $payment)
                    <td>{{$payment->user_id}}</td>
                    <td>{{$payment->paymentClinic->name}}</td>
                    <td>
                        <a href="{{asset('paymentProofClinic/' . $payment->paymentProof)}}" download>
                        <button type="submit" class="btn btn-warning"> Download</button>  
                    </a>  
                    <td>

                    <?php if($payment->status== '0') { ?>
                      <form method="POST" action="/sysAd-Payments/{{$payment->id}}">
                          
                          @method('PUT')
                            @csrf
                           <button type="submit" class="btn btn-warning">Accept Payment</button>    
                          </form>
                        <?php } else { ?>  

                        Accepted
                        <?php } ?>

                     
                    </td>

                    

                  </tr>
                  @endforeach
                </tbody>
              </table>

              {{ $payments->links()}}
              
              
    </div>
</div>
</div>
</main>

<aside class="container">
  <h3>Payments Report</h3>
  <table class="table">
      <tbody>
        @foreach ($payments as $payment)
        <tr>
          <td><b>ID: {{$payment->user_id}}</td>
          <td>Clinic Name: {{$payment->paymentClinic->name}}</td>
          <td></td>
        </tr>
          @endforeach
          </tbody>
     </table>
</aside>


@endsection


