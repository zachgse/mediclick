@extends('layouts.app')

@section('content')
<div class="content">
<div class="container-fluid d-flex justify-content-center" style="margin:auto; text-align:left; padding-top: 2%;">
    <h2 style="text-align:center"><b>Resubscribe</b></h2>
    <br>
    <!---Start of Form--->
    <div class="card-body" >
        <form method="POST" action="/pages/clinicAdmin-Resubscribe" enctype ="multipart/form-data">
            
            @csrf
            
            <div class="row mb-3">
            <label for="subscription_id" class="col-md-4 col-form-label text-md-end">{{ __('Days left for subscription:') }} </label>

            <div class="col-md-6">
            <label for="subscription_id" class="col-md-4 col-form-label text-md-end">{{ $clinic->subDuration }} Days</label>
                    </select>     
                    @error('physician')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div>
            </div>

       

            <div class="row mb-3">
                <label for="subscription_id" class="col-md-4 col-form-label text-md-end">{{ __('Subscription Package') }}</label>

                <div class="col-md-6">
                    <select name="subscription_id" id="subscription_id" type="text" class="form-control @error('relationship') is-invalid @enderror" value="" required autocomplete="subscription_id" >
                        <option value=""> --Select-- </option>
                        @foreach($subscriptions as $subscription)
                        <option value="{{$subscription->id}}"> {{$subscription->name}} </option>
                        @endforeach
                    </select>     
                    @error('physician')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div>
            </div>


            <div class="row mb-3">
                <label for="paymentProof" class="col-md-4 col-form-label text-md-end">{{ __('Receipt') }}</label>

                <div class="col-md-6">
                    <input type="file"  id="paymentProof" name="paymentProof" class="form-control @error('paymentProof') is-invalid @enderror"/>
                        

                    @error('paymentProof')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
            </div>

            

            
            <div class="row mb-3">
                <label for="accountNumber" class="col-md-4 col-form-label text-md-end">{{ __('Transaction Number') }}</label>

                <div class="col-md-6">
                     <input type="text"  id="accountNumber" name="accountNumber" class="form-control @error('accountNumber') is-invalid @enderror"/>
                        

                    @error('accountNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
            
        </form>
    </div>

</form>

</div> <!--End of Form Column--->

</div>
</div>

  </div>
  </section>



 
@endsection