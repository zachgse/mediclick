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

                
                    <h5>Clinic Account Information</h5>
                    <hr>
                   
           
                    <div class="row">
                        <div class="col"><b>Clinic Name</b></div>
                        <div class="col">{{$clinic->name}}</div>
                    </div>
                
                    <div class="row">
                        <div class="col"><b>Clinic Address</b></div>
                        <div class="col">{{$clinic->blockNo}} {{$clinic->city}} {{$clinic->barangay}}</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Clinic Email</b></div>
                        <div class="col">{{$email->email}}</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Contact Number</b></div>
                        <div class="col">{{$clinic->contactNo}}</div>
                    </div>
                    
                    <div class="row">
                    <div class="col"><b>Clinic Certification</b></div>
                    <div class="col">
                        <a href="{{asset('paymentProof/' . $clinic->proof_image)}}" download>
                        <button type="submit" class="btn btn-primary"> Download</button>  
                    </a></div>
                    
                    </div>
                    <br>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">                    
                            <a class="btn btn-outline-warning" href="/clinicAdmin-Update" role="button"style="color: black;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="color: black"></i>
                            Edit</a></div>
                    </div>


                </div>
                <br>
                <!--Subscription Information-->
                <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
                    <h5>Your Package Details & Payment Status</h5>
                    <hr>
                    <div class="row">
                        <div class="col"><b>Subscription Package</b></div>
                        <div class="col"><b>{{$clinic->clinicSub->name}}</b></div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Amount</b></div>
                        <div class="col"> <div class="col">{{$clinic->clinicSub->amount}}</div></div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Subscription Duration:</b></div>
                        <div class="col"> <div class="col"> {{$clinic->subDuration}} days</div></div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Payment Status</b></div>
                        <div class="col">

                        <?php if($clinic->status== '0') { ?>
                         Not Paid  
                        <?php } else { ?>  

                        Paid
                        <?php } ?>
                  
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-outline-warning" href="/clinicAdmin-changeSub" role="button"style="color: black">
                                Change Subscription</a></div>   
                        <div class="col">
                             <a class="btn btn-outline-warning" href="/clinicAdmin-Resubscribe" role="button"style="color: black">
                                  Resubscribe</a></div>                          
                    </div>

                    <br> 
                    
                </div>
                <br>

                
                <?php if($clinic->status== '0') { ?>
                    <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
                    <form action="/subscriptionaccount" method="POST" enctype ="multipart/form-data">
                    @csrf
                    <h5>Payment </h5>
                    
            
                    <hr>
                    <div class="row">
                            <div class="col"><b>Receipt</b></div>
                                <div class="col"><input type="file" class="form-control" id="customFile" name="paymentProof" />
                            </div>
                    </div>

               

                    <br>
                    <div class="row">
                            <div class="col"><b>Transaction Number</b></div>
                                <div class="col"><input type="text" class="form-control" id="accountNumber" name="accountNumber" />
                        </div>
                        </div>
                    <br>   
                   
                    <br>
                    <div class="row">
                        <div class="col"><b></b></div>
                        <div class="col"> <input type="submit" value="Submit" role="button"style="color: black" class="btn btn-warning"></a></div>
                    </div>
                    </form>
                </div> 
                        <?php } 
                        
                        
                        
                        else { ?>  

                  
                        <?php } ?>
                        
                <!--Payment History-->
               
            </div><!--End of column-->
        <div class="col-md-6">
            <!--Account Information-->
            <div class="col-md-12" style="border: 1px solid; border-radius:5px; padding:2%;">
                <h5>How to Pay</h5>
                <hr>
                GCASH
                <p>1. Tap Send Money on the GCash dashboard, then tap on Express Send. <br>
                2. You can input the recipient's mobile number and amount you want to send.<br>
                <li style="text-indent: 50px;"><b>Account Number: </b>09055292755</li>
                <li style="text-indent: 50px;"><b>Account Name: </b>MediClick Ph.</li><br>
                3. Review the confirmation page.</p>
                <p style="text-indent: 50px; font-size:14px;padding-left:2%;">Double-check the recipient's GCash name, mobile number, 
                and amount. The recipient's GCash-registered name (the person's first name and 
                first letter of their last name) will appear in bold above their name in your phonebook.
                Please ensure that all the information is correct before confirming your Send Money transaction.</p>
                4. Seeing the in-app receipt means that your Send Money was successful.</p>
                <p style="text-indent: 50px; font-size:14px;padding-left:2%;">You can save this 
                    screenshot to your phone by tapping the save button on the upper right corner.
                    You will also receive a confirmation SMS from 2882 with your 
                    transaction details. The recipient will also receive a confirmation SMS 
                    which will contain the optional message.</p>
                    <h5>How to Pay</h5>
                <hr>
                BDO Online Banking
                <p>1. Visit the BDO website. <br>
                    <p style="text-indent: 50px; font-size:14px;padding-left:2%;">
                    Go to https://online.bdo.com.ph/ or visit www.bdo.com.ph and click the small Online Banking Login button in the upper right corner of your screen. 
                    Then, click BDO Online Banking. It will open a new tab and bring you to online.bdo.com.ph.</p>
                2. Log in to your BDO account.<br>
                3. Click on Send Money.
                <p style="text-indent: 50px; font-size:14px;padding-left:2%;">Once you’ve logged in, you will see an overview of your account. On the menu on the left side of the screen, click Send Money.
                A list of options will appear. Select To any BDO Account.</p>
                4. Fill out the form.
                <p style="text-indent: 50px; font-size:14px;padding-left:2%;">First, you have to select the source account or the account you want to transfer money from. 
                    Then, enter the amount you want to transfer and the account number of the account you wish to transfer to.</p>
                    <li style="text-indent: 50px;"><b>Account Number: </b>09055292755</li>
                    <li style="text-indent: 50px;"><b>Account Name: </b>MediClick Ph.</li><br>
                5. Review the details.
                <p style="text-indent: 50px; font-size:14px;padding-left:2%;">A pop up with all the details of your transaction will appear. 
                    Double check the details to make sure they are correct.</p>
                6. Enter the OTP.
                <p style="text-indent: 50px; font-size:14px;padding-left:2%;">Another one-time pin will be sent to you via SMS. 
                    Enter the OTP within five minutes and click Submit.</p><br>
                7. Take note of the Reference Number.
                <p style="text-indent: 50px; font-size:14px;padding-left:2%;">A page telling you if your transaction has been successful will appear. It also includes a summary of the details.
                    Take note of the reference number. You can simply screenshot this page to do so. 
                    This will come in handy in case you encounter a problem with your transaction.</p>
            </div>
            
        </div>
    </div><!--End of row-->

    </div><!--End of contatiner-->
</div>





@endsection
