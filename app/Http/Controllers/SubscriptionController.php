<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Post;
use App\Models\User;
use App\Models\Payment;
use App\Models\Log;
class SubscriptionController extends Controller
{
    //

    public function showSubscriptionPackages()
    {
        $subscriptions = Subscription::all();

        return view('posts.create', ['subscriptions' => $subscriptions]);
    }

    

    public function showSubscription(Post $clinic)
    {
     

        $user = auth()->user();
        $payment = Payment::where('user_id', $user->id)->get('paymentProof')->first();

        $email = User::where('id', $user->id)->get('email')->first();
        $clinic = Post::where('admin_id', $user->id)->get()->first();
     

        return view('pages.subscriptionaccount', ['clinic' => $clinic, 'email' => $email, 'payment' => $payment]);
        
    }

    public function edit(Post $post){
        
        $user = auth()->user();
        $post = Post::where('admin_id', $user->id)->get()->first();


        return view('pages.clinicAdmin-Update', ['post' => $post]);

    }

    public function destroy(Appointment $appointment)
    {

        $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'deleted an appointment',
        ]);
        $appointment->delete();

        return redirect('/employeeViewAppointments');
    }

    public function store(Request $request)
    {
      
        $user = auth()->user();
        $clinic = Post::where('admin_id', $user->id)->get('id')->first();
        $clinicSubscription = Post::where('admin_id', $user->id)->get('subscription_id')->first();
        if($request->hasfile('paymentProof'))
        {
            $file = $request->file('paymentProof');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('paymentProofClinic/', $filename);
            
        } 

         


           Payment::create([

                'user_id' => $user->id,
                'clinic_id' => $clinic->id,
                'paymentProof' => $filename,
                'subscription_id' => $clinicSubscription->subscription_id,
                'accountNumber' => request('accountNumber'),

            ]);

            $user = auth()->user();

        Log::create([

            'user_id' => $user->id,
            'type' => 'Clinic Admin',
            'description' => $user->firstName . " " .$user->lastName . " " .'submitted a proof of payment',
        ]);


            return redirect()->back()->with('message' , 'Submitted successfully!');

        
    }
   
}
