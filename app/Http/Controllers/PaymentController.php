<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //

    public function index(Payment $payment)
    {


        $payments = Payment::paginate(5);
        
        return view('system-admin.sysAd-Payments', ['payments' => $payments, 'payment' => $payment]);

       
    }

    


}
